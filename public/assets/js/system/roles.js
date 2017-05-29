$(document).ready(function() {
    var url = $('#postDataUrl').data('url');
    var descurl = $('#descUrl').data('url');

    $('.roleswitcher').on('change', function() {
        var roleId = $(this).data('roleid');
        $.ajax({
            url: url,
            type: 'post',
            data: {roleId: roleId}
        });
    });


    $('.saverole').click(function() {
        var btn = $(this);
        var roleId = btn.data('roleid');
        var desc = btn.parent().siblings('td.descriptiontd').find('.description').val();
        var email = btn.parent().siblings('td.descriptiontd').find('.email').val();
        btn.addClass('btn-loading');
        $.ajax({
            url: descurl,
            type: 'post',
            data: {roleId:roleId, desc:desc, email:email},
            success: function(data) {
                btn.removeClass('btn-loading');
            }
        });
    });

});