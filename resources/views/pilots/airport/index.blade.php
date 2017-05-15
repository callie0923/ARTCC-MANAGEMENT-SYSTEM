@extends('layouts.master', ['pageTitle' => 'Jacksonville Airports'])


@section('content')

    <div class="row">
        <div class="col-sm-12">
            {{ dump(new \Illuminate\Database\Eloquent\Collection()) }}
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <a href="{{ route('pilots.airport.airport', 'kmco') }}" class="btn btn-success">VIEW AIRPORT</a>
        </div>
    </div>

@endsection