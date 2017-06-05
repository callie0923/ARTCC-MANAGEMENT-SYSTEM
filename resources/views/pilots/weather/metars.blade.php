@php $i = 1; @endphp
<div class="panel-group" id="wx-accordion">
    @foreach($airports as $airport)
        @if($airport->weather)
        <div class="panel">
            <div class="panel-heading">
                <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#wx-accordion" href="#collapse{{$i}}" aria-expanded="false">
                    {{$airport->name}} ({{$airport->icao}}) - {{ $airport->weather->flight_cat }}
                </a>
            </div>
            <div id="collapse{{$i}}" class="panel-collapse collapse" aria-expanded="false">
                <div class="panel-body">
                    <p>{{ $airport->weather->metar }}</p>
                    <p>{{ $airport->weather->altim_in_hg }}</p>
                </div>
            </div>
        </div>
        @endif
        @php $i++; @endphp
    @endforeach
</div>