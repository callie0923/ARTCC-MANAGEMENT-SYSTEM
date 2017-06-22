$(document).ready(function() {
    var getRosterUrl = $('#loadRosterUrl').data('url');
    var homeDiv = $('#homeDiv');
    var visitingDiv = $('#visitingDiv');
    var formerDiv = $('#formerDiv');

    $.ajax({
        url: getRosterUrl,
        type: 'get',
        success: function(data) {
            console.log(data);
            if(data.home) {
                homeDiv.html(data.home);
            }
            if(data.visit) {
                visitingDiv.html(data.visit);
            }
            if(data.former) {
                formerDiv.html(data.former);
            }
        }
    })
});

$(document).on('click', '.delete', function() {
    var btn = $(this);
    var cid = btn.data('id');
    var name = btn.data('name');
    var namecid = name+' ('+cid+')';
    var title = 'Remove '+name+'?';
    $('#modalRemoveTitle').text(title);
    $('#removeCid').val(cid);
    $('#removeName').val(namecid);
    $('#modal-remove').modal('show');
});

$(document).on('click', '.promote', function() {
    var btn = $(this);
    var cid = btn.data('id');
    var name = btn.data('name');
    var current = btn.data('currentrating');
    var newRating;
    if(current == 1) {
        newRating = 'Confirm Promotion of '+name+' to S1';
    } else if(current == 2) {
        newRating = 'Confirm Promotion of '+name+' to S2';
    }else if(current == 3) {
        newRating = 'Confirm Promotion of '+name+' to S3';
    } else if(current == 4) {
        newRating = 'Confirm Promotion of '+name+' to C1';
    }
    var title = 'Promote '+name+'?';
    $('#modalPromoteTitle').text(title);
    $('#promoteCid').val(cid);
    $('#promoteText').text(newRating);
    $('#modal-promote').modal('show');
});

$(document).on('click', '.loa', function() {
    var btn = $(this);
    var newtext;
    if(btn.html() == 'MARK ACTIVE') {
        newtext = 'MARK ON LOA';
    } else {
        newtext = 'MARK ACTIVE';
    }
    btn.html('<i class="fa fa-refresh fa-spin"></i>');
    setTimeout(function() {
        btn.html(newtext);
    }, 2000);
});