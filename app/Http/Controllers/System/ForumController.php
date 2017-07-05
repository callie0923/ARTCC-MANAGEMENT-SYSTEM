<?php

namespace App\Http\Controllers\System;

use App\Forum\Categories;
use App\Forum\ForumRepo;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

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
        $data = $request->get('data');
        foreach($data as $datum) {
            Categories::where('id', $datum['id'])->update(['order_index' => $datum['order_index']]);
        }
        return response()->json(['success' => true]);
    }

    public function dummy()
    {
        if(count(Categories::all()) > 0) {
            return redirect()->back();
        } else {
            Artisan::call('db:seed', [
                '--class' => 'ForumSeeder'
            ]);
            return redirect()->back();
        }
    }
}