@extends('layouts.master')


@section('content')

    <!-- Topic -->

    <div class="panel">
        <div class="page-forum-thread-title panel-title">
            <span class="font-weight-bold">Lorem ipsum dolor sit amet, consectetur adipiscing elit</span>
            &nbsp;&nbsp;<span class="font-size-13"><span class="label label-info">Info</span></span>
            &nbsp;&nbsp;<span class="text-muted"><i class="fa fa-lock" data-toggle="tooltip" title="" data-original-title="Locked"></i>&nbsp;&nbsp;<i class="fa fa-dot-circle-o" data-toggle="tooltip" title="" data-original-title="Sticky"></i></span>
        </div>

        <hr>

        <div class="panel-body font-size-14">
            <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras sagittis,
                erat ut faucibus interdum, velit erat elementum libero, ut efficitur dolor
                velit eget odio.
            </p>
            <blockquote>
                Ut at nunc rhoncus, dignissim metus id, posuere sem. Phasellus venenatis
                eu turpis id vehicula. Fusce tristique quam blandit lorem malesuada euismod.
            </blockquote>
            <p>
                Nunc et dui quis lacus tristique ullamcorper quis sit amet massa. In
                ullamcorper vitae erat mollis viverra. Cras rhoncus bibendum urna, vitae
                congue velit suscipit vel. Fusce facilisis posuere quam, at accumsan diam
                pretium et.
                <br><br>
            </p>
            <pre><code>$('[data-toggle="tooltip"]').tooltip();</code></pre>
            <p>
                <br>
                Aenean gravida elit a ante ultricies, non dignissim magna sollicitudin.
                In ligula turpis, suscipit sed ullamcorper eu, efficitur non lacus.
                Nulla et est tempus, pulvinar turpis in, scelerisque tellus. Vivamus
                aliquam dolor nec risus semper consectetur. Maecenas dapibus lacus
                dapibus eros gravida, sed tempor orci blandit.
            </p>
        </div>
        <div class="page-forum-thread-actions p-x-3 p-b-3 clearfix">
            <div class="pull-xs-right">
                <a href="#" class="btn btn-danger btn-outline btn-outline-colorless b-a-0 font-size-14" data-toggle="tooltip" title="" data-original-title="Like"><i class="fa fa-heart"></i></a>
                <a href="#" class="btn btn-outline btn-outline-colorless b-a-0 font-size-14" data-toggle="tooltip" title="" data-original-title="Link"><i class="fa fa-link"></i></a>
            </div>
        </div>

        <!-- Topic info -->

        <div class="panel-footer bg-white darken clearfix">
            <div class="box m-y-1 bg-transparent">
                <div class="box-row">
                    <div class="box-cell col-md-4">
                        <div class="box-container">
                            <div class="box-row">
                                <div class="box-cell" style="width: 30px;">
                                    <img src="assets/demo/avatars/1.jpg" alt="" class="border-round" style="width: 100%;">
                                </div>
                                <div class="box-cell p-l-1">
                                    <div class="line-height-1"><span class="font-size-11 text-muted">by</span> <a href="#"><strong>John Doe</strong></a></div>
                                    <span class="font-size-11 text-muted">5d ago</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr class="m-y-1 visible-xs visible-sm">
                    <div class="box-cell col-md-4">
                        <div class="font-size-11 text-muted line-height-1">last reply by</div>
                        <a href="#"><strong>Denise Steiner</strong></a><span class="font-size-11 text-muted"> · 15m ago</span>
                    </div>
                    <hr class="m-y-1 visible-xs visible-sm">
                    <div class="page-forum-thread-counters box-cell col-md-4 text-xs-center">
                        <div class="box-container">
                            <div class="box-row">
                                <div class="box-cell">
                                    <div class="font-size-14 line-height-1"><strong>555</strong></div>
                                    <div class="font-size-11 text-muted">views</div>
                                </div>
                                <div class="box-cell b-l-1">
                                    <div class="font-size-14 line-height-1"><strong>25</strong></div>
                                    <div class="font-size-11 text-muted">likes</div>
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

    <h5 class="m-y-4"><strong>8 <span class="text-muted">replies</span></strong></h5>

    <!-- Reply  -->
    <div class="box bg-transparent">
        <div class="box-row">
            <div class="box-cell p-y-1" style="width: 40px;">
                <img src="assets/demo/avatars/2.jpg" alt="" class="border-round" style="width: 100%;">
            </div>
            <div class="box-cell p-l-2">
                <div class="panel m-a-0">
                    <div class="panel-body p-y-1">
                        <div class="page-forum-thread-actions pull-xs-right p-t-1">
                            <a href="#" class="btn btn-sm btn-outline btn-outline-colorless b-a-0 font-size-14" data-toggle="tooltip" title="" data-original-title="Link"><i class="fa fa-link"></i></a>
                        </div>

                        <a href="#"><strong>Robert Jang</strong></a>
                        <div class="text-muted font-size-12">posted 3d ago</div>
                    </div>
                    <hr class="m-y-0">
                    <div class="panel-body">
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras sagittis,
                            erat ut faucibus interdum, velit erat elementum libero, ut efficitur dolor
                            velit eget odio.
                        </p>
                        <p>
                            Nunc et dui quis lacus tristique ullamcorper quis sit amet massa. In
                            ullamcorper vitae erat mollis viverra. Cras rhoncus bibendum urna, vitae
                            congue velit suscipit vel. Fusce facilisis posuere quam, at accumsan diam
                            pretium et.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- / Reply  -->

    <!-- Reply  -->
    <div class="box bg-transparent">
        <div class="box-row">
            <div class="box-cell p-y-1" style="width: 40px;">
                <img src="assets/demo/avatars/3.jpg" alt="" class="border-round" style="width: 100%;">
            </div>
            <div class="box-cell p-l-2">
                <div class="panel m-a-0">
                    <div class="panel-body p-y-1">
                        <div class="page-forum-thread-actions pull-xs-right p-t-1">
                            <a href="#" class="btn btn-sm btn-outline btn-outline-colorless b-a-0 font-size-14" data-toggle="tooltip" title="" data-original-title="Link"><i class="fa fa-link"></i></a>
                        </div>

                        <a href="#"><strong>Michelle Bortz</strong></a>
                        <div class="text-muted font-size-12">posted 3d ago</div>
                    </div>
                    <hr class="m-y-0">
                    <div class="panel-body">
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras sagittis,
                            erat ut faucibus interdum, velit erat elementum libero, ut efficitur dolor
                            velit eget odio.
                        </p>
                        <p>
                            Nunc et dui quis lacus tristique ullamcorper quis sit amet massa. In
                            ullamcorper vitae erat mollis viverra. Cras rhoncus bibendum urna, vitae
                            congue velit suscipit vel. Fusce facilisis posuere quam, at accumsan diam
                            pretium et.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Reply  -->

    <!-- Reply  -->
    <div class="box bg-transparent">
        <div class="box-row">
            <div class="box-cell p-y-1" style="width: 40px;">
                <img src="assets/demo/avatars/4.jpg" alt="" class="border-round" style="width: 100%;">
            </div>
            <div class="box-cell p-l-2">
                <div class="panel m-a-0">
                    <div class="panel-body p-y-1">
                        <div class="page-forum-thread-actions pull-xs-right p-t-1">
                            <a href="#" class="btn btn-sm btn-outline btn-outline-colorless b-a-0 font-size-14" data-toggle="tooltip" title="" data-original-title="Link"><i class="fa fa-link"></i></a>
                        </div>

                        <a href="#"><strong>Timothy Owens</strong></a>
                        <div class="text-muted font-size-12">posted 3d ago</div>
                    </div>
                    <hr class="m-y-0">
                    <div class="panel-body">
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras sagittis,
                            erat ut faucibus interdum, velit erat elementum libero, ut efficitur dolor
                            velit eget odio.
                        </p>
                        <p>
                            Nunc et dui quis lacus tristique ullamcorper quis sit amet massa. In
                            ullamcorper vitae erat mollis viverra. Cras rhoncus bibendum urna, vitae
                            congue velit suscipit vel. Fusce facilisis posuere quam, at accumsan diam
                            pretium et.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- / Reply  -->

    <!-- Reply  -->
    <div class="box bg-transparent">
        <div class="box-row">
            <div class="box-cell p-y-1" style="width: 40px;">
                <img src="assets/demo/avatars/5.jpg" alt="" class="border-round" style="width: 100%;">
            </div>
            <div class="box-cell p-l-2">
                <div class="panel m-a-0">
                    <div class="panel-body p-y-1">
                        <div class="page-forum-thread-actions pull-xs-right p-t-1">
                            <a href="#" class="btn btn-sm btn-outline btn-outline-colorless b-a-0 font-size-14" data-toggle="tooltip" title="" data-original-title="Link"><i class="fa fa-link"></i></a>
                        </div>

                        <a href="#"><strong>Denise Steiner</strong></a>
                        <div class="text-muted font-size-12">posted 3d ago</div>
                    </div>
                    <hr class="m-y-0">
                    <div class="panel-body">
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras sagittis,
                            erat ut faucibus interdum, velit erat elementum libero, ut efficitur dolor
                            velit eget odio.
                        </p>
                        <p>
                            Nunc et dui quis lacus tristique ullamcorper quis sit amet massa. In
                            ullamcorper vitae erat mollis viverra. Cras rhoncus bibendum urna, vitae
                            congue velit suscipit vel. Fusce facilisis posuere quam, at accumsan diam
                            pretium et.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- / Reply  -->

    <!-- Reply  -->
    <div class="box bg-transparent">
        <div class="box-row">
            <div class="box-cell p-y-1" style="width: 40px;">
                <img src="assets/demo/avatars/2.jpg" alt="" class="border-round" style="width: 100%;">
            </div>
            <div class="box-cell p-l-2">
                <div class="panel m-a-0">
                    <div class="panel-body p-y-1">
                        <div class="page-forum-thread-actions pull-xs-right p-t-1">
                            <a href="#" class="btn btn-sm btn-outline btn-outline-colorless b-a-0 font-size-14" data-toggle="tooltip" title="" data-original-title="Link"><i class="fa fa-link"></i></a>
                        </div>

                        <a href="#"><strong>Robert Jang</strong></a>
                        <div class="text-muted font-size-12">posted 3d ago</div>
                    </div>
                    <hr class="m-y-0">
                    <div class="panel-body">
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras sagittis,
                            erat ut faucibus interdum, velit erat elementum libero, ut efficitur dolor
                            velit eget odio.
                        </p>
                        <p>
                            Nunc et dui quis lacus tristique ullamcorper quis sit amet massa. In
                            ullamcorper vitae erat mollis viverra. Cras rhoncus bibendum urna, vitae
                            congue velit suscipit vel. Fusce facilisis posuere quam, at accumsan diam
                            pretium et.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- / Reply  -->

    <!-- Reply  -->
    <div class="box bg-transparent">
        <div class="box-row">
            <div class="box-cell p-y-1" style="width: 40px;">
                <img src="assets/demo/avatars/3.jpg" alt="" class="border-round" style="width: 100%;">
            </div>
            <div class="box-cell p-l-2">
                <div class="panel m-a-0">
                    <div class="panel-body p-y-1">
                        <div class="page-forum-thread-actions pull-xs-right p-t-1">
                            <a href="#" class="btn btn-sm btn-outline btn-outline-colorless b-a-0 font-size-14" data-toggle="tooltip" title="" data-original-title="Link"><i class="fa fa-link"></i></a>
                        </div>

                        <a href="#"><strong>Michelle Bortz</strong></a>
                        <div class="text-muted font-size-12">posted 3d ago</div>
                    </div>
                    <hr class="m-y-0">
                    <div class="panel-body">
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras sagittis,
                            erat ut faucibus interdum, velit erat elementum libero, ut efficitur dolor
                            velit eget odio.
                        </p>
                        <p>
                            Nunc et dui quis lacus tristique ullamcorper quis sit amet massa. In
                            ullamcorper vitae erat mollis viverra. Cras rhoncus bibendum urna, vitae
                            congue velit suscipit vel. Fusce facilisis posuere quam, at accumsan diam
                            pretium et.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- / Reply  -->

    <!-- Reply  -->
    <div class="box bg-transparent">
        <div class="box-row">
            <div class="box-cell p-y-1" style="width: 40px;">
                <img src="assets/demo/avatars/4.jpg" alt="" class="border-round" style="width: 100%;">
            </div>
            <div class="box-cell p-l-2">
                <div class="panel m-a-0">
                    <div class="panel-body p-y-1">
                        <div class="page-forum-thread-actions pull-xs-right p-t-1">
                            <a href="#" class="btn btn-sm btn-outline btn-outline-colorless b-a-0 font-size-14" data-toggle="tooltip" title="" data-original-title="Link"><i class="fa fa-link"></i></a>
                        </div>

                        <a href="#"><strong>Timothy Owens</strong></a>
                        <div class="text-muted font-size-12">posted 3d ago</div>
                    </div>
                    <hr class="m-y-0">
                    <div class="panel-body">
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras sagittis,
                            erat ut faucibus interdum, velit erat elementum libero, ut efficitur dolor
                            velit eget odio.
                        </p>
                        <p>
                            Nunc et dui quis lacus tristique ullamcorper quis sit amet massa. In
                            ullamcorper vitae erat mollis viverra. Cras rhoncus bibendum urna, vitae
                            congue velit suscipit vel. Fusce facilisis posuere quam, at accumsan diam
                            pretium et.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- / Reply  -->

    <!-- Reply  -->
    <div class="box bg-transparent">
        <div class="box-row">
            <div class="box-cell p-y-1" style="width: 40px;">
                <img src="assets/demo/avatars/5.jpg" alt="" class="border-round" style="width: 100%;">
            </div>
            <div class="box-cell p-l-2">
                <div class="panel m-a-0">
                    <div class="panel-body p-y-1">
                        <div class="page-forum-thread-actions pull-xs-right p-t-1">
                            <a href="#" class="btn btn-sm btn-outline btn-outline-colorless b-a-0 font-size-14" data-toggle="tooltip" title="" data-original-title="Link"><i class="fa fa-link"></i></a>
                        </div>

                        <a href="#"><strong>Denise Steiner</strong></a>
                        <div class="text-muted font-size-12">posted 3d ago</div>
                    </div>
                    <hr class="m-y-0">
                    <div class="panel-body">
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras sagittis,
                            erat ut faucibus interdum, velit erat elementum libero, ut efficitur dolor
                            velit eget odio.
                        </p>
                        <p>
                            Nunc et dui quis lacus tristique ullamcorper quis sit amet massa. In
                            ullamcorper vitae erat mollis viverra. Cras rhoncus bibendum urna, vitae
                            congue velit suscipit vel. Fusce facilisis posuere quam, at accumsan diam
                            pretium et.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- / Reply  -->

@endsection