<?php

namespace App\Http\Controllers\ARTCC;

use App\Http\Controllers\Controller;
use App\Models\Entrust\Role;

class ManagementController extends Controller
{
    public function index()
    {
        $roles = Role::getActive();
        return view('artcc.management.index', compact('roles'));
    }
}