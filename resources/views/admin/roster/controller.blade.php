@extends('layouts.master', ['pageTitle' => $user->full_name])

@php
    $options = [
        '0' => 'Not Certified',
        '1' => 'In Training',
        '2' => 'Solo Certified',
        '3' => 'Certified'
    ];
@endphp


@section('content')

    <div class="row">
        <div class="col-sm-12">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#tabs-certs" data-toggle="tab">Certifications</a></li>
                <li><a href="#tabs-training" data-toggle="tab">Training</a></li>
                @if(Auth::user()->can('snrstaff'))
                    <li><a href="#tabs-other" data-toggle="tab">Senior Staff</a></li>
                @endif
            </ul>

            <div class="tab-content tab-content-bordered">
                <div class="tab-pane fade in active" id="tabs-certs">
                    <form action="#" id="certsForm" class="form-horizontal">
                        <div class="row">
                            <div class="col-sm-6"> {{-- minor col --}}
                                <div class="form-group">
                                    <label class="col-md-2 control-label" for="certMinorDel">Minor Delivery</label>
                                    <div class="col-md-10">
                                        <select class="form-control custom-select" id="certMinorDel">
                                            @foreach($options as $id => $value)
                                                <option value="{{ $id }}" {{ $user->certs->min_del == $id ? 'selected' : '' }}>{{ $value }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label" for="certMinorGnd">Minor Ground</label>
                                    <div class="col-md-10">
                                        <select class="form-control custom-select" id="certMinorGnd">
                                            @foreach($options as $id => $value)
                                                <option value="{{ $id }}" {{ $user->certs->min_gnd == $id ? 'selected' : '' }}>{{ $value }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label" for="certMinorTwr">Minor Tower</label>
                                    <div class="col-md-10">
                                        <select class="form-control custom-select" id="certMinorTwr">
                                            @foreach($options as $id => $value)
                                                <option value="{{ $id }}" {{ $user->certs->min_twr == $id ? 'selected' : '' }}>{{ $value }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label" for="certMinorApp">Minor Approach</label>
                                    <div class="col-md-10">
                                        <select class="form-control custom-select" id="certMinorApp">
                                            @foreach($options as $id => $value)
                                                <option value="{{ $id }}" {{ $user->certs->min_app == $id ? 'selected' : '' }}>{{ $value }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">{{-- major col --}}
                                <div class="form-group">
                                    <label class="col-md-2 control-label" for="certMajorDel">Major Delivery</label>
                                    <div class="col-md-10">
                                        <select class="form-control custom-select" id="certMajorDel">
                                            @foreach($options as $id => $value)
                                                <option value="{{ $id }}" {{ $user->certs->maj_del == $id ? 'selected' : '' }}>{{ $value }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label" for="certMajorGnd">Major Ground</label>
                                    <div class="col-md-10">
                                        <select class="form-control custom-select" id="certMajorGnd">
                                            @foreach($options as $id => $value)
                                                <option value="{{ $id }}" {{ $user->certs->maj_gnd == $id ? 'selected' : '' }}>{{ $value }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label" for="certMajorTwr">Major Tower</label>
                                    <div class="col-md-10">
                                        <select class="form-control custom-select" id="certMajorTwr">
                                            @foreach($options as $id => $value)
                                                <option value="{{ $id }}" {{ $user->certs->maj_twr == $id ? 'selected' : '' }}>{{ $value }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label" for="certMajorApp">Major Approach</label>
                                    <div class="col-md-10">
                                        <select class="form-control custom-select" id="certMajorApp">
                                            @foreach($options as $id => $value)
                                                <option value="{{ $id }}" {{ $user->certs->maj_app == $id ? 'selected' : '' }}>{{ $value }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-md-2 control-label" for="certEnroute">Enroute</label>
                                    <div class="col-md-10">
                                        <select class="form-control custom-select" id="certEnroute">
                                            @foreach($options as $id => $value)
                                                <option value="{{ $id }}" {{ $user->certs->enroute == $id ? 'selected' : '' }}>{{ $value }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <div class="col-md-10 col-sm-offset-2">
                                        <button class="btn btn-info" id="saveCerts" type="button" data-id="{{ $user->id }}">Save Certs</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="tab-pane fade" id="tabs-training">
                    <div class="row">
                        <div class="col-sm-12" id="trainingDiv">
                            <h4 style="margin:0">COMING SOON</h4>
                        </div>
                    </div>
                </div>
                @if(Auth::user()->can('snrstaff'))
                    <div class="tab-pane fade" id="tabs-other">
                        <div class="row">
                            <div class="col-sm-12" id="otherDiv">
                                <h4 style="margin:0">COMING SOON</center></h4>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <script src="{{asset('/assets/js/admin/controller.js')}}"></script>
    <div id="updateCertsUrl" style="display:none" data-url="{{ route('admin.roster.certs') }}"></div>

@endsection