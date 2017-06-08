@extends('layouts.master', ['pageTitle' => 'New Post'])


@section('content')

    <style>
        .note-group-select-from-files {
            display:none;
        }
    </style>

    {{ Form::open(['route' => ['forum.board.savenewpost', $category, $board], 'method' => 'post', 'files' => false]) }}

    <div class="row">
        <div class="col-sm-8">
            <div class="form-group">
                <input type="text" name="post_title" class="form-control" placeholder="Post Title">
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <select id="board_id" class="form-control" disabled>
                    <option value="{{$board->id}}" selected>{{$category->name}}/{{$board->name}}</option>
                </select>
                <input type="hidden" name="board_id" value="{{$board->id}}">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <div class="form-group" id="contentDisplay" style="display: none;">
                <textarea name="content" id="content" cols="30" rows="10"></textarea>
            </div>
        </div>
    </div>

    @if(Auth::user()->hasRole(['atm','datm']))
    <div class="row">
        <div class="col-sm-12">
            <label class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" name="is_sticky" value="1">
                <span class="custom-control-indicator"></span>
                Sticky
            </label>
            <label class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" name="is_locked" value="1">
                <span class="custom-control-indicator"></span>
                Locked
            </label>
        </div>
    </div>
    @else
        <input type="hidden" name="is_sticky" value="0">
        <input type="hidden" name="is_locked" value="0">
    @endif

    <br>
    <div class="row">
        <div class="col-sm-12">
            <div class="form-group">
                <button type="submit" class="btn btn-success">Post</button>
            </div>
        </div>
    </div>

    {{ Form::close() }}

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

@endsection