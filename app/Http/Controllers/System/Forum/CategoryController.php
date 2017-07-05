<?php

namespace App\Http\Controllers\System\Forum;

use App\Forum\Categories;
use App\Forum\CategoryViewPermissions;
use App\Forum\ForumRepo;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    protected $forum;
    public function __construct(ForumRepo $forumRepo)
    {
        $this->forum = $forumRepo;
        parent::__construct();
    }

    public function editCategory(Categories $category)
    {
        $icons = $this->forum->loadIcons();
        return view('system.forum.partials.editcategory', compact('category','icons'));
    }
}