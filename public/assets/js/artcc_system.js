$(document).ready(function() {

    if($('#authStatus').data('status') === 'auth') {
        var notificationCountButton = $('.notificationButton');
        window.setInterval(function() {
            $.ajax({
                url: '/api/notificationcount',
                type: 'get',
                success: function(data) {
                    noteCount = data.count;

                    if(noteCount < 6 && noteCount > 0) {
                        notificationCountButton.removeClass('btn-warning').removeClass('btn-danger').removeClass('btn-success').addClass('btn-warning');
                        notificationCountButton.text(noteCount+' Unread Notifications');
                        notificationCountButton.css({"background":"#db9839","border-color":"transparent!important","color":"#fff!important"});
                    } else if(noteCount === 0) {
                        $('#notificationModal').modal('hide');
                        notificationCountButton.removeClass('btn-warning').removeClass('btn-danger').removeClass('btn-success').addClass('btn-success');
                        notificationCountButton.text('0 Unread Notifications');
                        notificationCountButton.css({"background":"#6fb952","border-color":"transparent!important","color":"#fff!important"});
                    } else {
                        notificationCountButton.removeClass('btn-warning').removeClass('btn-danger').removeClass('btn-success').addClass('btn-danger');
                        notificationCountButton.text(noteCount+' Unread Notifications');
                        notificationCountButton.css({"background":"#e25443","border-color":"transparent!important","color":"#fff!important"});
                    }
                }
            });
        }, 10000);
    }

    $(document).on('click', '.notificationButton', function() {
        $('#notificationModalBody').html('<center><i class="fa fa-refresh fa-spin fa-5x"></i></center>');
        $('#notificationModal').modal('show');
        $.ajax({
            url: '/api/notifications',
            type: 'get',
            success: function(data) {
                $('#notificationModalBody').html(data);
            }
        });
    });

    // mark all notifications read
    $(document).on('click', '#markAllRead', function() {
        var notification = $('.notificationbox');
        var notificationCountButton = $('.notificationButton');
        $.ajax({
            url: '/api/notifications/markallread',
            type: 'post',
            success: function(data) {
                if(data.success === 'true') {
                    notification.remove();
                    notificationCountButton.removeClass('btn-warning').removeClass('btn-danger').removeClass('btn-success').addClass('btn-success');
                    notificationCountButton.text('0 Unread Notifications');
                    notificationCountButton.css({"background":"#6fb952","border-color":"transparent!important","color":"#fff!important"});
                }
            }
        });
    });

    // mark individual notification read
    $(document).on('click', '.markRead', function() {
        var btn = $(this);
        var userNotificationId = btn.data('id');
        var notification = btn.closest('.notificationbox');
        var notificationCountButton = $('.notificationButton');
        $.ajax({
            url: '/api/notifications/markread',
            type: 'post',
            data: {userNotificationId:userNotificationId},
            success: function(data) {
                if(data.success === 'true') {
                    notification.remove();
                    var noteCount = $('.notificationbox').length;

                    if(noteCount < 6 && noteCount > 0) {
                        notificationCountButton.removeClass('btn-warning').removeClass('btn-danger').removeClass('btn-success').addClass('btn-warning');
                        notificationCountButton.text(noteCount+' Unread Notifications');
                        notificationCountButton.css({"background":"#db9839","border-color":"transparent!important","color":"#fff!important"});
                    } else if(noteCount === 0) {
                        $('#notificationModal').modal('hide');
                        notificationCountButton.removeClass('btn-warning').removeClass('btn-danger').removeClass('btn-success').addClass('btn-success');
                        notificationCountButton.text('0 Unread Notifications');
                        notificationCountButton.css({"background":"#6fb952","border-color":"transparent!important","color":"#fff!important"});
                    } else {
                        notificationCountButton.removeClass('btn-warning').removeClass('btn-danger').removeClass('btn-success').addClass('btn-danger');
                        notificationCountButton.text(noteCount+' Unread Notifications');
                        notificationCountButton.css({"background":"#e25443","border-color":"transparent!important","color":"#fff!important"});
                    }
                }
            }
        });
    });

});