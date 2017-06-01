@extends('layouts.master', ['pageTitle' => 'Staff Management'])


@section('content')

    <div class="row">
        <div class="col-sm-12">
            <ul class="nav nav-tabs">
                @if(Auth::user()->hasRole(['atm','datm','wm']))
                    <li class="active"><a href="#tabs-artcc" data-toggle="tab">ARTCC Staff</a></li>
                    <li><a href="#tabs-training" data-toggle="tab">Training Staff</a></li>
                @else
                    <li class="active"><a href="#tabs-training" data-toggle="tab">Training Staff</a></li>
                @endif
            </ul>

            <div class="tab-content tab-content-bordered">
                @if(Auth::user()->hasRole(['atm','datm','wm']))
                    <div class="tab-pane fade in active" id="tabs-artcc">
                        <div class="row">
                            <div class="col-sm-6">
                                <table class="table table-condensed table-bordered">
                                    <tbody>
                                    @foreach($roles as $role)
                                        <tr>
                                            <td>{{ $role->display_name }}</td>
                                            <td class="rolenamebox">{{ ($role->staff) ? $role->staff->user->full_name : 'VACANT' }}</td>
                                            <td>
                                                <button class="btn btn-xs btn-danger vacateRole" data-roleid="{{$role->id}}"><i class="fa fa-times"></i></button>
                                                <button class="btn btn-xs btn-primary editRole" data-roleid="{{$role->id}}" type="button"><i class="fa fa-edit"></i></button>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="tabs-training">
                        <div class="row">
                            <div class="col-sm-4">
                                <h4 style="margin:0">Instructors</h4>
                                <br>
                                <table class="table table-condensed table-bordered">
                                    <tbody id="instructorTable">
                                    @foreach($instructors as $instructor)
                                        <tr>
                                            <td>{{ $instructor->user->full_name }}</td>
                                            <td>
                                                <button class="btn btn-xs btn-danger deleteTrainingStaff" data-roleid="10" data-userid="{{$instructor->user->id}}" type="button"><i class="fa fa-times"></i></button>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-sm-4">
                                <h4 style="margin:0">Mentors</h4>
                                <br>
                                <table class="table table-condensed table-bordered">
                                    <tbody id="mentorTable">
                                    @foreach($mentors as $mentor)
                                        <tr>
                                            <td>{{ $mentor->user->full_name }}</td>
                                            <td>
                                                <button class="btn btn-xs btn-danger deleteTrainingStaff" data-roleid="11" data-userid="{{$mentor->user->id}}" type="button"><i class="fa fa-times"></i></button>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <div class="alert alert-danger alert-dark" style="display:none">
                                        <button type="button" class="close" data-dismiss="alert">×</button>
                                        <span id="trainingAlert"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <select id="trainingRoleId" class="form-control">
                                        <option value="0" selected disabled>PLEASE CHOOSE</option>
                                        <option value="10">Instructor</option>
                                        <option value="11">Mentor</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control trainingUserSearch" placeholder="Member Search" disabled>
                                    <input type="hidden" name="user_id" id="training_user_id">
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="tab-pane fade active in" id="tabs-training">

                    </div>
                @endif
            </div>
        </div>
    </div>

    <script src="{{asset('/assets/js/admin/staff.js')}}"></script>
    <div style="display: none;" id="userSearchUrl" data-url="{{ route('api.members') }}"></div>
    <div style="display: none;" id="roleUpdateUrl" data-url="{{ route('admin.staff.update') }}"></div>
    <div style="display: none;" id="trainingRoleUpdateUrl" data-url="{{ route('admin.staff.trainingstaff') }}"></div>

@endsection