<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function profile()
    {
        $user = User::find(Auth::id());
        return view('artcc.roster.controller', compact('user'));
    }
}