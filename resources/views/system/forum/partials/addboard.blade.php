<form action="{{ route('system.forum.category.board.add', $category->id) }}" method="post">
    {{ csrf_field() }}
    <h5 style="margin:0 0 5px 0;padding:0">Add Board</h5>
    <div class="form-group">
        <label for="board_name">Board Name</label>
        <input type="text" id="board_name" name="board_name" class="form-control">
    </div>
    <div class="form-group">
        <label for="board_desc">Board Description</label>
        <input type="text" id="board_desc" name="board_desc" class="form-control">
    </div>
    <div class="row">
        <div class="col-sm-6">
            <label style="margin-bottom: 0">Who Can View?</label>
            @foreach($roles as $role)
                <div class="checkbox" style="margin:0">
                    <label><input type="checkbox" value="{{ $role->name }}" name="viewPerms[]"> {{ strtoupper($role->name) }}</label>
                </div>
            @endforeach
        </div>
        <div class="col-sm-6">
            <label style="margin-bottom: 0">Who Can Post?</label>
            @foreach($roles as $role)
                <div class="checkbox" style="margin:0">
                    <label><input type="checkbox" value="{{ $role->name }}"  name="postPerms[]"> {{ strtoupper($role->name) }}</label>
                </div>
            @endforeach
        </div>
    </div>
    <br>
    <div class="form-group">
        <button type="submit" class="btn btn-success">Save Board</button>
    </div>
</form>