<h5 style="margin:0 0 5px 0;padding:0">Add Category</h5>
<div class="form-group">
    <label for="cat_name">Category Name</label>
    <input type="text" id="cat_name" class="form-control">
</div>
<div class="form-group">
    <label for="cat_icon">Category Icon <span id="iconLoad"></span></label>
    <select id="cat_icon" class="form-control custom-select">
        <option value="0" selected disabled>PLEASE CHOOSE</option>
        @foreach($icons as $short => $long)
            <option value="{{ $long }}">{{ $short }}</option>
        @endforeach
    </select>
</div>
<div class="form-group">
    <div class="checkbox">
        <label>
            <input type="checkbox" value="1" id="needAuth"> Needs to be logged in to view?
        </label>
    </div>
</div>
<div class="form-group" id="permissionsDiv" style="display:none">
    <label style="margin-bottom: 0">Restrict Viewing To?</label>
    <label style="margin:0">(ALL UNCHECKED = ANYONE LOGGED IN)</label>
    <div class="checkbox" style="margin:0">
        <label><input type="checkbox" value="1" id="permATM"> ATM</label>
    </div>
    <div class="checkbox" style="margin:0">
        <label><input type="checkbox" value="1" id="permDATM"> DATM</label>
    </div>
    <div class="checkbox" style="margin:0">
        <label><input type="checkbox" value="1" id="permTA"> TA</label>
    </div>
    <div class="checkbox" style="margin:0">
        <label><input type="checkbox" value="1" id="permEC"> EC</label>
    </div>
    <div class="checkbox" style="margin:0">
        <label><input type="checkbox" value="1" id="permFE"> FE</label>
    </div>
    <div class="checkbox" style="margin:0">
        <label><input type="checkbox" value="1" id="permWM"> WM</label>
    </div>
    <div class="checkbox" style="margin:0">
        <label><input type="checkbox" value="1" id="permATA"> ATA</label>
    </div>
    <div class="checkbox" style="margin:0">
        <label><input type="checkbox" value="1" id="permAEC"> AEC</label>
    </div>
    <div class="checkbox" style="margin:0">
        <label><input type="checkbox" value="1" id="permAWM"> AWM</label>
    </div>
    <div class="checkbox" style="margin:0">
        <label><input type="checkbox" value="1" id="permINS"> INS</label>
    </div>
    <div class="checkbox" style="margin:0">
        <label><input type="checkbox" value="1" id="permMTR"> MTR</label>
    </div>
</div>
<div class="form-group">
    <button type="submit" class="btn btn-success">Save Category</button>
</div>