@forelse($visitorControllers as $visitorController)
    @php $certs = $visitorController->certs; @endphp
    <tr>
        <td>{{ $visitorController->backwards_name }}</td>
        <td>{{ $visitorController->rating->rating_short }}</td>
        <td class="roster-{{$certs->rosterClass($certs->min_del)}}"></td>
        <td class="roster-{{$certs->rosterClass($certs->min_gnd)}}"></td>
        <td class="roster-{{$certs->rosterClass($certs->min_twr)}}"></td>
        <td class="roster-{{$certs->rosterClass($certs->min_app)}}"></td>
        <td class="roster-{{$certs->rosterClass($certs->maj_del)}}"></td>
        <td class="roster-{{$certs->rosterClass($certs->maj_gnd)}}"></td>
        <td class="roster-{{$certs->rosterClass($certs->maj_twr)}}"></td>
        <td class="roster-{{$certs->rosterClass($certs->maj_app)}}"></td>
        <td class="roster-{{$certs->rosterClass($certs->enroute)}}"></td>
        <td>{{$visitorController->status_text}}</td>
    </tr>
@empty
    <tr>
        <td colspan="12">No Visiting Controllers</td>
    </tr>
@endforelse