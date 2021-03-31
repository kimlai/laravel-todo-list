<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Task;

class TaskController
{
    public function listTasks()
    {
        //modèle
        $tasks = Task::all();
        // vue
        return view('index', ["tasks" => $tasks]);
    }

    public function addTask(Request $request)
    {
        // validation des données
        $validatedData = $request->validate(["content" => "required"]);
        // modèle
        $task = new Task();
        $task->content = $validatedData["content"];
        $task->save();
        // ~ vue
        return redirect('/');
    }

    public function editTask($id)
    {
      $task = DB::select("SELECT * FROM tasks WHERE id = ?", [$id])[0];
      return view("edit", ["task" => $task]);
    }
}
