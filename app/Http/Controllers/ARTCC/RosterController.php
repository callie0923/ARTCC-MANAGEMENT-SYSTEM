<?php

namespace App\Http\Controllers\ARTCC;

use App\Http\Controllers\Controller;
use App\Models\User;

class RosterController extends Controller
{
    public function index()
    {
        $homeControllers = User::homeMembers();
        $visitorControllers = User::visitorMembers();

        return view('artcc.roster.index', compact('homeControllers','visitorControllers'));
    }
}