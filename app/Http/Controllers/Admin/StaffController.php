<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Entrust\Role;
use App\Models\Entrust\RolesToUsers;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    public function index()
    {
        $roles = Role::getActive();
        $instructors = RolesToUsers::where('role_id', 10)->get();
        $mentors = RolesToUsers::where('role_id', 11)->get();
        return view('admin.staff.index', compact('roles', 'instructors', 'mentors'));
    }

    public function updateRoleUser(Request $request)
    {
        if($request->get('user_id') == 'NA') {
            RolesToUsers::where('role_id', $request->get('role_id'))->delete();
        } else {
            $role = RolesToUsers::where('role_id', $request->get('role_id'))->first();
            if(!$role) {
                $role = new RolesToUsers;
                $role->role_id = $request->get('role_id');
            }
            $role->user_id = $request->get('user_id');
            $role->save();
        }

        return response()->json(['success' => true]);
    }

    public function updateTrainingRoleUser(Request $request)
    {
        if($request->get('action') == 'del') {
            RolesToUsers::where('role_id', $request->get('role_id'))->where('user_id', $request->get('user_id'))->delete();
        } else if(RolesToUsers::where('role_id', $request->get('role_id'))->where('user_id', $request->get('user_id'))->first()) {
            return response()->json(['success' => false, 'message' => 'Role Exists for User']);
        } else {
            $role = new RolesToUsers;
            $role->role_id = $request->get('role_id');
            $role->user_id = $request->get('user_id');
            $role->save();
        }

        return response()->json(['success' => true]);
    }
}