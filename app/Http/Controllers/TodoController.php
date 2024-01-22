<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;


class TodoController extends Controller
{
       public function index()
    {
        $user = Auth::user();
        $todos = $user->todos;
        return view('todo.index')->with('todo', $todos);
    }

    public function create()
    {
        return view('todo.create');
    }

    public function store(Request $request)
    {
        try {
        $request->validate([
            'title' => 'required|string|max:255',
            'date' => 'required|date|after_or_equal:today',
            'description' => 'required|string',
            'priority' => 'required|in:High,Medium,Low',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $todo = new Todo([
            'title' => $request->input('title'),
            'date' => $request->input('date'),
            'description' => $request->input('description'),
            'priority' => $request->input('priority'),
            'user_id' => Auth::id(),
        ]);

        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $todo->image = $imageName;
        }
        $todo->save();

        return response()->json(['message' => 'Todo created successfully','status' => 200]);
    } catch (ValidationException $e) {
        // Validation failed, return JSON response with errors
        return response()->json(['errors' => $e->errors()]);
    }
    }

    public function markAsDone(Request $req)
    {
        try {
            $data = Todo::find($req['id']);
            
            $data->status = '1';
            $data->save();

            return response()->json(['message' => 'Task marked as completed.', 'status' => 200]);
        } catch (Exception $e) {
            return response()->json(['message' => 'There is some error while updating status.', 'status' => 400]);
        }
    }
}
