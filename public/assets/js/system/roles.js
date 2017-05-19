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
        var input = btn.parent().siblings('td.descriptiontd').find('.description').val();
        btn.addClass('btn-loading');
        $.ajax({
            url: descurl,
            type: 'post',
            data: {roleId: roleId, desc: input},
            success: function(data) {
                btn.removeClass('btn-loading');
            }
        });
    });

});