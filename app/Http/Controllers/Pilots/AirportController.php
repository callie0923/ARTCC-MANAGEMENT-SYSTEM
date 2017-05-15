<?php

namespace App\Http\Controllers\Pilots;

use App\Http\Controllers\Controller;
use App\Http\Models\Airport;
use Illuminate\Http\Request;

class AirportController extends Controller
{
    public function index()
    {
        return view('pilots.airport.index');
    }

    public function airport(Airport $airport)
    {
        return view('pilots.airport.airport', compact('airport'));
    }
}