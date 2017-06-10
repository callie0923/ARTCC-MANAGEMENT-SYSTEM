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
        return view('_partials.home.atc')->render();
    }

    public function newsPanel()
    {
        return view('_partials.home.news')->render();
    }

    public function newestMembersPanel()
    {
        return view('_partials.home.members')->render();
    }

    public function promotionsPanel()
    {
        return view('_partials.home.promotions')->render();
    }

    public function noaccess()
    {
        return view('layouts.accessdenied');
    }
}