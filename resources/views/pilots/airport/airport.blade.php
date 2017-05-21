@extends('layouts.master', ['pageTitle' => "{$airport->name}"])


@section('content')

    <div class="row">
        <div class="col-sm-6">
            <div class="row">
                <div class="col-sm-12" id="weatherDiv">
                    <center><i class="fa fa-refresh fa-spin fa-5x"></i></center>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12" id="mapDiv" style="display: none;">
                    <img src="https://maps.googleapis.com/maps/api/staticmap?maptype=satellite&center={!! $airport->lat !!},{!! $airport->lon !!}&zoom=13&size=1000x450&key=AIzaSyDd_Y91P1tO0ccZQQ9FCjLfJUI9RUdAMkg" style="width: 100%;">
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="row">
                <div class="col-sm-12" id="chartDiv">
                    <center><i class="fa fa-refresh fa-spin fa-5x"></i></center>
                </div>
            </div>
        </div>
    </div>

    <script src="{{asset('/assets/js/pilots/airport.js')}}"></script>
    <div style="display: none;" id="loadChartsUrl" data-url="{{ route('pilots.airport.charts', $airport->icao) }}"></div>
    <div style="display: none;" id="loadWeatherUrl" data-url="{{ route('pilots.airport.weather', $airport->icao) }}"></div>

@endsection