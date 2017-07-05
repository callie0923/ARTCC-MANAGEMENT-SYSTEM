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
        <div class="checkbox" style="margin:0">
            <label><input type="checkbox" value="atm" name="viewPerms[]" {{ $category->canView('atm') ? 'checked' : '' }} id="permATM"> ATM</label>
        </div>
        <div class="checkbox" style="margin:0">
            <label><input type="checkbox" value="datm" name="viewPerms[]" {{ $category->canView('datm') ? 'checked' : '' }} id="permDATM"> DATM</label>
        </div>
        <div class="checkbox" style="margin:0">
            <label><input type="checkbox" value="ta" name="viewPerms[]" {{ $category->canView('ta') ? 'checked' : '' }} id="permTA"> TA</label>
        </div>
        <div class="checkbox" style="margin:0">
            <label><input type="checkbox" value="ec" name="viewPerms[]" {{ $category->canView('ec') ? 'checked' : '' }} id="permEC"> EC</label>
        </div>
        <div class="checkbox" style="margin:0">
            <label><input type="checkbox" value="fe" name="viewPerms[]" {{ $category->canView('fe') ? 'checked' : '' }} id="permFE"> FE</label>
        </div>
        <div class="checkbox" style="margin:0">
            <label><input type="checkbox" value="wm" name="viewPerms[]" {{ $category->canView('wm') ? 'checked' : '' }} id="permWM"> WM</label>
        </div>
        <div class="checkbox" style="margin:0">
            <label><input type="checkbox" value="ata" name="viewPerms[]" {{ $category->canView('ata') ? 'checked' : '' }} id="permATA"> ATA</label>
        </div>
        <div class="checkbox" style="margin:0">
            <label><input type="checkbox" value="aec" name="viewPerms[]" {{ $category->canView('aec') ? 'checked' : '' }} id="permAEC"> AEC</label>
        </div>
        <div class="checkbox" style="margin:0">
            <label><input type="checkbox" value="awm" name="viewPerms[]" {{ $category->canView('awm') ? 'checked' : '' }} id="permAWM"> AWM</label>
        </div>
        <div class="checkbox" style="margin:0">
            <label><input type="checkbox" value="ins" name="viewPerms[]" {{ $category->canView('ins') ? 'checked' : '' }} id="permINS"> INS</label>
        </div>
        <div class="checkbox" style="margin:0">
            <label><input type="checkbox" value="mtr" name="viewPerms[]" {{ $category->canView('mtr') ? 'checked' : '' }} id="permMTR"> MTR</label>
        </div>
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-success">Save Category</button>
    </div>
</form>