<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\System\Airport;
use App\Models\User;
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

    public function members(Request $request)
    {
        $query = $request->query('query');
        $users = User::select('id', 'first_name', 'last_name')->where(function($q) use ($query){
                $q->where('first_name', 'LIKE', '%'.$query.'%')->orWhere('last_name', 'LIKE', '%'.$query.'%');
            })->where('visitor', 0) ->where(function($q) {
                $q->where('status', 0)->orWhere('status', 2);
            })->get()->toJson();

        return $users;
    }
}