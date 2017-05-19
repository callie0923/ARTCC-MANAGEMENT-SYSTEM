<?php

namespace App\Http\Controllers\System;

use App\Http\Controllers\Controller;
use App\Models\Entrust\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;

class RolesController extends Controller
{
    public function index()
    {
        $roles = Role::all();
        return view('system.roles', compact('roles'));
    }

    public function update(Request $request)
    {
        $roleId = $request->get('roleId');
        $role = Role::where('id', $roleId)->first();
        $status = $role->active;
        if($status == 0) {
            $role->active = 1;
        } else {
            DB::table(Config::get('entrust.role_user_table'))->where('role_id', $roleId)->delete();
            $role->active = 0;
        }
        $role->save();
        return response()->json(['success' => 'true']);
    }

    public function updateRoleDesc(Request $request)
    {
        $roleId = $request->get('roleId');
        $desc = $request->get('desc');

        $role = Role::where('id', $roleId)->first();
        $role->role_desc = $desc;
        $role->save();

        return response()->json(['success' => 'true']);
    }
}