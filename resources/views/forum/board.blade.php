@extends('layouts.master', ['pageTitle' => $board->name])


@section('content')

    @if(count($board->stickyThreads) > 0)
        <div class="row">
            <div class="col-sm-12">
                <h6 class="font-weight-semibold m-y-3" style="margin-top: 0!important;">STICKY</h6>
                @foreach($board->stickyThreads as $thread)
                    <div class="page-forum-topics-item box panel p-y-2 p-x-3">
                        <div class="box-row">
                            <div class="box-cell col-md-7 col-lg-8 col-xl-9 p-r-4">
                                <div class="page-forum-topics-title font-size-14">
                                    <a href="#" class="font-weight-semibold">{{ $thread->name }}</a>
                                    &nbsp;&nbsp;
                                    <span class="text-muted">
                                        @if($thread->locked == 1)
                                            <i class="fa fa-lock simple-tooltip" title="Locked"></i>
                                        @endif
                                        <i class="fa fa-dot-circle-o simple-tooltip" title="Sticky"></i>
                                    </span>
                                </div>
                                <div class="font-size-11 text-muted">
                                    By <a href="#"><strong>{{ $thread->owner->full_name }}</strong></a> · {{ human_time($thread->created_at) }}
                                    @if(count($thread->replies) > 0)
                                        | Last Reply By <a href="#"><strong>{{$thread->lastReplyUser()}}</strong></a> · {{ human_time($thread->lastReplyTime()) }}
                                    @endif
                                </div>
                            </div>

                            <!-- Spacer -->
                            <hr class="visible-xs visible-sm m-y-2">

                            <div class="box-cell col-md-5 col-lg-4 col-xl-3 valign-middle text-md-center">
                                <!-- Reset container's height by wrapping in a div -->
                                <div class="pull-md-right">
                                    <div class="box-container width-md-auto valign-middle">
                                        <div class="box-cell p-l-1 p-r-3">
                                            <div class="font-size-14 text-primary"><strong>{{ count($thread->replies) }}</strong></div>
                                            <div class="font-size-11 text-muted line-height-1">replies</div>
                                        </div>
                                        <div class="box-cell p-x-3 b-l-1">
                                            <div class="font-size-14"><strong>{{ $thread->views }}</strong></div>
                                            <div class="font-size-11 text-muted line-height-1">views</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endif

    @if(count($board->stickyThreads) > 0 && count($board->threads) > 0)
    <hr class="page-wide-block m-t-0">
    @endif

    @if(count($board->threads) > 0)
        <div class="row">
            <div class="col-sm-12">
                <h6 class="font-weight-semibold m-y-3" style="margin-top: 0!important;">DISCUSSION</h6>
                @foreach($board->threads as $thread)
                    <div class="page-forum-topics-item box panel p-y-2 p-x-3">
                        <div class="box-row">
                            <div class="box-cell col-md-7 col-lg-8 col-xl-9 p-r-4">
                                <div class="page-forum-topics-title font-size-14">
                                    <a href="#" class="font-weight-semibold">{{ $thread->name }}</a>
                                    &nbsp;&nbsp;
                                    <span class="text-muted">
                                        @if($thread->locked == 1)
                                            <i class="fa fa-lock simple-tooltip" title="Locked"></i>
                                        @endif
                                    </span>
                                </div>
                                <div class="font-size-11 text-muted">
                                    By <a href="#"><strong>{{ $thread->owner->full_name }}</strong></a> · {{ human_time($thread->created_at) }}
                                    @if(count($thread->replies) > 0)
                                    | Last Reply By <a href="#"><strong>{{$thread->lastReplyUser()}}</strong></a> · {{ human_time($thread->lastReplyTime()) }}
                                    @endif
                                </div>
                            </div>

                            <!-- Spacer -->
                            <hr class="visible-xs visible-sm m-y-2">

                            <div class="box-cell col-md-5 col-lg-4 col-xl-3 valign-middle text-md-center">
                                <!-- Reset container's height by wrapping in a div -->
                                <div class="pull-md-right">
                                    <div class="box-container width-md-auto valign-middle">
                                        <div class="box-cell p-l-1 p-r-3">
                                            <div class="font-size-14 text-primary"><strong>{{ count($thread->replies) }}</strong></div>
                                            <div class="font-size-11 text-muted line-height-1">replies</div>
                                        </div>
                                        <div class="box-cell p-x-3 b-l-1">
                                            <div class="font-size-14"><strong>{{ $thread->views }}</strong></div>
                                            <div class="font-size-11 text-muted line-height-1">views</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endif

@endsection