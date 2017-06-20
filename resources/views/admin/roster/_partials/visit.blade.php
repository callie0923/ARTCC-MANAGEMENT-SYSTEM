<table class="table table-condensed">
    <thead>
    <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Rating</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
    @forelse($controllers as $controller)
        <tr>
            <td>{{ $controller->backwards_name }}</td>
            <td>{{ $controller->email }}</td>
            <td>{{ $controller->rating->rating_short }}</td>
            <td>
                <button class="btn btn-xs btn-info edit" data-id="{{ $controller->id }}">EDIT</button>
                @if(Auth::user()->hasRole(['atm','datm']))
                    <button class="btn btn-xs btn-info delete" data-id="{{ $controller->id }}">DELETE</button>
                @endif
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="4">NO VISITING CONTROLLERS</td>
        </tr>
    @endforelse
    </tbody>
</table>