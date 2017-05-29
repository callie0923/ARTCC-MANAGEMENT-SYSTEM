$(document).ready(function() {

    if($('#api_key').val().length > 0) {
        $.ajax({
            url: 'https://api.vatusa.net/'+$('#api_key').val()+'/roster',
            type: 'get',
            error: function(data) {
                var json = $.parseJSON(data.responseText);
                $('#ip').val(json.ip);
                $('#ipdiv').show();
            }
        });
    }


    var postUrl = $('#postDataUrl').data('url');
    var btn = $('#btnSave');

    btn.on('click', function() {
        var artcc_code = $('#artcc_code option:selected').val();
        var uls_key = $('#uls_key').val();
        var api_key = $('#api_key').val();
        var wx_nex_gen_radar = $('#wx_nex_gen_radar').val();
        var wx_vis_radar = $('#wx_vis_radar').val();
        var wx_infrared_radar = $('#wx_infrared_radar').val();
        var wx_wind_surface_data = $('#wx_wind_surface_data').val();

        btn.addClass('btn-loading');
        var data = {'artcc_code':artcc_code, 'uls_key':uls_key, 'api_key':api_key, 'wx_nex_gen_radar':wx_nex_gen_radar, 'wx_vis_radar':wx_vis_radar, 'wx_infrared_radar':wx_infrared_radar, 'wx_wind_surface_data':wx_wind_surface_data};

        $.ajax({
            url: postUrl,
            type: 'post',
            data: data,
            success: function() {
                $('#settingsUpdated').show();
                btn.removeClass('btn-loading');
            }
        });

    });

    var customFile = $('.custom-file');
    customFile.pxFile();
    setInterval(function() {
        if(customFile.hasClass('px-file-has-value')) {
            $('#fileUploadBtn').show();
        } else {
            $('#fileUploadBtn').hide();
        }
    }, 100);
});
