@extends('layouts.master')


@section('content')

    <div class="row">
        <div class="col-sm-6 col-sm-offset-3">
            <h3 class="page-500-text">
                404
                <br>
                <br>
                <span class="font-size-16 font-weight-normal">
                    {{ $message }}
                </span>
            </h3>
        </div>
    </div>

@endsection