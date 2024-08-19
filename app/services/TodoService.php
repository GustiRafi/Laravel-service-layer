<?php

namespace App\Services;

use App\Models\Todo;
use App\Http\Resources\TodoResource;
use App\Http\Resources\ApiResponseResource;

class TodoService
{
   public function getTodos()
   {
       $todos = Todo::all();
       return new ApiResponseResource((object)[
            'status' => 'success',
            'code' => 200,
            'message' => 'Todos retrieved successfully',
            'details' => $todos
        ]);
   }

   public function createTodo(array $data)
   {
       $todo = Todo::create($data);
       return new ApiResponseResource((object)[
           'status' => 'success',
           'code' => 200,
           'message' => 'Todo created successfully',
           'details' => new TodoResource($todo)
       ]);
   }

   public function getTodoById(int $id)
   {
       $todo = Todo::find($id);
       return new ApiResponseResource((object)[
            'status' => 'success',
            'code' => 200,
            'message' => 'Todo retrieved successfully',
            'details' => new TodoResource($todo)
       ]);
   }

   public function updateTodo(int $id, array $data)
   {
       $todo = Todo::find($id);
       $todo->update($data);
       return new ApiResponseResource((object)[
            'status' => 'success',
            'code' => 200,
            'message' => 'Todo updated successfully',
            'details' => new TodoResource($todo)
       ]);
   }


   public function deleteTodo(int $id)
   {
       $todo = Todo::find($id);
       $todo->delete();
       return new ApiResponseResource((object)[
            'status' => 'success',
            'code' => 200,
            'message' => 'Todo deleted successfully',
            'details' => new TodoResource($todo)
       ]);
   }
}
