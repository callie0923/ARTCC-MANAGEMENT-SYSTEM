@extends('layouts.master')


@section('content')

    <!-- Topic -->

    <div class="panel">
        <div class="page-forum-thread-title panel-title">
            <span class="font-weight-bold">{{ $thread->title }}</span>
    &nbsp;&nbsp;      <span class="text-muted">
                <i class="fa fa-lock simple-tooltip" data-toggle="tooltip" title="Locked" id="lockedIcon" data-original-title="Locked" style="{{ $thread->locked != 1 ? 'display:none' : '' }}"></i>
                <i class="fa fa-circle simple-tooltip" data-toggle="tooltip" title="Sticky" id="stickyIcon" data-original-title="Sticky" style="{{ $thread->sticky != 1 ? 'display:none' : '' }}"></i>
            </span>
            @if(Auth::user()->hasRole(['atm','datm','ta','ec','fe','wm']))
            <div class="pull-right">
                @if($thread->locked == 1)
                    <button class="btn btn-primary unlockThread" type="button"><i class="fa fa-unlock-alt"></i> Unlock</button>
                @else
                    <button class="btn btn-primary lockThread" type="button"><i class="fa fa-lock"></i> Lock</button>
                @endif
                @if($thread->sticky == 1)
                    <button class="btn btn-primary unstickThread" type="button"><i class="fa fa-circle-o"></i> Unstick</button>
                @else
                    <button class="btn btn-primary stickThread" type="button"><i class="fa fa-circle"></i> Stick</button>
                @endif
            </div>
            @endif
        </div>

        <hr>

        <div class="panel-body font-size-14">
            {!! $thread->message !!}
        </div>

        <!-- Topic info -->

        <div class="panel-footer bg-white darken clearfix">
            <div class="box m-y-1 bg-transparent">
                <div class="box-row">
                    <div class="box-cell col-md-4">
                        <div class="box-container">
                            <div class="box-row">
                                <div class="box-cell p-l-1">
                                    <div class="line-height-1"><span class="font-size-11 text-muted">By</span> <a href="{{ route('artcc.roster.member', $thread->owner) }}"><strong>{{ $thread->owner->full_name }}</strong></a></div>
                                    <span class="font-size-11 text-muted">{{ human_time($thread->created_at) }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="page-forum-thread-counters box-cell col-md-4 col-md-offset-4 text-xs-center" style="width:50px">
                        <div class="box-container">
                            <div class="box-row">
                                <div class="box-cell">
                                    <div class="font-size-14 line-height-1"><strong>{{ $thread->views }}</strong></div>
                                    <div class="font-size-11 text-muted">views</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- / Topic info -->

    </div>

    <!-- / Topic -->

    <hr class="page-wide-block">

    <h5 class="m-y-4"><strong>{{ count($thread->replies) }} <span class="text-muted">Replies</span></strong></h5>

    @foreach($thread->replies as $reply)
    <!-- Reply  -->
    <div class="box bg-transparent">
        <div class="box-row">
            <div class="box-cell p-l-2">
                <div class="panel m-a-0">
                    <div class="panel-body p-y-1">
                        <a href="{{ route('artcc.roster.member', $reply->owner) }}"><strong>{{ $reply->owner->full_name }}</strong></a>
                        <div class="text-muted font-size-12">Posted {{ human_time($reply->created_at) }}</div>
                    </div>
                    <hr class="m-y-0">
                    <div class="panel-body">
                        {!! $reply->message !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- / Reply  -->
    @endforeach

    @if((Auth::check() && $thread->locked == 0) || (Auth::check() && Auth::user()->hasRole(['atm','datm','ta','ec','fe','wm'])))
    <!-- add reply section -->
    <div id="ReplySection">
        <hr class="page-wide-block">
        <h5 class="m-y-4"><strong>Write your reply</strong></h5>
        <form action="{{ route('forum.thread.reply', [$category, $board, $thread]) }}" class="clearfix" method="post">
            {{ csrf_field() }}
            <div class="box bg-transparent m-b-2 position-static">
                <div class="box-row">
                    <div class="box-cell p-l-2">
                        <div class="panel m-a-0">
                            <textarea name="content" id="content" cols="30" rows="10"></textarea>
                        </div>
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-lg btn-primary p-x-4 pull-xs-right">Post</button>
        </form>

        <script>
            $(document).ready(function() {
                $('#content').summernote({
                    height: 350,
                    popover: {
                        image: [
                            ['custom', ['imageAttributes']],
                            ['imagesize', ['imageSize100', 'imageSize50', 'imageSize25']],
                            ['float', ['floatLeft', 'floatRight', 'floatNone']],
                            ['remove', ['removeMedia']]
                        ]
                    }
                });
                $('#contentDisplay').show();
            });
        </script>
    </div>

    @endif

    @if(Auth::user()->hasRole(['atm','datm','ta','ec','fe','wm']))
        <script>
            $(document).on('click', '.unlockThread', function() {
                var btn = $(this);
                btn.html('<i class="fa fa-refresh fa-spin"></i>');
                $.ajax({
                    url: "{{ route('forum.thread.lockstatus', $thread) }}",
                    action: 'get',
                    success: function(data) {
                        if(data.success == "true") {
                            $('#lockedIcon').hide();
                            btn.html('<i class="fa fa-lock"></i> Lock').removeClass('unlockThread').addClass('lockThread');
                        }
                    }

                })
            });
            $(document).on('click', '.lockThread', function() {
                var btn = $(this);
                btn.html('<i class="fa fa-refresh fa-spin"></i>');
                $.ajax({
                    url: "{{ route('forum.thread.lockstatus', $thread) }}",
                    action: 'get',
                    success: function(data) {
                        if(data.success == "true") {
                            $('#lockedIcon').show();
                            btn.html('<i class="fa fa-unlock-alt"></i> Unlock').removeClass('lockThread').addClass('unlockThread');
                        }
                    }

                })
            });
            $(document).on('click', '.unstickThread', function() {
                var btn = $(this);
                btn.html('<i class="fa fa-refresh fa-spin"></i>');
                $.ajax({
                    url: "{{ route('forum.thread.stickystatus', $thread) }}",
                    action: 'get',
                    success: function(data) {
                        if(data.success == "true") {
                            $('#stickyIcon').hide();
                            btn.html('<i class="fa fa-circle"></i> Stick').removeClass('unstickThread').addClass('stickThread');
                        }
                    }

                })
            });
            $(document).on('click', '.stickThread', function() {
                var btn = $(this);
                btn.html('<i class="fa fa-refresh fa-spin"></i>');
                $.ajax({
                    url: "{{ route('forum.thread.stickystatus', $thread) }}",
                    action: 'get',
                    success: function(data) {
                        if(data.success == "true") {
                            $('#stickyIcon').show();
                            btn.html('<i class="fa fa-circle-o"></i> Unstick').removeClass('stickThread').addClass('unstickThread');
                        }
                    }

                })
            });
        </script>

    @endif

@endsection