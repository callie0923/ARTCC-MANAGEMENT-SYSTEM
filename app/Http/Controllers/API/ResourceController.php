<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Models\Airport;
use Illuminate\Http\Request;

class ResourceController extends Controller
{
    public function airport(Request $request)
    {
        $query = $request->query('query');

        $airports = Airport::select('name','icao')
            ->where('icao', 'LIKE', '%' .$query . '%')
            ->orWhere('iata', 'LIKE', '%' . $query . '%')
            ->orWhere('name', 'LIKE', '%' . $query . '%')
            ->orderBy('name', 'ASC')
            ->get()
            ->toJson();

        return $airports;
    }
}