<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TodosRequests;

class TodosController extends Controller
{
    public function create(TodosRequests $request)
    {
        $todo = $request->user()->todos()->create($request->all());
        return response()->json(['todo' => $todo]);
    }

    public function update(Request $request, $id)
    {
        $todo = $request->user()->todos()->findOrFail($id);
        $todo->update($request->all());
        return response()->json(['todo' => $todo]);
    }

    public function delete(Request $request, $id)
    {
        $request->user()->todos()->findOrFail($id)->delete();
        return response()->json(['message' => 'Todo deleted']);
    }

    public function todos(Request $request)
    {
        $todos = $request->user()->todos()->orderBy('created_at', 'DESC')->paginate(10);
        return response()->json(['todos' => $todos]);
    }

    public function find(Request $request, $id)
    {
        $todo = $request->user()->todos()->findOrFail($id);
        return response()->json(['todo' => $todo]);
    }
}
