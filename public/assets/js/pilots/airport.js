$(document).ready(function() {
    var chartsUrl = $('#loadChartsUrl').attr('data-url');
    var chartDiv = $('#chartDiv');
    $.ajax({
        type: 'get',
        url: chartsUrl,
        success: function(data) {
            chartDiv.html(data);
        }
    });

    var weatherUrl = $('#loadWeatherUrl').attr('data-url');
    var weatherDiv = $('#weatherDiv');
    $.ajax({
        type: 'get',
        url: weatherUrl,
        success: function(data) {
            weatherDiv.html(data);
            $('#mapDiv').show();
        }
    });
});