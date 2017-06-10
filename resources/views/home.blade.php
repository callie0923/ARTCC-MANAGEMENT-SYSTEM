@extends('layouts.master')


@section('content')

    @php
        $settings = App\Models\System\Settings::find(1);
    @endphp
    <div class="row">
        <div class="col-sm-12">
            {!! $settings->welcome_text !!}
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-sm-4">
            <h3 style="margin:0 0 10px 0"><i class="fa fa-cloud"></i>&nbsp;&nbsp;Weather</h3>
            <table class="table table-bordered table-condensed" id="wxTable">
                <thead>
                    <tr>
                        <td>ICAO</td>
                        <td>Category</td>
                        <td>Wind</td>
                        <td>Altimiter</td>
                    </tr>
                </thead>
                <tbody id="wxTableBody">
                    <tr>
                        <td colspan="4"><center><i class="fa fa-refresh fa-spin fa-2x"></i></center></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="col-sm-4">
            <h3 style="margin:0 0 10px 0"><i class="fa fa-desktop"></i>&nbsp;&nbsp;Online ATC</h3>
            <table class="table table-bordered table-condensed" id="atcTable">
                <thead>
                    <tr>
                        <td>Controller</td>
                        <td>Position/Frequency</td>
                        <td>Time Online</td>
                    </tr>
                </thead>
                <tbody id="atcTableBody">
                    <tr>
                        <td colspan="3"><center><i class="fa fa-refresh fa-spin fa-2x"></i></center></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="col-sm-4">
            <h3 style="margin:0 0 10px 0"><i class="fa fa-calendar"></i>&nbsp;&nbsp;Events</h3>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-sm-4">
            <div class="panel">
                <div class="panel-heading">
                    <span class="panel-title"><i class="fa fa-newspaper-o"></i>&nbsp;&nbsp;News and Announcements</span>
                </div>
                <div id="newsPanel">
                    <div class="widget-activity-item">
                        <div class="widget-activity-text">
                            <i class="fa fa-refresh fa-spin"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="panel">
                <div class="panel-heading">
                    <span class="panel-title"><i class="fa fa-user-plus"></i>&nbsp;&nbsp;Newest Members</span>
                </div>
                <div id="membersPanel">
                    <div class="widget-activity-item">
                        <div class="widget-activity-text">
                            <i class="fa fa-refresh fa-spin"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="panel">
                <div class="panel-heading">
                    <span class="panel-title"><i class="fa fa-level-up"></i>&nbsp;&nbsp;Recent Promotions</span>
                </div>
                <div id="promotionsPanel">
                    <div class="widget-activity-item">
                        <div class="widget-activity-text">
                            <i class="fa fa-refresh fa-spin"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div style="display:none;" id="wxRoute" data-url="{{ route('index.weather') }}"></div>
    <div style="display:none;" id="atcRoute" data-url="{{ route('index.atc') }}"></div>
    <div style="display:none;" id="newsRoute" data-url="{{ route('index.news') }}"></div>
    <div style="display:none;" id="membersRoute" data-url="{{ route('index.members') }}"></div>
    <div style="display:none;" id="promotionsRoute" data-url="{{ route('index.promotions') }}"></div>
    <script src="{{ asset('assets/js/home.js') }}"></script>


@endsection