$(document).ready(function() {
    var url = $('#routeGenUrl').data('url');
    var btn = $('#processBtn');

    setInterval(function() {
        if(!btn.hasClass('btn-loading')) {
            var departure_input = $('#depIcao').val();
            var arrival_input = $('#arrIcao').val();
            if(departure_input.length !== 4 || arrival_input.length !== 4) {
                btn.attr('disabled', true);
            } else {
                btn.attr('disabled', false);
            }
        }
    }, 100);

    btn.click(function() {
        btn.addClass('btn-loading').attr('disabled', true);
        $.ajax({
            url: url,
            type: 'post',
            data: {departure_icao: $('#depIcao').val(), arrival_icao: $('#arrIcao').val()},
            success: function(data) {
                $('#populateData').html(data.html);
                $("#resultsTable > tbody > tr").each(function(i, tr) {
                    $(tr.cells[1]).each(function(index, td) {
                        var name = td.getElementsByTagName("span").item(0).innerText;
                        td.getElementsByTagName("span").item(0).innerHTML = name;
                    });
                    $(tr.cells[2]).each(function(index, td) {
                        var name = td.getElementsByTagName("span").item(0).innerText;
                        td.getElementsByTagName("span").item(0).innerHTML = name;
                    });
                });
                $('#populateDataRow').show();
                btn.removeClass('btn-loading');
            }
        })
    });
});