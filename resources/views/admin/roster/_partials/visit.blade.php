<button class="btn btn-primary" type="button">Add Visitor</button><br>
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
                @if(Auth::user()->hasRole(['atm','datm']))
                    <button class="btn btn-xs btn-danger delete" data-id="{{ $controller->id }}">DELETE</button>
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