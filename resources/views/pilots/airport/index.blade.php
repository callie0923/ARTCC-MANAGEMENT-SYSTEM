@extends('layouts.master', ['pageTitle' => 'Airports'])


@section('content')

    <div class="row">
        <div class="col-sm-4 form-group">
            <input type="text" id="airportSearch" class="form-control" placeholder="ICAO/IATA">
        </div>
    </div>

    <script src="{{asset('/assets/js/pilots/airports.js')}}"></script>
    <div style="display: none;" id="airportSearchUrl" data-url="{{ route('api.airport') }}"></div>
    <div style="display: none;" id="airportUrl" data-url="{{ route('pilots.airport.airport', '') }}"></div>

@endsection