@extends('layouts.master', ['pageTitle' => 'ARTCC Management'])


@section('content')

    @foreach($roleCollection->chunk(3) as $roles)
    <div class="row staffboxes">
        @foreach($roles as $role)
            <div class="col-sm-4">
                <div class="panel box">
                    <div class="box-row">
                        <div class="box-cell p-x-3 p-y-1">
                            <div class="pull-xs-left font-weight-bold font-size-18">{{ $role->display_name }}</div>
                            <div class="pull-xs-right font-weight-semibold font-size-28 line-height-1"><i class="fa fa-envelope"></i></div>
                        </div>
                    </div>
                    <div class="box-row">
                        <div class="box-cell p-x-3 p-y-2">
                            @if($role->staff)
                                <h4 style="margin:0">{{ $role->staff->user->full_name }}</h4>
                            @else
                                <h3 style="margin:0">VACANT</h3>
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
    <hr>
    @forelse($instructorCollection->chunk(4) as $instructors)
        <div class="row">
            @foreach($instructors as $instructor)
                <div class="col-sm-3">
                    <div class="panel box">
                        <div class="box-row">
                            <div class="box-cell p-x-3 p-y-1">
                                <div class="pull-xs-left font-weight-bold font-size-13"></div>
                            </div>
                        </div>
                        <div class="box-row">
                            <div class="box-cell p-x-3 p-y-2">
                                <i class="box-bg-icon middle left text-info font-size-52 ion-ios-cloud-download-outline"></i>
                                <div class="pull-xs-right font-weight-semibold font-size-24 line-height-1">23,500</div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @empty

    @endforelse
    <hr>
    @forelse($mentorCollection->chunk(4) as $mentors)
        @foreach($mentors as $mentor)

        @endforeach
    @empty

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

@endsection