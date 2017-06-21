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
                    <a class="btn btn-xs btn-info" href="{{ route('admin.roster.controller', $controller) }}">VIEW/EDIT</a>
                    @if(Auth::user()->can('instruct') && $controller->canBePromoted())
                        <button class="btn btn-xs btn-success promote" data-id="{{ $controller->id }}" data-name="{{ $controller->full_name }}" data-currentrating="{{ $controller->rating_id }}">PROMOTE</button>
                    @elseif(Auth::user()->can('instruct') && !$controller->canBePromoted())
                        <button class="btn btn-xs btn-success" disabled><span style="text-decoration: line-through;">PROMOTE</span></button>
                    @endif
                    @if(Auth::user()->hasRole(['atm','datm']))
                        @if($controller->isOnLeave())
                            <button class="btn btn-xs btn-default loa" data-id="{{ $controller->id }}">MARK ACTIVE</button>
                        @else
                            <button class="btn btn-xs btn-default loa" data-id="{{ $controller->id }}">MARK ON LOA</button>
                        @endif
                        <button class="btn btn-xs btn-danger delete" data-id="{{ $controller->id }}" data-name="{{ $controller->full_name }}">REMOVE</button>
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