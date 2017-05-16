@extends('layouts.master', ['pageTitle' => 'System Roles'])

@section('content')

    <style>
        .switcher {
            margin: 0;
            padding: 8px 0 8px 0;
        }
    </style>

    <div class="row">
        <div class="col-sm-6">
            <h4 style="margin: 0">Enable/Disable Roles</h4>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Role Name</th>
                        <th>Description</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($roles as $role)
                    <tr>
                        <td>{{ $role->id }}</td>
                        <td>{{ $role->display_name }}</td>
                        <td>{{ $role->description }}</td>
                        <td>
                            @if(!in_array($role->name, ['atm','datm','ta','ec','fe','wm','ins','mtr']))
                                <label for="switcher-role{{$role->id}}" class="switcher switcher-success switcher-sm">
                                    <input type="checkbox" id="switcher-role{{$role->id}}" {{($role->active == 1)?'checked="checked"':''}} data-roleid="{{$role->id}}" class="roleswitcher">
                                    <div class="switcher-indicator">
                                        @if($role->active == 1)
                                            <div class="switcher-yes">YES</div>
                                            <div class="switcher-no">NO</div>
                                        @else
                                            <div class="switcher-no">NO</div>
                                            <div class="switcher-yes">YES</div>
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

@endsection