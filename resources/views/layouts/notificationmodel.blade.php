@if(count($unreadNotification) > 0)
<div class="row">
    <div class="col-sm-12">
        <button type="button" class="btn btn-primary btn-sm pull-right" id="markAllRead" data-dismiss="modal">Mark All Read</button>
    </div>
</div>
<br>
<div class="row">
    <div class="col-sm-12">
        @foreach($unreadNotification as $notification)
            <div class="note note-{{$notification->notification->class}} notificationbox">
                <h4 class="note-title">{{$notification->notification->title}} <span class="pull-right">{{ date('m-d-Y H:i', strtotime($notification->created_at)) }}Z</span></h4>
                <p>{{$notification->notification->message}} <span class="pull-right"><button type="button" class="btn btn-primary btn-xs markRead" data-id="{{$notification->id}}">Mark Read</button></span></p>
            </div>
        @endforeach
    </div>
</div>
@else
    <h4 style="margin-top: 0;">No Unread Notifications</h4>
@endif