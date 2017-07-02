<?php

namespace App\Http\Controllers\ARTCC;

use App\Http\Controllers\Controller;
use App\Models\User;

class RosterController extends Controller
{
    public function index()
    {
        return view('artcc.roster.index');
    }

    public function home()
    {
        $homeControllers = User::homeMembers();
        return view('artcc.roster.home', compact('homeControllers'));
    }

    public function visit()
    {
        $visitorControllers = User::visitorMembers();
        return view('artcc.roster.visit', compact('visitorControllers'));
    }

    public function member(User $user)
    {
        return view('artcc.roster.controller', compact('user'));
    }
}