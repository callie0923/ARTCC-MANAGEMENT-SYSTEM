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

    /**
     * @param Airport $airport
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function airport(Airport $airport)
    {
        $airport->loadCharts();
        return view('pilots.airport.airport', compact('airport'));
    }

}