<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\TaskResource;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        return TaskResource::collection(Task::latest()->get());
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'nullable|in:pendente,em andamento,concluído',
            'due_date' => 'nullable|date'
        ]);

        return new TaskResource(Task::create($data));
    }

    public function update(Request $request, Task $task)
    {
        if (!$task->estaPendente()) {
            return response()->json([
                'mensagem' => 'Apenas tarefas pendentes podem ser editadas'
            ], 403);
        }

        $data = $request->validate([
            'title' => 'sometimes|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|in:em andamento,concluído',
            'due_date' => 'nullable|date'
        ]);

        $task->update($data);
        return new TaskResource($task);
    }

    public function destroy(Task $task)
    {
        if (!$task->estaPendente()) {
            return response()->json([
                'mensagem' => 'Apenas tarefas pendentes podem ser excluídas'
            ], 403);
        }

        $task->delete();
        return response()->noContent();
    }
}