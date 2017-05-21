@extends('layouts.master', ['pageTitle' => 'System Settings'])

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
                <label for="api_key">ARTCC Code</label>
                <input type="text" class="form-control" name="api_key" id="api_key" value="{{ ($settings->vatusa_api_key) }}">
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
        </div>
    </div>

    <script src="{{asset('/assets/js/system/settings.js')}}"></script>
    <div style="display: none;" id="postDataUrl" data-url="{{ route('system.settings.update') }}"></div>

@endsection