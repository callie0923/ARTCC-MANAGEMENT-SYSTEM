@extends('layouts.master', ['pageTitle' => $category->name])


@section('content')

    <div class="row">
        <div class="col-sm-12">
            @foreach($category->boards as $board)
                @if($board->UserCanView())
                    <div class="page-forums-list-item box panel p-y-2 p-x-3">
                        <div class="box-row">
                            <div class="page-forums-list-title box-cell col-md-7 col-lg-8 col-xl-9 p-r-4">
                                @if($board->hasUnreadPosts())
                                    <i class="fa fa-power-off simple-tooltip" title="Unread" style="color:blue"></i>
                                @endif
                                <a href="{{ route('forum.board', [$category, $board]) }}" class="font-size-15 font-weight-bold">{{ $board->name }}</a>
                                <div>
                                    {{ $board->description }}
                                </div>
                            </div>

                            <!-- Spacer -->
                            <hr class="visible-xs visible-sm m-y-2">

                            <div class="box-cell col-md-5 col-lg-4 col-xl-3 valign-middle text-md-center">
                                <div class="pull-md-right">
                                    <div class="box-container width-md-auto valign-middle">
                                        <div class="box-cell p-l-1 p-r-3">
                                            <div class="font-size-14"><strong>{{ count($board->threads) }}</strong></div>
                                            <div class="font-size-11 text-muted line-height-1">topics</div>
                                        </div>
                                        <div class="box-cell p-x-3 b-l-1">
                                            <div class="font-size-14"><strong>{{ $board->reply_count }}</strong></div>
                                            <div class="font-size-11 text-muted line-height-1">replies</div>
                                        </div>
                                        <div class="box-cell p-l-3 p-r-1 b-l-1">
                                            <div class="font-size-11 text-muted">Updated</div>
                                            <div class="font-size-14 line-height-1"><span class="font-size-12">{{ human_time($board->last_update) }}</span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>

@endsection