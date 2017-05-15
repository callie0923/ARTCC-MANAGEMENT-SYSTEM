@extends('layouts.master', ['pageTitle' => "{$airport->name}"])


@section('content')

    <div class="row">
        <div class="col-sm-6">
            <div class="row">
                <div class="col-sm-12">
                    {{ dump($airport) }}
                </div>
            </div>
            <div class="row">

            </div>
        </div>
        <div class="col-sm-6" id="chartDiv">
            <center><i class="fa fa-refresh fa-spin fa-5x"></i></center>
        </div>
    </div>

    <script src="{{asset('/assets/js/pilots/airport.js')}}"></script>
    <div style="display: none;" id="loadChartsUrl" data-url="{{ route('pilots.airport.charts', $airport->icao) }}"></div>

@endsection