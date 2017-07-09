<form action="{{ route('system.forum.category.update', $category) }}" method="post">
    {{ csrf_field() }}
    <h5 style="margin:0 0 5px 0;padding:0">Edit Category</h5>
    <div class="form-group">
        <label for="cat_name">Category Name</label>
        <input type="text" id="cat_name" name="category_name" class="form-control" value="{{ $category->name }}">
    </div>
    <div class="form-group">
        <label for="cat_icon_edit">Category Icon <span id="iconLoadEdit"><i class="fa fa-{{ $category->icon }}"></i></span></label>
        <select id="cat_icon_edit" class="form-control custom-select" name="category_icon">
            <option value="0" selected disabled>PLEASE CHOOSE</option>
            @foreach($icons as $short => $long)
                <option value="{{ $short }}" {{ $short == $category->icon ? 'selected' : '' }}>{{ $short }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <div class="checkbox">
            <label>
                <input type="checkbox" value="1" id="needAuthEdit" {{ $category->need_auth == 1 ? 'checked' : '' }} name="need_auth"> Needs to be logged in to view?
            </label>
        </div>
    </div>
    <div class="form-group" id="permissionsDivEdit" style="{{ $category->need_auth == 1 ? '' : 'display:none' }}">
        <label style="margin-bottom: 0">Restrict Viewing To?</label>
        <label style="margin:0">(ALL UNCHECKED = ANYONE LOGGED IN)</label>
        @foreach($roles as $role)
        <div class="checkbox" style="margin:0">
            <label><input type="checkbox" value="{{ $role->name }}" name="viewPerms[]" {{ $category->canView($role->name) ? 'checked' : '' }}> {{ strtoupper($role->name) }}</label>
        </div>
        @endforeach
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-success">Save Category</button>
    </div>
</form>