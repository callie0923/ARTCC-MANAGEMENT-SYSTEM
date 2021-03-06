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

    <div class="modal fade" id="modal-remove" tabindex="-1" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">×</button>
                    <h4 class="modal-title" id="modalRemoveTitle"></h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" id="removeName" class="form-control" disabled>
                        <input type="hidden" id="removeCid">
                    </div>
                    <div class="form-group">
                        <input type="text" id="removeReason" class="form-control" placeholder="Reason for Removal">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-danger">Confirm</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal-promote" tabindex="-1" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">×</button>
                    <h4 class="modal-title" id="modalPromoteTitle"></h4>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="promoteCid">
                    <input type="hidden" id="newRating">
                    <span id="promoteText"></span>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn" data-dismiss="modal">Cancel</button>
                    <button type="button" id="confirmPromotion" class="btn btn-success">Confirm</button>
                </div>
            </div>
        </div>
    </div>

    <script src="{{asset('/assets/js/admin/roster.js')}}"></script>
    <div id="loadRosterUrl" style="display:none" data-url="{{ route('admin.roster.load') }}"></div>
    <div id="promoteUrl" style="display:none" data-url="{{ route('admin.roster.promote') }}"></div>

@endsection