$(document).ready(function() {
    var updateCertsUrl = $('#updateCertsUrl').data('url');

    $('#saveCerts').click(function() {
        var form = $('#certsForm');
        var btn = $(this);
        var user_id = btn.data('id');
        var min_del = form.find('#certMinorDel').val();
        var min_gnd = form.find('#certMinorGnd').val();
        var min_twr = form.find('#certMinorTwr').val();
        var min_app = form.find('#certMinorApp').val();
        var maj_del = form.find('#certMajorDel').val();
        var maj_gnd = form.find('#certMajorGnd').val();
        var maj_twr = form.find('#certMajorTwr').val();
        var maj_app = form.find('#certMajorApp').val();
        var enroute = form.find('#certEnroute').val();

        var data = {
            user_id:user_id,
            min_del:min_del,
            min_gnd:min_gnd,
            min_twr:min_twr,
            min_app:min_app,
            maj_del:maj_del,
            maj_gnd:maj_gnd,
            maj_twr:maj_twr,
            maj_app:maj_app,
            enroute:enroute,
        };

        btn.html('<i class="fa fa-refresh fa-spin"></i>');

        $.ajax({
            url: updateCertsUrl,
            type: 'post',
            headers: {
                'X-CSRF-Token' : $('meta[name=_token]').attr('content')
            },
            data: data,
            success: function(data) {
                if(data.success == true) {
                    btn.html('Save Certs');
                }
            }

        });

    });

});