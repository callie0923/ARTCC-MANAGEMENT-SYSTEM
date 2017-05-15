@extends('layouts.master', ['pageTitle' => "{$airport->name}"])


@section('content')

    <div class="row">
        <div class="col-sm-6">
            {{ dump($airport) }}
        </div>
        <div class="col-sm-6">
            @if($airport->charts)
                @php $i = 1; @endphp
                <div class="panel-group" id="accordion">
                    @foreach($airport->charts as $chartType => $chartArray)
                        <div class="panel">
                            <div class="panel-heading">
                                <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse{{$i}}" aria-expanded="false">
                                    {{$chartType}}
                                </a>
                            </div>
                            <div id="collapse{{$i}}" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                                <div class="panel-body">
                                    @foreach($chartArray as $item)
                                        <p><a href="{{$item['proxy']}}">{{$item['chartname']}}</a></p>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        @php $i++; @endphp
                    @endforeach
                </div>
            @else
                <h3 style="margin:0;">We found no charts inside the <a href="https://aircharts.org" target="_blank">AirCharts</a> API.</h3>
            @endif
        </div>
    </div>

@endsection