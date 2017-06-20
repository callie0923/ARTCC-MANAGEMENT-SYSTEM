$(document).ready(function() {
    var getRosterUrl = $('#loadRosterUrl').data('url');
    var homeDiv = $('#homeDiv');
    var visitingDiv = $('#visitingDiv');
    var formerDiv = $('#formerDiv');

    $.ajax({
        url: getRosterUrl,
        type: 'get',
        success: function(data) {
            console.log(data);
            if(data.home) {
                homeDiv.html(data.home);
            }
            if(data.visit) {
                visitingDiv.html(data.visit);
            }
            if(data.former) {
                formerDiv.html(data.former);
            }
        }
    })
});