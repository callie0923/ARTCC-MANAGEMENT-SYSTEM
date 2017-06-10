$(document).ready(function() {
    var homeUrl = $('#homeRoute').data('url');
    var visitUrl = $('#visitRoute').data('url');

    $.ajax({
        url: homeUrl,
        type: 'get',
        success:function(data) {
            $('#homeControllersTable').html(data);
        }
    });

    $.ajax({
        url: visitUrl,
        type: 'get',
        success:function(data) {
            $('#visitControllersTable').html(data);
        }
    });

});