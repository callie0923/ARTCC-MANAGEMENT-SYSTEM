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
                    @if(Auth::user()->can('instruct') && $controller->canBePromoted())
                        <button class="btn btn-xs btn-success promote" data-id="{{ $controller->id }}">PROMOTE</button>
                    @elseif(Auth::user()->can('instruct') && !$controller->canBePromoted())
                        <button class="btn btn-xs btn-success" disabled><span style="text-decoration: line-through;">PROMOTE</span></button>
                    @endif
                    @if(Auth::user()->hasRole(['atm','datm']))
                        @if($controller->isOnLeave())
                            <button class="btn btn-xs btn-default loa" data-id="{{ $controller->id }}">MARK ACTIVE</button>
                        @else
                            <button class="btn btn-xs btn-default loa" data-id="{{ $controller->id }}">MARK ON LOA</button>
                        @endif
                        <button class="btn btn-xs btn-danger delete" data-id="{{ $controller->id }}">REMOVE</button>
                    @endif
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="4">NO HOME CONTROLLERS</td>
            </tr>
        @endforelse
    </tbody>
</table>