<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function allTodos(){
    
     return response()->json(Todo::all(), 200);

    }

    public function getTodoById($id){

     $todo = Todo::find($id);
     if(is_null($todo)){
        return response()->json(['message' => 'No todo found!'], 404);
     }
     return response()->json($todo, 200);

    }

    public function addTodo(Request $request){

     $todo = Todo::create($request->all());

     return response($todo, 201);

    }

    public function deleteTodo($id){

        $todo = Todo::find($id);
        if(is_null($todo)){
           return response()->json(['message' => 'No todo found!'], 404);
        }
        $todo->delete();
        return response()->json(null, 204);

    }

    public function updateTodo(Request $request, $id){

      $todo = Todo::find($id);
      if(is_null($todo)){
        return response()->json(['message' => 'No todo found!'], 404);
     }
     $todo->update($request->all());
     return response($todo, 200);

    }

    public function deleteAll(){
      
     return response()->json(Todo::truncate(), 204);

    }
}
