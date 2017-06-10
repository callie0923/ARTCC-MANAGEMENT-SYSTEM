<?php

namespace App\Http\Controllers\Forum;

use App\Forum\Boards;
use App\Forum\Categories;
use App\Forum\ForumReadThreads;
use App\Forum\Threads;
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

    public function thread(Categories $category, Boards $board, Threads $thread)
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
        if($thread->board_id != $board->category_id) {
            abort(404, 'This Thread doesn\'t exist in the Board');
        }
        if(Auth::check()) {
            ForumReadThreads::updateOrCreate([
                'user_id' => Auth::id(),
                'thread_id' => $thread->id
            ],[
                'user_id' => Auth::id(),
                'thread_id' => $thread->id
            ]);
        }
        $thread->views = ($thread->views + 1);
        $thread->save();
        return view('forum.thread', compact('category','board','thread'));
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