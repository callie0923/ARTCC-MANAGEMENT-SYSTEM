<?php

namespace App\Http\Controllers\ARTCC;

use App\Http\Controllers\Controller;

class ManagementController extends Controller
{
    public function index()
    {
        return view('artcc.management.index');
    }
}