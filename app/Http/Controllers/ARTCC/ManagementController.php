<?php

namespace App\Http\Controllers\ARTCC;

use App\Http\Controllers\Controller;
use App\Models\Entrust\Role;
use App\Models\Entrust\RolesToUsers;

class ManagementController extends Controller
{
    public function index()
    {
        $roleCollection = Role::getActive();
        $instructorCollection = RolesToUsers::where('role_id', 10)->get();
        $mentorCollection = RolesToUsers::where('role_id', 11)->get();
        return view('artcc.management.index', compact('roleCollection', 'instructorCollection', 'mentorCollection'));
    }
}