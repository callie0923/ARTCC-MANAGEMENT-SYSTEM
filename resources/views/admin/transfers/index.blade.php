@extends('layouts.master', ['pageTitle' => 'VATUSA Transfer Management'])


@section('content')

    <div class="row">
        <div class="col-sm-6">
            <small><i>HOVER OVER FROM FACILITY TO SEE REASON</i></small>
            <table class="table table-bordered table-condensed">
                <thead>
                    <tr>
                        <th width="15%">CID</th>
                        <th width="40%">Name</th>
                        <th width="15%">Rating</th>
                        <th width="15%">From Facility</th>
                        <th width="15%">Actions</th>
                    </tr>
                </thead>
                <tbody id="tableBody">
                    <tr>
                        <td colspan="5"><center><i class="fa fa-refresh fa-spin"></i></center></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="col-sm-6">

        </div>
    </div>

    <script src="{{asset('/assets/js/admin/transfers.js')}}"></script>
    <div id="loadTxUrl" style="display:none" data-url="{{ route('admin.transfer.load') }}"></div>
    <div id="acceptTxUrl" style="display:none" data-url="{{ route('admin.transfer.accept') }}"></div>
    <div id="rejectTxUrl" style="display:none" data-url="{{ route('admin.transfer.reject') }}"></div>

@endsection