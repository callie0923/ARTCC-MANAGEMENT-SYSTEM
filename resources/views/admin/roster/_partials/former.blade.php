<table class="table table-condensed">
    <thead>
    <tr>
        <th>Name</th>
        <th class="hidden-xs hidden-sm">Email</th>
        <th class="hidden-xs hidden-sm">Rating</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
    @forelse($controllers as $controller)
        <tr>
            <td>{{ $controller->backwards_name }}</td>
            <td class="hidden-xs hidden-sm">{{ $controller->email }}</td>
            <td class="hidden-xs hidden-sm">{{ $controller->rating->rating_short }}</td>
            <td>
                <button class="btn btn-xs btn-info edit" data-id="{{ $controller->id }}">VIEW/EDIT</button>
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