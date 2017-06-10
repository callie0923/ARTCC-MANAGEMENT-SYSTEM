$(document).ready(function() {
    var wxUrl = $('#wxRoute').data('url');
    var atcUrl = $('#atcRoute').data('url');
    var newsUrl = $('#newsRoute').data('url');
    var promotionsUrl = $('#promotionsRoute').data('url');
    var membersUrl = $('#membersRoute').data('url');

    $.ajax({
        url: wxUrl,
        type: 'get',
        success:function(data) {
            $('#wxTableBody').html(data);
        }
    });

    $.ajax({
        url: atcUrl,
        type: 'get',
        success:function(data) {
            $('#atcTableBody').html(data);
        }
    });

    $.ajax({
        url: newsUrl,
        type: 'get',
        success:function(data) {
            $('#newsPanel').html(data);
        }
    });

    $.ajax({
        url: membersUrl,
        type: 'get',
        success:function(data) {
            $('#membersPanel').html(data);
        }
    });

    $.ajax({
        url: promotionsUrl,
        type: 'get',
        success:function(data) {
            $('#promotionsPanel').html(data);
        }
    });
});