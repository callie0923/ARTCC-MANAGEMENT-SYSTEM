<?php

namespace App\Http\Controllers\Forum;

use App\Forum\Boards;
use App\Forum\Categories;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ForumController extends Controller
{
    public function index()
    {
        $categories = Categories::orderBy('order_index', 'ASC')->get();
        return view('forum.index', compact('categories'));
    }

    public function category(Categories $category)
    {
        if(!$category->UserCanView()) {
            return redirect()->route('noaccess');
        }
        return view('forum.category', compact('category'));
    }

    public function board(Categories $category, Boards $board)
    {
        if(!$category->UserCanView()) {
            return redirect()->route('noaccess');
        }
        if(!$board->UserCanView()) {
            return redirect()->route('noaccess');
        }
        if($board->category_id != $category->id) {
            abort(404, 'This Board doesn\'t exist in the Category');
        }
        return view('forum.board', compact('category','board'));
    }

    public function newPost(Categories $category, Boards $board)
    {
        if(!$board->UserCanPost()) {
            return redirect()->route('noaccess');
        }
        if($board->category_id != $category->id) {
            abort(404, 'This Board doesn\'t exist in the Category');
        }
        return view('forum.new', compact('category', 'board'));
    }

    public function saveNewPost(Request $request, Categories $category, Boards $board)
    {
        dd($request->all());
        $title = $request->get('post_title');
        $content = $request->get('content');
    }
}