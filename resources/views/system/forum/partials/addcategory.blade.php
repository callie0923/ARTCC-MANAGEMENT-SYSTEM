<form action="{{ route('system.forum.category.add') }}" method="post">
    {{ csrf_field() }}
    <h5 style="margin:0 0 5px 0;padding:0">Edit Category</h5>
    <div class="form-group">
        <label for="cat_name">Category Name</label>
        <input type="text" id="cat_name" name="category_name" class="form-control">
    </div>
    <div class="form-group">
        <label for="cat_icon_new">Category Icon <span id="iconLoadNew"></span></label>
        <select id="cat_icon_edit" class="form-control custom-select" name="category_icon">
            <option value="0" selected disabled>PLEASE CHOOSE</option>
            @foreach($icons as $short => $long)
                <option value="{{ $short }}">{{ $short }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <div class="checkbox">
            <label>
                <input type="checkbox" value="1" id="needAuthNew"> Needs to be logged in to view?
            </label>
        </div>
    </div>
    <div class="form-group" id="permissionsDivNew" style="display:none">
        <label style="margin-bottom: 0">Restrict Viewing To?</label>
        <label style="margin:0">(ALL UNCHECKED = ANYONE LOGGED IN)</label>
        <div class="checkbox" style="margin:0">
            <label><input type="checkbox" value="atm" name="viewPerms[]" id="permATM"> ATM</label>
        </div>
        <div class="checkbox" style="margin:0">
            <label><input type="checkbox" value="datm" name="viewPerms[]" id="permDATM"> DATM</label>
        </div>
        <div class="checkbox" style="margin:0">
            <label><input type="checkbox" value="ta" name="viewPerms[]" id="permTA"> TA</label>
        </div>
        <div class="checkbox" style="margin:0">
            <label><input type="checkbox" value="ec" name="viewPerms[]" id="permEC"> EC</label>
        </div>
        <div class="checkbox" style="margin:0">
            <label><input type="checkbox" value="fe" name="viewPerms[]" id="permFE"> FE</label>
        </div>
        <div class="checkbox" style="margin:0">
            <label><input type="checkbox" value="wm" name="viewPerms[]" id="permWM"> WM</label>
        </div>
        <div class="checkbox" style="margin:0">
            <label><input type="checkbox" value="ata" name="viewPerms[]" id="permATA"> ATA</label>
        </div>
        <div class="checkbox" style="margin:0">
            <label><input type="checkbox" value="aec" name="viewPerms[]" id="permAEC"> AEC</label>
        </div>
        <div class="checkbox" style="margin:0">
            <label><input type="checkbox" value="awm" name="viewPerms[]" id="permAWM"> AWM</label>
        </div>
        <div class="checkbox" style="margin:0">
            <label><input type="checkbox" value="ins" name="viewPerms[]" id="permINS"> INS</label>
        </div>
        <div class="checkbox" style="margin:0">
            <label><input type="checkbox" value="mtr" name="viewPerms[]" id="permMTR"> MTR</label>
        </div>
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-success">Save Category</button>
    </div>
</form>