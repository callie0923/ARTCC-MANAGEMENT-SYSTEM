@foreach(['success','warning','danger','info'] as $color)
    @if(session()->has('alert-'.$color))
        <div class="row alertrow">
            <div class="col-sm-12">
                <div class="alert alert-{{$color}} alert-dark">
                    {{ session('alert-'.$color) }}
                </div>
            </div>
        </div>
    @endif
@endforeach