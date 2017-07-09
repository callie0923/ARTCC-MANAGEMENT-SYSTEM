@extends('layouts.master', ['pageTitle' => 'Forum Administration'])


@section('content')

    <div class="row">
        <div class="col-sm-8" id="catPanels">
            @if(count($categories))

                @foreach($categories as $category)
                    <div class="panel sortablePanel" id="categoryPanel{{$category->id}}" data-catid="{{$category->id}}">
                        <div class="panel-heading">
                            <span class="panel-title">{{$category->name}}</span>
                            <div class="panel-heading-icon"><i class="fa fa-{{$category->icon}}"></i></div>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-sm-7">
                                    @forelse($category->boards->sortBy('order_index') as $board)
                                        <p style="margin:0">{{ $board->name }}</p>
                                    @empty
                                        <p style="margin:0">NO BOARDS</p>
                                    @endforelse
                                </div>
                                <div class="col-sm-5">
                                    <div class="pull-right">
                                        <a href="#" class="btn btn-primary editCategory" data-url="{{ route('system.forum.category.edit', $category->id) }}">Edit</a>
                                        <a href="{{ route('system.forum.category.boards', $category->id) }}" class="btn btn-info">Boards</a>
                                        <a href="{{ route('system.forum.category.del', $category) }}" class="btn btn-danger">Delete</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            @else

                <h3 style="margin:0">Forum Is Not Setup. Add a category, or click <a href="{{ route('system.forum.dummy') }}">HERE</a> to fill with a dummy system!</h3>

            @endif
        </div>

        <div class="col-sm-4">
            <div class="row">
                <div class="col-sm-12">
                    <div class="pull-right">
                        <button class="btn btn-info" id="showAddCat">Add Category</button>
                    </div>
                </div>
            </div>
            <div class="row" id="catFormDiv">
                <div class="col-sm-12">
                    @include('system.forum.partials.addcategory')
                </div>
            </div>
            <div class="row" id="editFormRow" style="display: none">
                <div class="col-sm-12" id="editCatFormDiv">

                </div>
            </div>
        </div>
    </div>

    <div id="resortCategory" data-url="{{ route('system.forum.sortcat') }}" style="display:none;"></div>

    <script src="{{ asset('assets/js/system/forum.index.js') }}"></script>

@endsection