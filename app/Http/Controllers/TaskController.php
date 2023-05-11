<?php

namespace App\Http\Controllers;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $userTasks = auth()->user()->tasks()->orderByDesc('created_at')->get();
    
        return view('tasks.index', compact('userTasks'));
    }

    public function create()
    {
        return view('tasks.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
        ]);

        $task = Task::create([
            'name' => $validated['name'],
            'user_id' => auth()->user()->id
        ]);        
        
        return redirect()->route('tasks.index');
    }
    
    public function edit(Task $task)
    {
        // Vérifiez si l'utilisateur est autorisé à modifier la tâche
        if ($task->user_id !== auth()->user()->id) {
            // Gérer le cas où l'utilisateur n'est pas autorisé à modifier la tâche
            // Par exemple, vous pouvez rediriger vers une autre vue ou afficher un message d'erreur
            return redirect()->route('tasks.index')->with('error', "Vous n'êtes pas autorisé à modifier cette tâche.");
        }

        return view('tasks.edit', compact('task'));
    }

    public function update(Request $request, Task $task)
    {
        $validated = $request->validate([
            'name' => 'required',
        ]);

        $task->update([
            'name' => $validated['name'],
        ]);

        return redirect()->route('tasks.index');
    }

    public function destroy(Task $task)
    {
        $task->delete();

        return redirect()->route('tasks.index');
    }

    }