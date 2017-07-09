<form action="{{ route('system.forum.category.board.update', $board->id) }}" method="post">
    {{ csrf_field() }}
    <h5 style="margin:0 0 5px 0;padding:0">Edit Board</h5>
    <div class="form-group">
        <label for="board_name">Board Name</label>
        <input type="text" id="board_name" name="board_name" class="form-control" value="{{ $board->name }}">
    </div>
    <div class="form-group">
        <label for="board_desc">Board Description</label>
        <input type="text" id="board_desc" name="board_desc" class="form-control" value="{{ $board->description }}">
    </div>
    <div class="row">
        <div class="col-sm-6">
            <label style="margin-bottom: 0">Who Can View?</label>
            @foreach($roles as $role)
            <div class="checkbox" style="margin:0">
                <label><input type="checkbox" value="{{ $role->name }}" {{ $board->canView($role->name) ? 'checked' : '' }} name="viewPerms[]"> {{ strtoupper($role->name) }}</label>
            </div>
            @endforeach
        </div>
        <div class="col-sm-6">
            <label style="margin-bottom: 0">Who Can Post?</label>
            @foreach($roles as $role)
                <div class="checkbox" style="margin:0">
                    <label><input type="checkbox" value="{{ $role->name }}" {{ $board->canPost($role->name) ? 'checked' : '' }} name="postPerms[]"> {{ strtoupper($role->name) }}</label>
                </div>
            @endforeach
        </div>
    </div>
    <br>
    <div class="form-group">
        <button type="submit" class="btn btn-success">Save Board</button>
    </div>
</form>