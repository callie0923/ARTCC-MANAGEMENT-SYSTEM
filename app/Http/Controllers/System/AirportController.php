<?php

namespace App\Http\Controllers\System;

use App\Http\Controllers\Controller;
use App\Models\System\Airport;
use Illuminate\Http\Request;

class AirportController extends Controller
{
    public function index(Request $request)
    {
        if($request->get('query')) {
            $query = $request->get('query');
            $airports = Airport::where('iata', 'like', '%'.$query.'%')->orWhere('icao', 'like', '%'.$query.'%')->paginate(20)->appends(['query' => $query]);
        } else {
            $airports = Airport::paginate(20);
        }

        return view('system.airport', compact('airports'));
    }

    public function update(Request $request)
    {
        $airport = Airport::where('id', $request->get('airport_id'))->first();
        $airport->is_artcc = $request->get('status');
        $airport->save();
    }
}