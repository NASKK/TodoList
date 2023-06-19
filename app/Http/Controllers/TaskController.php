<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $user = auth()->user();         
        $tasks = $user->tasks;

        return view('tasks.index', compact('tasks'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:tasks',
            'description' => 'required',
            'status' => 'required|in:A faire,En cours,Terminé',

        ]);
        

        $task = Task::create([
            'name' => $validatedData['name'],
            'user_id' => auth()->user()->id,
            'status' => $validatedData['status'],
            'description' => $validatedData['description'],

        ]);

        return redirect()->route('tasks.index')->with('success', 'La tâche a été ajoutée avec succès.');
    }

    public function edit(Task $task)
    {
        return view('tasks.edit', compact('task'));
    }

    public function update(Request $request, Task $task)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:tasks,name,' . $task->id,
            'description' => 'required',
            'status' => 'required',

        ]);

        $task->update($validatedData);

        return redirect()->route('tasks.index')->with('success', 'La tâche a été modifiée avec succès.');
    }

    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('tasks.index')->with('success', 'La tâche a été supprimée avec succès.');
    }
}

