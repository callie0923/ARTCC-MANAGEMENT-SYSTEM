$(document).ready(function() {
    var url = $('#postDataUrl').data('url');
    $('.roleswitcher').on('change', function() {
        var roleId = $(this).data('roleid');
        $.ajax({
            url: url,
            type: 'post',
            data: {roleId: roleId},
            success: function(data) {

            }
        });
    });
});