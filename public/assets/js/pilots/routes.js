$(document).ready(function() {
    var url = $('#routeGenUrl').data('url');
    var airport_url = $('#airportSearchUrl').data('url');
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
                if($('#resultsTable tbody').length === 0) {
                    $("#resultsTable").append("<tbody><tr><td colspan='6' class='row2'>NO ROUTES FOUND FOR SPECIFIED DEPARTURE AND ARRIVAL AIRPORTS</td></tr></tbody>");
                }
                $('#populateDataRow').show();
                btn.removeClass('btn-loading');
            }
        })
    });

    $('#depIcaoSearch').click(function() {
        $(this).val('');
        $('#depIcao').val('');
    });
    $('#arrIcaoSearch').click(function() {
        $(this).val('');
        $('#arrIcao').val('');
    });

    $(function () {
        $('#depIcaoSearch').autocomplete({
            source: function (request, response) {
                $.getJSON(airport_url + "?query=" + request.term, function (data) {
                    response($.map(data, function (value, key) {
                        return {
                            label: value.name+' ('+value.iata+'/'+value.icao+')',
                            value: value.name+' ('+value.iata+'/'+value.icao+')',
                            icao: value.icao
                        };
                    }));
                });
            },
            select: function (event, value) {
                $('#depIcao').val(value.item.icao);

            },
            minLength: 2
        });
    });
    $(function () {
        $('#arrIcaoSearch').autocomplete({
            source: function (request, response) {
                $.getJSON(airport_url + "?query=" + request.term, function (data) {
                    response($.map(data, function (value, key) {
                        return {
                            label: value.name+' ('+value.iata+'/'+value.icao+')',
                            value: value.name+' ('+value.iata+'/'+value.icao+')',
                            icao: value.icao
                        };
                    }));
                });
            },
            select: function (event, value) {
                $('#arrIcao').val(value.item.icao);

            },
            minLength: 2
        });
    });
});
