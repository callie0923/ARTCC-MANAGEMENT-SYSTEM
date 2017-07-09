<?php

namespace App\Http\Controllers\Forum;

use App\Forum\Boards;
use App\Forum\Categories;
use App\Forum\ForumReadThreads;
use App\Forum\Replies;
use App\Forum\Threads;
use App\Http\Controllers\Controller;
use App\Models\User;
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
        if(!$board->UserCanPost()) {
            return redirect()->route('noaccess');
        }
        if(!$category->UserCanView()) {
            return redirect()->route('noaccess');
        }
        if(!$board->UserCanView()) {
            return redirect()->route('noaccess');
        }

        // build thread
        $thread = new Threads;
        $thread->board_id = $board->id;
        $thread->user_id = Auth::id();
        $thread->title = $request->get('post_title');
        $thread->message = $request->get('content');
        $request->get('is_sticky') ? $thread->sticky == 1 : $thread->sticky = 0;
        $request->get('is_locked') ? $thread->locked == 1 : $thread->locked = 0;
        $thread->views = 0;
        $thread->save();
        return redirect()->route('forum.thread', [$category, $board, $thread])->with('alert-success', 'Post Created');
    }

    public function replyToThread(Request $request, Categories $category, Boards $board, Threads $thread)
    {
        $reply = new Replies;
        $reply->thread_id = $thread->id;
        $reply->user_id = Auth::id();
        $reply->message = $request->get('content');
        $reply->save();

        ForumReadThreads::where('thread_id', $thread->id)->delete();

        return redirect()->back()->with('alert-success', 'Reply Posted');
    }

    public function threadLockStatus(Threads $thread)
    {
        if($thread->locked == 1) {
            $thread->locked = 0;
        } else {
            $thread->locked = 1;
        }

        $thread->save();
        return response()->json(['success' => 'true']);
    }

    public function threadStickyStatus(Threads $thread)
    {
        if($thread->sticky == 1) {
            $thread->sticky = 0;
        } else {
            $thread->sticky = 1;
        }

        $thread->save();
        return response()->json(['success' => 'true']);
    }
}