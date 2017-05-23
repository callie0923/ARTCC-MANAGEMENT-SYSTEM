<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Settings;
use App\Models\User;
use Exception;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        Auth::loginUsingId(1240411, true);
        return redirect()->back()->with('alert-success', 'You have been logged in!');
    }


    public function loginULS(Request $request)
    {
        if (Auth::check()) {
            return redirect()->back()->with('alert-warning', 'Already Logged In');
        }
        $settings = Settings::find(1);

        $salt = $settings->vatusa_uls_key;

        if (!Auth::check() && !$request->query('token')){
            return redirect('http://login.vatusa.net/uls/login?fac='.$settings->artcc_code);
        }

        $token = $request->query('token');
        $ip = $request->getClientIp();

        if(sha1($salt.'-'.$ip) != $token) {
            return redirect()->back()->with('alert-warning', 'Token Verification Failed');
        }

        $client = new Client;
        $url = "http://login.vatusa.net/uls/info?token={$token}&format=json";
        $result = $client->get($url);
        $res = json_decode($result->getBody()->__toString(), true);
        $cid = $res['user'];

        $user = User::find($cid);
        if(!$user) {
            return redirect()->back()->with('alert-danger', 'No user found on the roster.');
        } else if($user->status == 1) {
            return redirect()->back()->with('alert-warning', 'User is marked as a former controller. Authentication cancelled.');
        } else {
            Auth::loginUsingId($cid, true);
        }

        $user->rating_id = $res['rating']['id'];
        $user->email = $res['email'];
        $user->save();

        return redirect()->back()->with('alert-success', 'You have been logged in!');

    }

    public function logout()
    {
        if(Auth::check()) {
            Auth::logout();
            return redirect()->route('index')->with('alert-success', 'Logged Out.');
        } else {
            return redirect()->route('index')->with('alert-warning', 'Already Logged Out.');
        }
    }
}