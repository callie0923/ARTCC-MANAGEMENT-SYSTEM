@forelse($airports as $airport)
    <tr class="{{ $airport->weather->tableclass() }}">
        <td>{{ $airport->icao }}</td>
        <td>{{ $airport->weather->flight_cat }}</td>
        <td>{{ $airport->weather->wind }}</td>
        <td>{{ $airport->weather->altim_in_hg }}</td>
    </tr>
@empty
    <tr>
        <td colspan="4">No Airports Defined</td>
    </tr>
@endforelse