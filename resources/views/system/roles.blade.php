@extends('layouts.master', ['pageTitle' => 'System Roles'])

@section('content')

    <style>
        .switcher {
            margin: 0;
            padding: 8px 0 8px 0;
        }
    </style>

    <div class="row">
        <div class="col-sm-12">
            <h4 style="margin: 0">Enable/Disable Roles</h4>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th width="2%">#</th>
                        <th width="15%">Role Name</th>
                        <th width="20%">Description</th>
                        <th width="45%">Description</th>
                        <th width="3%">Actions</th>
                        <th width="3%">Status</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($roles as $role)
                    <tr>
                        <td>{{ $role->id }}</td>
                        <td>{{ $role->display_name }}</td>
                        <td>{{ $role->description }}</td>
                        <td class="descriptiontd">
                            <input type="text" class="form-control description" value="{{$role->role_desc}}" placeholder="Description">
                            <input type="text" class="form-control email" value="{{$role->email}}" placeholder="Email">
                        </td>
                        <td><button class="btn btn-success btn-sm saverole" data-roleid="{{$role->id}}"><i class="fa fa-check"></i></button></td>
                        <td>
                            @if(!in_array($role->name, ['atm','datm','ta','ec','fe','wm','ins','mtr']))
                                <label for="switcher-role{{$role->id}}" class="switcher switcher-success switcher-sm">
                                    <input type="checkbox" id="switcher-role{{$role->id}}" {{($role->active == 1)?'checked="checked"':''}} data-roleid="{{$role->id}}" class="roleswitcher">
                                    <div class="switcher-indicator">
                                        @if($role->active == 1)
                                            <div class="switcher-yes"><i class="fa fa-check"></i></div>
                                            <div class="switcher-no"><i class="fa fa-close"></i></div>
                                        @else
                                            <div class="switcher-no"><i class="fa fa-close"></i></div>
                                            <div class="switcher-yes"><i class="fa fa-check"></i></div>
                                        @endif
                                    </div>
                                </label>
                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script src="{{asset('/assets/js/system/roles.js')}}"></script>
    <div style="display: none;" id="postDataUrl" data-url="{{ route('system.roles.update') }}"></div>
    <div style="display: none;" id="descUrl" data-url="{{ route('system.roles.roledesc') }}"></div>

@endsection