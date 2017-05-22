$('.airportupdateswitch').change(function() {
    var airport_id = $(this).data('airportid');
    var status = ($(this).prop('checked') === true) ? 1 : 0;
    var url = $('#postDataUrl').data('url');

    $.ajax({
        url: url,
        type: 'post',
        data: { airport_id: airport_id, status: status }
    });

});