<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\System\Airport;
use Illuminate\Http\Request;

class ResourceController extends Controller
{
    public function airport(Request $request)
    {
        $query = $request->query('query');

        $airports = Airport::select('name','iata','icao')
            ->where('icao', 'LIKE', '%' .$query . '%')
            ->orWhere('iata', 'LIKE', '%' . $query . '%')
            ->orderBy('name', 'ASC')
            ->get()
            ->toJson();

        return $airports;
    }
}