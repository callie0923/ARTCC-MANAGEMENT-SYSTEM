@extends('layouts.master', ['pageTitle' => 'Profile'])


@section('content')

    <div class="row">
        <div class="col-sm-12">
            {{ dump($user) }}
        </div>
    </div>

@endsection