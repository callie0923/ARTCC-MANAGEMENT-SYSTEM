<?php

namespace App\Http\Controllers\System;

use App\Http\Controllers\Controller;
use App\Http\Models\Airport;

class AirportController extends Controller
{
    public function index()
    {
        $airports = Airport::all();
        return view('system.airport', compact('airports'));
    }
}