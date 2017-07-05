$('#cat_icon_new').change(function() {
    var val = $(this).val();
    $('#iconLoadNew').html('<i class="fa fa-'+val+'"></i>');
});

$('#needAuthNew').change(function() {
    if($(this).is(':checked')) {
        $('#permissionsDivNew').show();
    } else {
        $('#permissionsDivNew').hide();
    }
});

$(document).on('change', '#cat_icon_edit', function() {
    var val = $(this).val();
    $('#iconLoadEdit').html('<i class="fa fa-'+val+'"></i>');
});

$(document).on('change', '#needAuthEdit', function() {
    if($(this).is(':checked')) {
        $('#permissionsDivEdit').show();
    } else {
        $('#permissionsDivEdit').hide();
    }
});

$(function() {
    var resortCatUrl = $('#resortCategory').data('url');
    var fixHelper = function(e, ui) {
        ui.children().each(function() {
            $(this).width($(this).width());
        });
        return ui;
    };
    $('#catPanels').sortable({
        helper: fixHelper
    }).disableSelection();
    $('#catPanels').on('sortstop', function(e, ui){
        var new_order = [];
        $('#catPanels .sortablePanel').each(function(i, row){
            new_order.push({
                id: $(row).data('catid'),
                order_index: i+1
            });
        });

        $.ajax({
            url: resortCatUrl,
            type: 'post',
            headers: {
                'X-CSRF-Token' : $('meta[name=_token]').attr('content')
            },
            data: {data: new_order},
            success: function(data) {
                if(data.success == true) {
                    console.log('Categories Resorted');
                }
            }
        });
    });
});

$('.editCategory').click(function() {
    var btn = $(this);
    var url = btn.data('url');
    $('#catFormDiv').hide();
    btn.html('<i class="fa fa-refresh fa-spin"></i>');

    $.ajax({
        url: url,
        type: 'get',
        success: function(data) {
            $('#editCatFormDiv').html(data);
            $('#editFormRow').show();
            btn.html('Edit');
        }
    });
});