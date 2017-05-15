<?php

namespace App\Http\Controllers\Pilots;

use App\Http\Controllers\Controller;
use App\Http\Models\Airport;
use Illuminate\Http\Request;

class WeatherController extends Controller
{
    public function index()
    {
        return view('pilots.weather.index');
    }
}