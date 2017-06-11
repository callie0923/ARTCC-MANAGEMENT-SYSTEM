@extends('layouts.master', ['pageTitle' => $user->full_name])


@section('content')

    <div class="row">
        <div class="col-sm-12">
            {{ dump($user) }}
        </div>
    </div>

@endsection