@extends('layouts.master', ['pageTitle' => 'System Airports'])

@section('content')

    <div class="row">
        <div class="col-sm-12">

        </div>
    </div>

    <script src="{{asset('/assets/js/system/airports.js')}}"></script>
    <div style="display: none;" id="postDataUrl" data-url="{{ route('system.airports.update') }}"></div>

@endsection