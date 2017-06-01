@extends('layouts.master', ['pageTitle' => 'ARTCC Management'])


@section('content')

    @foreach($roleCollection->chunk(3) as $roles)
    <div class="row staffboxes">
        @foreach($roles as $role)
            <div class="col-sm-4">
                <div class="panel box">
                    <div class="box-row" style="height: 50px">
                        <div class="box-cell p-x-3 p-y-1">
                            <div class="pull-xs-left font-weight-bold font-size-18">{{ $role->display_name }}</div>
                            <div class="pull-xs-right font-weight-semibold font-size-28 line-height-1"><a href="mailto:{{$role->email}}"><i class="fa fa-envelope"></i></a></div>
                        </div>
                    </div>
                    <div class="box-row">
                        <div class="box-cell p-x-3 p-y-2">
                            @if($role->staff)
                                <h4 style="margin:0">{{ $role->staff->user->full_name }}</h4>
                            @else
                                <h4 style="margin:0">VACANT</h4>
                            @endif
                            <br>
                            <p>{{$role->role_desc}}</p>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    @endforeach

    <hr style="margin: 10px">
    <h2 style="margin:0 0 5px 0;">Instructors - <a href="mailto:{{$instructorRole->email}}"><i class="fa fa-envelope"></i></a></h2>
    <h4 style="margin:0 0 10px 0;">{{ $instructorRole->role_desc }}</h4>
    @forelse($instructorCollection->chunk(4) as $instructors)
        <div class="row">
            @foreach($instructors as $instructor)
                <div class="col-sm-3">
                    <div class="panel box">
                        <div class="box-row">
                            <div class="box-cell p-x-3 p-y-2">
                                <div class="pull-xs-left"><h3 style="margin:0">{{ $instructor->user->full_name }}</h3></div>
                                <div class="pull-xs-right font-weight-semibold font-size-24 line-height-1"><a href="mailto:{{ $instructor->user->email}}"><i class="fa fa-envelope"></i></a></div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @empty
        <div class="row">
            <div class="col-sm-12">
                <h3 style="margin: 0">No ARTCC Instructors</h3>
            </div>
        </div>
    @endforelse

    <hr style="margin: 10px">
    <h2 style="margin:0 0 5px 0;">Mentors - <a href="mailto:{{$mentorRole->email}}"><i class="fa fa-envelope"></i></a></h2>
    <h4 style="margin:0 0 10px 0;">{{ $mentorRole->role_desc }}</h4>
    @forelse($mentorCollection->chunk(4) as $mentors)
        <div class="row">
        @foreach($mentors as $mentor)
            <div class="col-sm-3">
                <div class="panel box">
                    <div class="box-row">
                        <div class="box-cell p-x-3 p-y-2">
                            <div class="pull-xs-left"><h3 style="margin:0">{{ $mentor->user->full_name }}</h3></div>
                            <div class="pull-xs-right font-weight-semibold font-size-24 line-height-1"><a href="mailto:{{ $mentor->user->email}}"><i class="fa fa-envelope"></i></a></div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        </div>
    @empty
        <div class="row">
            <div class="col-sm-12">
                <h3 style="margin: 0"><b>No ARTCC Mentors</b></h3>
            </div>
        </div>
    @endforelse


    <script>
        $(document).ready(function() {
            $('.staffboxes').each(function() {
                var maxHeight = 0;

                $(this).find('.box').each(function() {
                    var height = $(this).height();

                    if (height > maxHeight) {
                        maxHeight = height;
                    }
                }).height(maxHeight);
            });
        });
    </script>

    <br>
    <br>

@endsection