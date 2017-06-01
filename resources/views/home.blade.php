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
            <h3 style="margin:0 0 10px 0"><i class="fa fa-cloud"></i> Weather</h3>
            <table class="table table-bordered table-condensed" id="wxTable">
                <thead>
                    <tr>
                        <td>ICAO</td>
                        <td>Category</td>
                        <td>Wind</td>
                        <td>Altimiter</td>
                    </tr>
                </thead>
                <tbody id="atcTableBody">
                <tr>
                    <td colspan="4"><center><i class="fa fa-refresh fa-spin fa-2x"></i></center></td>
                </tr>
                </tbody>
            </table>
        </div>
        <div class="col-sm-4">
            <h3 style="margin:0 0 10px 0"><i class="fa fa-desktop"></i> Online ATC</h3>
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
            <h3 style="margin:0 0 10px 0"><i class="fa fa-calendar"></i> Events</h3>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-sm-4">
            <div class="panel">
                <div class="panel-heading">
                    <span class="panel-title">News and Announcements</span>
                </div>
                <div class="widget-activity-item">
                    <div class="widget-activity-text">
                        New TA
                    </div>
                    <div class="widget-activity-footer">2 hours ago</div>
                </div>
                <div class="widget-activity-item">
                    <div class="widget-activity-text">
                        New SOP In Action
                    </div>
                    <div class="widget-activity-footer">2 hours ago</div>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="panel">
                <div class="panel-heading">
                    <span class="panel-title">Newest Members</span>
                </div>
                <div class="widget-activity-item">
                    <div class="widget-activity-text">
                        Welcome person XYZ to the ARTCC
                    </div>
                    <div class="widget-activity-footer">2 hours ago</div>
                </div>
                <div class="widget-activity-item">
                    <div class="widget-activity-text">
                        Welcome person XYZ to the ARTCC
                    </div>
                    <div class="widget-activity-footer">2 hours ago</div>
                </div>
                <div class="widget-activity-item">
                    <div class="widget-activity-text">
                        Welcome person XYZ to the ARTCC
                    </div>
                    <div class="widget-activity-footer">2 hours ago</div>
                </div>
                <div class="widget-activity-item">
                    <div class="widget-activity-text">
                        Welcome person XYZ to the ARTCC
                    </div>
                    <div class="widget-activity-footer">2 hours ago</div>
                </div>
                <div class="widget-activity-item">
                    <div class="widget-activity-text">
                        Welcome person XYZ to the ARTCC
                    </div>
                    <div class="widget-activity-footer">2 hours ago</div>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="panel">
                <div class="panel-heading">
                    <span class="panel-title">Recent Promotions</span>
                </div>
                <div class="widget-activity-item">
                    <div class="widget-activity-text">
                        Person XYZ was promoted to S3
                    </div>
                    <div class="widget-activity-footer">2 hours ago</div>
                </div>
                <div class="widget-activity-item">
                    <div class="widget-activity-text">
                        Person XYZ was promoted to S1
                    </div>
                    <div class="widget-activity-footer">2 hours ago</div>
                </div>
                <div class="widget-activity-item">
                    <div class="widget-activity-text">
                        Person XYZ was promoted to C1
                    </div>
                    <div class="widget-activity-footer">2 hours ago</div>
                </div>
                <div class="widget-activity-item">
                    <div class="widget-activity-text">
                        Person XYZ was promoted to I1
                    </div>
                    <div class="widget-activity-footer">2 hours ago</div>
                </div>
                <div class="widget-activity-item">
                    <div class="widget-activity-text">
                        Person XYZ was promoted to I3
                    </div>
                    <div class="widget-activity-footer">2 hours ago</div>
                </div>
            </div>
        </div>
    </div>


@endsection