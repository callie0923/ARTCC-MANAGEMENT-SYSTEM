@extends('layouts.master', ['pageTitle' => 'Routes Analyzer'])


@section('content')

    <div class="row">
        <div class="col-sm-4 form-group">
            <input type="text" id="depIcaoSearch" class="form-control" placeholder="Departure ICAO/IATA">
            <input type="hidden" id="depIcao">
        </div>
        <div class="col-sm-4 form-group">
            <input type="text" id="arrIcaoSearch" class="form-control" placeholder="Arrival ICAO/IATA">
            <input type="hidden" id="arrIcao">
        </div>
        <div class="col-sm-4 form-group">
            <button type="button" class="btn btn-primary btn-block" id="processBtn" disabled>Process</button>
        </div>
    </div>
    <div class="row" id="populateDataRow" style="display:none">
        <div class="col-sm-12" id="populateData">

        </div>
        <div class="col-sm-12">
            <p>
                <small class="dataAlert">
                    This data is for suggestion purposes only.
                    Flights may not have been conducted as filed, aircraft type may be erroneous, or data data by evaluating traditional flight planning publications to be guaranteed of terrain separation,
                    range (fuel capacity) for your aircraft, potential ADIZ/TFR penetration, and other issues that could be fatally hazardous to the health of you and/or your passengers.
                </small>
            </p>
            <br>
            <br>
            <br>
        </div>
    </div>

    <script src="{{asset('/assets/js/pilots/routes.js')}}"></script>
    <div style="display: none;" id="routeGenUrl" data-url="{{ route('pilots.routes.load') }}"></div>
    <div style="display: none;" id="airportSearchUrl" data-url="{{ route('api.airport') }}"></div>

@endsection