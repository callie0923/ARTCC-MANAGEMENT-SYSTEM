@extends('layouts.master', ['pageTitle' => "{$airport->name}"])


@section('content')

    <div class="row">
        <div class="col-sm-12">
            {{ dump($airport) }}
        </div>
    </div>

@endsection