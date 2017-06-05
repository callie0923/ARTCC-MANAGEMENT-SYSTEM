$(document).ready(function() {
    var wxUrl = $('#wxRoute').data('url');
    var atcUrl = $('#atcRoute').data('url');

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
});