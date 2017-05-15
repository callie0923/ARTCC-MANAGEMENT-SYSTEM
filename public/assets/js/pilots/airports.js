$(document).ready(function() {
    var airport_search_url = $('#airportSearchUrl').data('url');
    var airport_url = $('#airportUrl').data('url');

    $(function () {
        $('#airportSearch').autocomplete({
            source: function (request, response) {
                $.getJSON(airport_search_url + "?query=" + request.term, function (data) {
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
                var icao = value.item.icao;
                var url = airport_url + '/' + icao;
                window.open(url, '_self');
            },
            minLength: 2
        });
    });
});
