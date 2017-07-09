<?php

namespace App\Http\Controllers\System\Forum;

use App\Forum\BoardPostPermissions;
use App\Forum\Boards;
use App\Forum\BoardViewPermissions;
use App\Forum\Categories;
use App\Http\Controllers\Controller;
use App\Models\Entrust\Role;
use Illuminate\Http\Request;

class BoardController extends Controller
{
    public function viewBoards(Categories $category)
    {
        $roles = Role::all();
        $boards = $category->boards;
        return view('system.forum.boards.index', compact('boards','category', 'roles'));
    }

    public function sortBoards(Request $request, $id)
    {
        $data = $request->get('data');
        foreach($data as $datum) {
            Boards::where('id', $datum['id'])->update(['order_index' => $datum['order_index']]);
        }
        return response()->json(['success' => true]);
    }

    public function addBoard(Request $request, Categories $category)
    {
        $board = new Boards;
        $board->category_id = $category->id;
        $board->name = $request->get('board_name');
        $board->description = $request->get('board_desc');
        $board->order_index = count(Boards::where('category_id', $category->id)->get())+1;
        $board->save();

        if($request->get('viewPerms')) {
            foreach($request->get('viewPerms') as $perm) {
                $permission = new BoardViewPermissions;
                $permission->board_id = $board->id;
                $permission->role = $perm;
                $permission->save();
            }
        }

        if($request->get('postPerms')) {
            foreach($request->get('postPerms') as $perm) {
                $permission = new BoardPostPermissions;
                $permission->board_id = $board->id;
                $permission->role = $perm;
                $permission->save();
            }
        }

        return redirect()->back()->with('alert-success', 'Board Added');
    }

    public function editBoard(Boards $board)
    {
        $roles = Role::all();
        return view('system.forum.partials.editboard', compact('board', 'roles'));
    }

    public function updateBoard(Request $request, Boards $board)
    {
        $board->name = $request->get('board_name');
        $board->description = $request->get('board_desc');
        $board->save();

        BoardViewPermissions::where('board_id', $board->id)->delete();
        BoardPostPermissions::where('board_id', $board->id)->delete();

        if($request->get('viewPerms')) {
            foreach($request->get('viewPerms') as $perm) {
                $permission = new BoardViewPermissions;
                $permission->board_id = $board->id;
                $permission->role = $perm;
                $permission->save();
            }
        }

        if($request->get('postPerms')) {
            foreach($request->get('postPerms') as $perm) {
                $permission = new BoardPostPermissions;
                $permission->board_id = $board->id;
                $permission->role = $perm;
                $permission->save();
            }
        }

        return redirect()->back()->with('alert-success', 'Board Updated');
    }
}