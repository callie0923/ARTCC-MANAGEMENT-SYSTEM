@forelse($homeControllers as $homeController)
    @php $certs = $homeController->certs; @endphp
    <tr>
        <td><a href="{{ route('artcc.roster.member', $homeController) }}">{{ $homeController->backwards_name }}</a></td>
        <td>{{ $homeController->rating->rating_short }}</td>
        <td class="roster-{{$certs->rosterClass($certs->min_del)}}"></td>
        <td class="roster-{{$certs->rosterClass($certs->min_gnd)}}"></td>
        <td class="roster-{{$certs->rosterClass($certs->min_twr)}}"></td>
        <td class="roster-{{$certs->rosterClass($certs->min_app)}}"></td>
        <td class="roster-{{$certs->rosterClass($certs->maj_del)}}"></td>
        <td class="roster-{{$certs->rosterClass($certs->maj_gnd)}}"></td>
        <td class="roster-{{$certs->rosterClass($certs->maj_twr)}}"></td>
        <td class="roster-{{$certs->rosterClass($certs->maj_app)}}"></td>
        <td class="roster-{{$certs->rosterClass($certs->enroute)}}"></td>
        <td>{{$homeController->status_text}}</td>
    </tr>
@empty
    <tr>
        <td colspan="12">No Home Controllers</td>
    </tr>
@endforelse