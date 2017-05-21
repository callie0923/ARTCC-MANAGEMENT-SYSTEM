<div class="panel panel-success panel-dark widget-profile">
    <div class="panel-heading">
        <h3 class="widget-profile-header">
            Weather
        </h3>
    </div>
    <div class="list-group">
        <a class="list-group-item">{{$airport->weather->metar}}</a>
        <a class="list-group-item">FLIGHT CAT <span class="pull-right">{{$airport->weather->flight_cat}}</span></a>
        @if(isset($airport->weather->temp_c)) <a class="list-group-item">TEMP <span class="pull-right">{{$airport->weather->temp_c}} C</span></a> @endif
        @if(isset($airport->weather->dewpoint_c)) <a class="list-group-item">DEWPOINT <span class="pull-right">{{$airport->weather->dewpoint_c}} C</span></a> @endif
        @if(isset($airport->weather->wind_dir)) <a class="list-group-item">WIND <span class="pull-right">{{$airport->weather->wind_dir.'@'.$airport->weather->wind_speed}}</span></a> @endif
        @if(isset($airport->weather->visbility)) <a class="list-group-item">VIS <span class="pull-right">{{$airport->weather->visbility}} SM</span></a> @endif
        @if(isset($airport->weather->altim_in_hg)) <a class="list-group-item">ALTIMITER <span class="pull-right">{{$airport->weather->altim_in_hg}}</span></a> @endif
        @if(isset($airport->weather->sea_level_pressure_mb)) <a class="list-group-item">QNH <span class="pull-right">{{$airport->weather->sea_level_pressure_mb}}</span></a> @endif

        @if(isset($airport->weather->clouds))

            @if($airport->weather->clouds[0]->cover == 'CLR')

                <a class="list-group-item">NO CLOUD OBSERVED</a>

            @else

                <a class="list-group-item">CLOUD</a>
                @foreach($airport->weather->clouds as $cloud)
                    <a class="list-group-item">> <span class="pull-right">{{$cloud->cover.'@'.$cloud->level}}</span></a>
                @endforeach

            @endif

        @else

            <a class="list-group-item">NO CLOUD OBSERVED</a>

        @endif

    </div>
</div>