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
});