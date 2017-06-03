<?php

namespace App\Http\Controllers\Forum;

use App\Forum\Boards;
use App\Forum\Categories;
use App\Http\Controllers\Controller;
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
        if($category->need_auth == 1 && !Auth::check()) {
            return redirect()->route('noaccess');
        }
        return view('forum.category', compact('category'));
    }

    public function board(Categories $category, Boards $board)
    {
        if($category->need_auth == 1 && !Auth::check()) {
            return redirect()->route('noaccess');
        }
        return view('forum.board', compact('category','board'));
    }
}