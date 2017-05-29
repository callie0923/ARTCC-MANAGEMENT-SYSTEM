$(document).ready(function() {
    var getUrl = $('#getDataUrl').data('url');

    $.ajax({
        url: getUrl,
        type: 'get',
        success: function(data) {
            $('#tabs-metars').html(data);
        }
    })

});