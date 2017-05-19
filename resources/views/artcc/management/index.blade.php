@extends('layouts.master', ['pageTitle' => 'ARTCC Management'])


@section('content')

    <div class="row">
        <div class="col-sm-12">
            @foreach($roles as $role)
                @if(count($role->staff) == 1)
                    <h3 style="display: inline;">{{$role->display_name}}</h3> <h3 style="display: inline;">-</h3> <h3 style="display: inline;">{{$role->staff->user->full_name}}</h3>
                    <h5 style="margin:0">{{ $role->role_desc }}</h5>
                @elseif(count($role->staff) == 0)
                    <h3 style="display: inline;">{{$role->display_name}}</h3> <h3 style="display: inline;">-</h3> <h3 style="display: inline;">VACANT</h3>
                    <h5 style="margin:0">{{ $role->role_desc }}</h5>
                @else
                    @foreach($role->staff as $staff)
                        {{ dump("$role->name: ".$staff->user->full_name) }}
                    @endforeach
                @endif

                <hr>
            @endforeach
        </div>
    </div>

@endsection