<?php

namespace App\Http\Controllers\System\Forum;

use App\Forum\Boards;
use App\Forum\Categories;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BoardController extends Controller
{
    public function viewBoards(Categories $category)
    {
        $boards = $category->boards;
        $category_id = $category->id;
        return view('system.forum.boards.index', compact('boards','category_id'));
    }

    public function sortBoards(Request $request, $id)
    {
        $data = $request->get('data');
        foreach($data as $datum) {
            Boards::where('id', $datum['id'])->update(['order_index' => $datum['order_index']]);
        }
        return response()->json(['success' => true]);
    }
}