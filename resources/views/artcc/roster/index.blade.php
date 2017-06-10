@extends('layouts.master', ['pageTitle' => 'Controller Roster'])


@section('content')

    <style>
        .roster-danger {
            background-color: #ff8080;
        }
        .roster-warning {
            background-color: #d5ff55;
        }
        .roster-info {
            background-color: #9099ff;
        }
        .roster-success {
            background-color: #65ff63;
        }
    </style>

    <div class="row">
        <div class="col-sm-12">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#tabs-home" data-toggle="tab">Home Controllers</a></li>
                <li><a href="#tabs-visitors" data-toggle="tab">Visiting Controllers</a></li>
            </ul>

            <div class="tab-content tab-content-bordered">
                <div class="tab-pane fade in active" id="tabs-home">
                    <div class="row">
                        <div class="col-sm-12">
                            <table class="table table-bordered table-condensed">
                                <thead>
                                    <tr>
                                        <th colspan="2"></th>
                                        <th colspan="4">Minor Certs</th>
                                        <th colspan="4">Major Certs</th>
                                        <th colspan="2"></th>
                                    </tr>
                                    <tr>
                                        <th width="25%">Name</th>
                                        <th width="5%">Rating</th>
                                        <th width="7%">Del</th>
                                        <th width="7%">Gnd</th>
                                        <th width="7%">Twr</th>
                                        <th width="7%">App</th>
                                        <th width="7%">Del</th>
                                        <th width="7%">Gnd</th>
                                        <th width="7%">Twr</th>
                                        <th width="7%">App</th>
                                        <th width="7%">Enroute</th>
                                        <th width="7%">Status</th>
                                    </tr>
                                </thead>
                                <tbody id="homeControllersTable">
                                    <tr>
                                        <td colspan="12"><center><i class="fa fa-refresh fa-spin"></i></center></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="tabs-visitors">
                    <div class="row">
                        <div class="col-sm-12">
                            <table class="table table-bordered table-condensed">
                                <thead>
                                <tr>
                                    <th colspan="2"></th>
                                    <th colspan="4">Minor Certs</th>
                                    <th colspan="4">Major Certs</th>
                                    <th colspan="2"></th>
                                </tr>
                                <tr>
                                    <th width="25%">Name</th>
                                    <th width="5%">Rating</th>
                                    <th width="7%">Del</th>
                                    <th width="7%">Gnd</th>
                                    <th width="7%">Twr</th>
                                    <th width="7%">App</th>
                                    <th width="7%">Del</th>
                                    <th width="7%">Gnd</th>
                                    <th width="7%">Twr</th>
                                    <th width="7%">App</th>
                                    <th width="7%">Enroute</th>
                                    <th width="7%">Status</th>
                                </tr>
                                </thead>
                                <tbody id="visitControllersTable">
                                    <tr>
                                        <td colspan="12"><center><i class="fa fa-refresh fa-spin"></i></center></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div style="display:none;" id="homeRoute" data-url="{{ route('artcc.roster.index.home') }}"></div>
    <div style="display:none;" id="visitRoute" data-url="{{ route('artcc.roster.index.visit') }}"></div>
    <script src="{{ asset('assets/js/artcc/roster.js') }}"></script>

@endsection