@extends('layouts.master', ['pageTitle' => 'Roster Management'])


@section('content')

    <div class="row">
        <div class="col-sm-12">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#tabs-home" data-toggle="tab">Home Controllers</a></li>
                <li><a href="#tabs-visit" data-toggle="tab">Visiting Controllers</a></li>
                @if(Auth::user()->hasRole(['atm','datm']))
                    <li><a href="#tabs-former" data-toggle="tab">Former Controllers</a></li>
                @endif
            </ul>

            <div class="tab-content tab-content-bordered">
                <div class="tab-pane fade in active" id="tabs-home">
                    <div class="row">
                        <div class="col-sm-12" id="homeDiv">
                            <h4 style="margin:0"><center><i class="fa fa-refresh fa-spin"></i></center></h4>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="tabs-visit">
                    <div class="row">
                        <div class="col-sm-12" id="visitingDiv">
                            <h4 style="margin:0"><center><i class="fa fa-refresh fa-spin"></i></center></h4>
                        </div>
                    </div>
                </div>
                @if(Auth::user()->hasRole(['atm','datm']))
                <div class="tab-pane fade" id="tabs-former">
                    <div class="row">
                        <div class="col-sm-12" id="formerDiv">
                            <h4 style="margin:0"><center><i class="fa fa-refresh fa-spin"></i></center></h4>
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>

    <script src="{{asset('/assets/js/admin/roster.js')}}"></script>
    <div id="loadRosterUrl" style="display:none" data-url="{{ route('admin.roster.load') }}"></div>

@endsection