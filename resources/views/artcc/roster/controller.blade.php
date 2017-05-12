@extends('layouts.master', ['pageTitle' => 'Controller Profile'])


@section('content')

    <div class="row">
        <div class="col-sm-12">
            {{ dump($user) }}
        </div>
    </div>

@endsection