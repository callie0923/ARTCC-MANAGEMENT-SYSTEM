<?php

namespace App\Http\Controllers\System\Forum;

use App\Forum\Categories;
use App\Forum\CategoryViewPermissions;
use App\Forum\ForumRepo;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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

    public function addCategory(Request $request)
    {
        $category = new Categories;
        $category->name = $request->get('category_name');
        $category->icon = $request->get('category_icon');
        $category->order_index = count(Categories::all())+1;
        $category->need_auth = $request->get('need_auth') ? 1 : 0;
        $category->save();

        if($request->get('need_auth')) {
            if($request->get('viewPerms')) {
                foreach($request->get('viewPerms') as $perm) {
                    $permission = new CategoryViewPermissions;
                    $permission->category_id = $category->id;
                    $permission->role = $perm;
                    $permission->save();
                }
            }
        }
        return redirect()->back()->with('alert-success', 'Category Added');
    }

    public function updateCategory(Request $request, Categories $category)
    {
        $category->name = $request->get('category_name');
        $category->icon = $request->get('category_icon');
        $category->need_auth = $request->get('need_auth') ? 1 : 0;
        $category->save();

        CategoryViewPermissions::where('category_id', $category->id)->delete();

        if($request->get('need_auth')) {
            if($request->get('viewPerms')) {
                foreach($request->get('viewPerms') as $perm) {
                    $permission = new CategoryViewPermissions;
                    $permission->category_id = $category->id;
                    $permission->role = $perm;
                    $permission->save();
                }
            }
        }
        return redirect()->back()->with('alert-success', 'Category Updated');
    }
}