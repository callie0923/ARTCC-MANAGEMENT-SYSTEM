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
                <button class="btn btn-xs btn-info reactivate" data-id="{{ $controller->id }}">REACTIVATE</button>
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="4">NO FORMER CONTROLLERS</td>
        </tr>
    @endforelse
    </tbody>
</table>