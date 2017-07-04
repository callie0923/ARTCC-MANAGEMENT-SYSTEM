<?php

namespace App\Http\Controllers\System;

use App\Forum\Categories;
use App\Forum\ForumRepo;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ForumController extends Controller
{
    protected $forum;
    public function __construct(ForumRepo $forumRepo)
    {
        $this->forum = $forumRepo;
        parent::__construct();
    }
    public function index()
    {
        $icons = $this->forum->loadIcons();
        $categories = Categories::orderBy('order_index', 'ASC')->get();
        return view('system.forum.index', compact('categories', 'icons'));
    }

    public function resortCat(Request $request)
    {
        dd($request->all());
    }
}