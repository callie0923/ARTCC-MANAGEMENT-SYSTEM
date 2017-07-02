$(document).ready(function() {
    var getRosterUrl = $('#loadRosterUrl').data('url');
    var promoteUrl = $('#promoteUrl').data('url');
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
    });

    $('#confirmPromotion').click(function() {
        var btn = $(this);
        var cid = $('#promoteCid').val();
        var newRating = $('#newRating').val();
        btn.html('<i class="fa fa-refresh fa-spin"></i>');
        $.ajax({
            url: promoteUrl,
            type: 'post',
            headers: {
                'X-CSRF-Token' : $('meta[name=_token]').attr('content')
            },
            data: {cid:cid},
            success: function(data) {
                if(data.success == true) {
                    btn.html('Confirm');
                    $('#rating-'+cid).text(newRating);
                    $('#modal-promote').modal('hide');
                }
            }
        })
    });

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
    var newRatingText;
    var newRating;
    if(current == 1) {
        newRatingText = 'Confirm Promotion of '+name+' to S1';
        newRating = 'S1';
    } else if(current == 2) {
        newRatingText = 'Confirm Promotion of '+name+' to S2';
        newRating = 'S2';
    }else if(current == 3) {
        newRatingText = 'Confirm Promotion of '+name+' to S3';
        newRating = 'S3';
    } else if(current == 4) {
        newRatingText = 'Confirm Promotion of '+name+' to C1';
        newRating = 'C1';
    }
    var title = 'Promote '+name+'?';
    $('#modalPromoteTitle').text(title);
    $('#promoteCid').val(cid);
    $('#newRating').val(newRating);
    $('#promoteText').text(newRatingText);
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