@if(isset($breadcrumbs))

@php $count = count($breadcrumbs); $i = 1; @endphp

@if($count > 0)
    <ol class="breadcrumb page-breadcrumb">
        @foreach($breadcrumbs as $breadcrumb)
            @if($i == $count)
                <li class="active">{{ $breadcrumb['title'] }}</li>
            @else
                @if(isset($breadcrumb['route']))
                    <li><a href="{{ route($breadcrumb['route']) }}">{{ $breadcrumb['title'] }}</a></li>
                @else
                    <li><a href="#">{{ $breadcrumb['title'] }}</a></li>
                @endif
            @endif
            @php $i++; @endphp
        @endforeach
    </ol>
@endif

@endif