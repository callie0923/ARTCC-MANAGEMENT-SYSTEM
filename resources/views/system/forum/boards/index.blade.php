@extends('layouts.master', ['pageTitle' => 'Board Management'])


@section('content')

    @if(count($boards))
        <div class="row">
            <div class="col-sm-8" id="boardPanels">
                @foreach($boards as $board)
                    <div class="panel sortablePanel" id="boardPanel{{$board->id}}" data-boardid="{{$board->id}}">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-sm-7">
                                    <h3 style="margin:0;padding:0;">{{$board->name}}</h3>
                                    <p style="margin:0;padding:0;">{{$board->description}}</p>
                                </div>
                                <div class="col-sm-5">
                                    <div class="pull-right">
                                        <a href="#" class="btn btn-primary editBoard" data-url="{{ route('system.forum.category.board.edit', $board->id) }}">Edit</a>
                                        <a href="{{ route('system.forum.category.board.del', $board) }}" class="btn btn-danger">Delete</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="col-sm-4">
                <div class="row">
                    <div class="col-sm-12" id="boardFormDiv">
                        @include('system.forum.partials.addboard')
                    </div>
                </div>
                <div class="row" id="editFormRow" style="display: none">
                    <div class="col-sm-12" id="editBoardFormDiv">

                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="row">
            <div class="col-sm-8">
                <h3 style="margin:0">No Boards. Add one on the right.</h3>
            </div>
        </div>
    @endif

    <script>
        $(document).ready(function() {
            var fixHelper = function(e, ui) {
                ui.children().each(function() {
                    $(this).width($(this).width());
                });
                return ui;
            };
            $('#boardPanels').sortable({
                helper: fixHelper
            }).disableSelection();
            $('#boardPanels').on('sortstop', function(e, ui){
                var new_order = [];
                $('#boardPanels .sortablePanel').each(function(i, row){
                    new_order.push({
                        id: $(row).data('boardid'),
                        order_index: i+1
                    });
                });

                $.ajax({
                    url: '/system/forum/category/{{ $category->id }}/sortboards',
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
    </script>

    <script>
        $('.editBoard').click(function() {
            var btn = $(this);
            var url = btn.data('url');
            $('#boardFormDiv').hide();
            btn.html('<i class="fa fa-refresh fa-spin"></i>');

            $.ajax({
                url: url,
                type: 'get',
                success: function(data) {
                    $('#editBoardFormDiv').html(data);
                    $('#editFormRow').show();
                    btn.html('Edit');
                }
            });
        });
    </script>

@endsection