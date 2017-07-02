<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\System\Index\RecentPromotions;
use App\Models\User;
use App\VATSIM\VATUSA;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RosterController extends Controller
{
    protected $vatusa;
    /**
     * RosterController constructor.
     * @param VATUSA $vatusa
     */
    public function __construct(VATUSA $vatusa)
    {
        $this->vatusa = $vatusa;
    }

    public function index()
    {
        return view('admin.roster.index');
    }

    public function controller(User $user)
    {
        return view('admin.roster.controller', compact('user'));
    }

    public function updateCerts(Request $request)
    {
        $user = User::find($request->user_id);
        $certs = $user->certs;
        $certs->update($request->all());
        $certs->save();
        return response()->json(['success' => true]);
    }

    public function promote(Request $request)
    {
        $user = User::find($request->cid);
        $old = $user->rating_id;

        switch($old) {
            case 1:
                $new = 2;
                $newText = 'S1';
                break;
            case 2:
                $new = 3;
                $newText = 'S2';
                break;
            case 3:
                $new = 4;
                $newText = 'S3';
                break;
            case 4:
                $new = 5;
                $newText = 'C1';
                break;
            default:
                return response()->json(['success' => false]);
        }

        RecentPromotions::create([
            'cid' => $user->id,
            'new_text' => $newText
        ]);

        $user->rating_id = $new;
        $user->save();

        return response()->json(['success' => true]);
    }

    public function loadRoster()
    {
        $controllers = User::homeMembers();
        $homeHtml = view('admin.roster._partials.home', compact('controllers'))->render();

        $controllers = User::visitorMembers();
        $visitHtml = view('admin.roster._partials.visit', compact('controllers'))->render();

        if(Auth::user()->hasRole(['atm','datm'])) {
            $controllers = User::formerMembers();
            $formerHtml = view('admin.roster._partials.former', compact('controllers'))->render();
            return response()->json(['home' => $homeHtml, 'visit' => $visitHtml, 'former' => $formerHtml]);
        }
        return response()->json(['home' => $homeHtml, 'visit' => $visitHtml]);
    }
}