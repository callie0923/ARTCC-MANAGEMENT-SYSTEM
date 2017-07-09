@extends('layouts.master', ['pageTitle' => 'System Settings', 'summernote' => true])

@section('content')

    @php
        $artccs = [
            'ZAN' => 'Anchorage',
            'ZAB' => 'Albuquerque',
            'ZTL' => 'Atlanta',
            'ZBW' => 'Boston',
            'ZAU' => 'Chicago',
            'ZOB' => 'Cleveland',
            'ZDV' => 'Denver',
            'ZFW' => 'Fort Worth',
            'HCF' => 'Honolulu',
            'ZHU' => 'Houston',
            'ZID' => 'Indianapolis',
            'ZJX' => 'Jacksonville',
            'ZKC' => 'Kansas City',
            'ZLA' => 'Los Angeles',
            'ZME' => 'Chicago',
            'ZMA' => 'Miami',
            'ZMP' => 'Minneapolis',
            'ZNY' => 'New York',
            'ZOA' => 'Oaklank',
            'ZLC' => 'Salt Lake',
            'ZSE' => 'Seattle',
            'ZDC' => 'Washington',
        ];
    @endphp

    <div class="row alertrow" id="settingsUpdated" style="display: none;">
        <div class="col-sm-12">
            <div class="alert alert-success alert-dark">
                Settings Updated
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <label for="artcc_code">ARTCC</label>
                <select name="artcc_code" id="artcc_code" class="custom-select form-control">
                    <option value="0" selected disabled>PLEASE CHOOSE</option>
                    @foreach($artccs as $ident => $name)
                        <option value="{{$ident}}" {{ ($settings->artcc_code == $ident)?'selected':'' }}>{{$name}} ({{$ident}})</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="uls_key">VATUSA ULS Key</label>
                <input type="text" class="form-control" name="uls_key" id="uls_key" value="{{ ($settings->vatusa_uls_key) }}">
            </div>
            <div class="form-group">
                <label for="api_key">VATUSA API Code</label>
                <input type="text" class="form-control" name="api_key" id="api_key" value="{{ ($settings->vatusa_api_key) }}">
            </div>
            <div class="form-group" id="ipdiv" style="display: none;">
                <label for="ip">Update IP in VATUSA</label>
                <input type="text" class="form-control" id="ip" disabled>
            </div>
            <div class="form-group">
                <label for="wx_nex_gen_radar">WX Next Gen Radar</label>
                <input type="text" class="form-control" name="wx_nex_gen_radar" id="wx_nex_gen_radar" value="{{ ($settings->wx_nex_gen_radar) }}">
            </div>
            <div class="form-group">
                <label for="wx_vis_radar">WX Visible Radar</label>
                <input type="text" class="form-control" name="wx_vis_radar" id="wx_vis_radar" value="{{ ($settings->wx_vis_radar) }}">
            </div>
            <div class="form-group">
                <label for="wx_infrared_radar">WX Infrared Radar</label>
                <input type="text" class="form-control" name="wx_infrared_radar" id="wx_infrared_radar" value="{{ ($settings->wx_infrared_radar) }}">
            </div>
            <div class="form-group">
                <label for="wx_wind_surface_data">WX Wind Surface Data</label>
                <input type="text" class="form-control" name="wx_wind_surface_data" id="wx_wind_surface_data" value="{{ ($settings->wx_wind_surface_data) }}">
            </div>
            <div class="form-group">
                <label for="home_announcements">Index Announcements (only publicly vieweable)</label>
                <select name="home_announcements" id="home_announcements" class="form-control custom-select">
                    @foreach($boards as $board)
                        <option value="{{ $board->id }}" {{ $settings->announcement_board_id == $board->id ? 'selected': '' }}>{{ $board->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <button class="btn btn-primary" id="btnSave">Save Data</button>
            </div>
        </div>
        <div class="col-sm-6">
            <form action="{{ route('system.settings.logo') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="upload_logo">ARTCC Logo</label>
                    <label class="custom-file px-file">
                        <input type="file" class="custom-file-input" name="artcc_logo">
                        <span class="custom-file-control form-control">Choose file...</span>
                        <div class="px-file-buttons">
                            <button type="button" class="btn px-file-clear">Clear</button>
                            <button type="button" class="btn btn-primary px-file-browse">Browse</button>
                        </div>
                    </label>
                </div>
                <div class="form-group" id="fileUploadBtn" style="display: none;">
                    <button class="btn btn-primary">Upload</button>
                </div>
            </form>
            <hr>
            <form action="{{ route('system.settings.welcomemsg') }}" method="post">
                {{ csrf_field() }}
                <div style="display:none" id="welcomeText">{!! $settings->welcome_text !!}</div>
                <div class="form-group">
                    <label for="welcome_msg">Welcome Message</label>
                    <textarea name="welcome_msg" id="welcome_msg" cols="30" rows="10">{!! $settings->welcome_text !!}</textarea>
                </div>
                <div class="form-group">
                    <button class="btn btn-primary" type="submit">Save Welcome Message</button>
                </div>
            </form>
        </div>
    </div>

    <script src="{{asset('/assets/js/system/settings.js')}}"></script>
    <div style="display: none;" id="postDataUrl" data-url="{{ route('system.settings.update') }}"></div>

@endsection