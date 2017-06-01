$(document).ready(function() {
    var user_search_url = $('#userSearchUrl').data('url');
    var role_update_url = $('#roleUpdateUrl').data('url');
    var training_role_update_url = $('#trainingRoleUpdateUrl').data('url');

    $(document).on('click', '.editRole', function() {
        var btn = $(this);
        var role_id = btn.data('roleid');
        var td = btn.parent().parent().children('.rolenamebox');
        td.html('<input type="text" class="form-control userSearch" data-roleid="'+role_id+'">');
    });

    $(document).on('click', '.vacateRole', function() {
        var btn = $(this);
        var role_id = btn.data('roleid');
        var td = btn.parent().parent().children('.rolenamebox');
        td.html('VACANT');
        $.ajax({
            url: role_update_url,
            type: 'post',
            data: {user_id:'NA', role_id:role_id}
        });
    });

    $(document).on('focus', '.userSearch', function() {
        var input = $(this);
        var parent = input.parent();
        var role_id = input.data('roleid');
        $('.userSearch').autocomplete({
            source: function (request, response) {
                $.getJSON(user_search_url + "?query=" + request.term, function (data) {
                    response($.map(data, function (value, key) {
                        return {
                            label: value.first_name+' '+value.last_name,
                            value: value.first_name+' '+value.last_name,
                            user_id: value.id
                        };
                    }));
                });
            },
            select: function (event, value) {
                var user_id = value.item.user_id;
                var name = value.item.label;
                parent.html(name);
                $.ajax({
                    url: role_update_url,
                    type: 'post',
                    data: {user_id:user_id, role_id:role_id}
                });
            },
            minLength: 2
        });
    });

    $('#trainingRoleId').change(function() {
        $('.trainingUserSearch').prop('disabled', false);
    });

    $(function() {
        $('.trainingUserSearch').autocomplete({
            source: function (request, response) {
                $.getJSON(user_search_url + "?query=" + request.term, function (data) {
                    response($.map(data, function (value, key) {
                        return {
                            label: value.first_name+' '+value.last_name,
                            value: value.first_name+' '+value.last_name,
                            user_id: value.id
                        };
                    }));
                });
            },
            select: function (event, value) {
                var user_id = value.item.user_id;
                var name = value.item.label;
                var role_id = $('#trainingRoleId option:selected').val();
                $('#training_user_id').val(user_id);
                $('#training_user_name').val(name);
                $.ajax({
                    url: training_role_update_url,
                    type: 'post',
                    data: {user_id:user_id, role_id:role_id, action:'new'},
                    success: function(data) {
                        if(data.success == false) {
                            $('#trainingAlert').text(data.message);
                            $('#trainingAlert').parent().show();
                        } else {
                            $('#training_user_id').val('');
                            $('.trainingUserSearch').val('');
                            $('#trainingAlert').parent().hide();

                            if(role_id == 10) {
                                var html = '<tr><td>'+name+'</td><td><button class="btn btn-xs btn-danger deleteTrainingStaff" data-roleid="10" data-userid="'+user_id+'" type="button"><i class="fa fa-times"></i></button></td></tr>';
                                $('#instructorTable').append(html);
                            } else if(role_id == 11) {
                                var html = '<tr><td>'+name+'</td><td><button class="btn btn-xs btn-danger deleteTrainingStaff" data-roleid="11" data-userid="'+user_id+'" type="button"><i class="fa fa-times"></i></button></td></tr>';
                                $('#mentorTable').append(html);
                            }

                        }
                    }
                });
            },
            minLength: 2
        });
    });

    $(document).on('click', '.deleteTrainingStaff', function() {
        var btn = $(this);
        var user_id = btn.data('userid');
        var role_id = btn.data('roleid');
        var row = btn.parent().parent();

        $.ajax({
            url: training_role_update_url,
            type: 'post',
            data: {role_id:role_id, user_id:user_id, action:'del'},
            success: function(data) {
                if(data.success == true) {
                    row.remove();
                }
            }
        })
    });
});
