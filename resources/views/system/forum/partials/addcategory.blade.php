<form action="{{ route('system.forum.category.add') }}" method="post">
    {{ csrf_field() }}
    <h5 style="margin:0 0 5px 0;padding:0">Add Category</h5>
    <div class="form-group">
        <label for="cat_name">Category Name</label>
        <input type="text" id="cat_name" name="category_name" class="form-control">
    </div>
    <div class="form-group">
        <label for="cat_icon_new">Category Icon <span id="iconLoadNew"></span></label>
        <select id="cat_icon_new" class="form-control custom-select" name="category_icon">
            @foreach($icons as $short => $long)
                <option value="{{ $short }}">{{ $short }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <div class="checkbox">
            <label>
                <input type="checkbox" value="1" id="needAuthNew" name="need_auth"> Needs to be logged in to view?
            </label>
        </div>
    </div>
    <div class="form-group" id="permissionsDivNew" style="display:none">
        <label style="margin-bottom: 0">Restrict Viewing To?</label>
        <label style="margin:0">(ALL UNCHECKED = ANYONE LOGGED IN)</label>
        @foreach($roles as $role)
            <div class="checkbox" style="margin:0">
                <label><input type="checkbox" value="{{ $role->name }}" name="viewPerms[]"> {{ strtoupper($role->name) }}</label>
            </div>
        @endforeach
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-success">Save Category</button>
    </div>
</form>