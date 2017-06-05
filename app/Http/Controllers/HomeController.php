<?php

namespace App\Http\Controllers;

use App\Models\System\Airport;

class HomeController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function weatherPanel()
    {
        $airports = Airport::where('is_home', 1)->get();
        return view('_partials.home.weather', compact('airports'))->render();
    }

    public function atcPanel()
    {
//        $active = Airport::where('is_home', 1)->get();
//        return view('_partials.home.atc', compact('active'))->render();
        return view('_partials.home.atc')->render();
    }

    public function noaccess()
    {
        return view('layouts.accessdenied');
    }
}