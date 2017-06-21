<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\VATSIM\VATUSARoster;
use Illuminate\Support\Facades\Auth;

class RosterController extends Controller
{
    protected $vatusa;
    /**
     * RosterController constructor.
     * @param VATUSARoster $vatusa
     */
    public function __construct(VATUSARoster $vatusa)
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