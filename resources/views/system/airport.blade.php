@extends('layouts.master', ['pageTitle' => 'System Airports', 'dataTables' => true])

@section('content')

    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
    <style>
        .toggle.ios, .toggle-on.ios, .toggle-off.ios { border-radius: 20px; }
        .toggle.ios .toggle-handle { border-radius: 20px; }
    </style>

    <div class="row">
        <div class="col-sm-12">
            <form action="/system/airports" method="get">
                <div class="input-group">
                    <input type="text" name="query" class="form-control" placeholder="Search Query">
                    <div class="input-group-btn">
                        <button class="btn btn-success" type="submit">Search</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <table class="table">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>IATA</th>
                    <th>ICAO</th>
                    <th>Name</th>
                    <th>Country</th>
                    <th>Municipality</th>
                    <th>Is ARTCC Airport</th>
                </tr>
                </thead>
                <tbody>
                @forelse($airports as $airport)
                    <tr>
                        <td>{{$airport->id}}</td>
                        <td>{{$airport->iata}}</td>
                        <td>{{$airport->icao}}</td>
                        <td>{{$airport->name}}</td>
                        <td>{{$airport->country}}</td>
                        <td>{{$airport->municipality}}</td>
                        <td>
                            <input type="checkbox" {{($airport->is_artcc == 1) ? 'checked':''}} value="1" data-toggle="toggle" data-style="ios" data-on="Yes" data-off="No" data-size="mini" class="airportupdateswitch" data-airportid="{{$airport->id}}">
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7">No Airports</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            {{ $airports->links() }}
        </div>
    </div>

    <script src="{{asset('/assets/js/system/airports.js')}}"></script>
    <div style="display: none;" id="postDataUrl" data-url="{{ route('system.airports.update') }}"></div>

@endsection