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
            <div class="checkbox" style="margin:0">
                <label><input type="checkbox" value="atm" name="viewPerms[]"> ATM</label>
            </div>
            <div class="checkbox" style="margin:0">
                <label><input type="checkbox" value="datm" name="viewPerms[]"> DATM</label>
            </div>
            <div class="checkbox" style="margin:0">
                <label><input type="checkbox" value="ta" name="viewPerms[]"> TA</label>
            </div>
            <div class="checkbox" style="margin:0">
                <label><input type="checkbox" value="ec" name="viewPerms[]"> EC</label>
            </div>
            <div class="checkbox" style="margin:0">
                <label><input type="checkbox" value="fe" name="viewPerms[]"> FE</label>
            </div>
            <div class="checkbox" style="margin:0">
                <label><input type="checkbox" value="wm" name="viewPerms[]"> WM</label>
            </div>
            <div class="checkbox" style="margin:0">
                <label><input type="checkbox" value="ata" name="viewPerms[]"> ATA</label>
            </div>
            <div class="checkbox" style="margin:0">
                <label><input type="checkbox" value="aec" name="viewPerms[]"> AEC</label>
            </div>
            <div class="checkbox" style="margin:0">
                <label><input type="checkbox" value="awm" name="viewPerms[]"> AWM</label>
            </div>
            <div class="checkbox" style="margin:0">
                <label><input type="checkbox" value="ins" name="viewPerms[]"> INS</label>
            </div>
            <div class="checkbox" style="margin:0">
                <label><input type="checkbox" value="mtr" name="viewPerms[]"> MTR</label>
            </div>
        </div>
        <div class="col-sm-6">
            <label style="margin-bottom: 0">Who Can Post?</label>
            <div class="checkbox" style="margin:0">
                <label><input type="checkbox" value="atm" name="postPerms[]"> ATM</label>
            </div>
            <div class="checkbox" style="margin:0">
                <label><input type="checkbox" value="datm" name="postPerms[]"> DATM</label>
            </div>
            <div class="checkbox" style="margin:0">
                <label><input type="checkbox" value="ta" name="postPerms[]"> TA</label>
            </div>
            <div class="checkbox" style="margin:0">
                <label><input type="checkbox" value="ec" name="postPerms[]"> EC</label>
            </div>
            <div class="checkbox" style="margin:0">
                <label><input type="checkbox" value="fe" name="postPerms[]"> FE</label>
            </div>
            <div class="checkbox" style="margin:0">
                <label><input type="checkbox" value="wm" name="postPerms[]"> WM</label>
            </div>
            <div class="checkbox" style="margin:0">
                <label><input type="checkbox" value="ata" name="postPerms[]"> ATA</label>
            </div>
            <div class="checkbox" style="margin:0">
                <label><input type="checkbox" value="aec" name="postPerms[]"> AEC</label>
            </div>
            <div class="checkbox" style="margin:0">
                <label><input type="checkbox" value="awm" name="postPerms[]"> AWM</label>
            </div>
            <div class="checkbox" style="margin:0">
                <label><input type="checkbox" value="ins" name="postPerms[]"> INS</label>
            </div>
            <div class="checkbox" style="margin:0">
                <label><input type="checkbox" value="mtr" name="postPerms[]"> MTR</label>
            </div>
        </div>
    </div>
    <br>
    <div class="form-group">
        <button type="submit" class="btn btn-success">Save Board</button>
    </div>
</form>