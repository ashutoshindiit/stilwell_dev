<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TodoList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TodoController extends Controller
{
    public function store(Request $request)
    {
        $todo = new TodoList();
        $todo->note = $request->note;
        $todo->is_checked = 0;
        $todo->user_id = Auth::id();
        $todo->save();
        echo json_encode($todo);
    }

    public function destroy($id)
    {
        $todo = TodoList::findOrFail($id);
        $todo->delete();
    }
    
    public function checked(Request $request, $id)
    {
        $todo = TodoList::findOrFail($id);
        $todo->is_checked = $request->is_checked;
        $todo->save();
    }
}
