<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::latest()->take(10)->get()->map(function ($task){
            return [
                'id' => $task->id,
                'title' => $task->title,
                'description' => $task->description,
                'created' => $task->created_at->format('D m Y'), 
                'completed' => $task->completed,
            ];
        });

        $allTasks = Task::latest()->get()->map(function ($task){
            return [
                'id' => $task->id,
                'title' => $task->title,
                'description' => $task->description,
                'created' => $task->created_at->format('D m Y'), 
                'completed' => $task->completed,
            ];
        });
        return response()->json([
            'status' => true,
            'tasks' => $tasks,
            'alltasks' => $allTasks,
        ]);
    }

    public function show($id)
    {
        $task = Task::find($id);

        if (!$task) {
            return response()->json(['error' => 'Task not found'], 404);
        }

        return response()->json(['task' => $task]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'description' => 'required',
            'completed' => 'boolean',
        ]);        

        $task = Task::create($request->all());

        return response()->json([
            'status' => true,
            'task' => $task
        ],
            201);
    }

    public function update(Request $request, $id)
    {
        $task = Task::find($id);

        if (!$task) {
            return response()->json([
                'status' => false,
                'error' => 'Task not found'
            ], 404);
        }

        $task->update($request->all());

        return response()->json([
            'status' => true,
            'task' => $task
        ], 201);
    }

    public function destroy($id)
    {
        $task = Task::find($id);

        if (!$task) {
            return response()->json([
                'success' => false,
                'error' => 'Task not found'], 404);
        }

        $task->delete();

        return response()->json([
            'success' => true,
            'message' => 'Task deleted successfully'
            ]);
    }

    public function mark($id)
    {
        $task = Task::find($id);

        if (!$task) {
            return response()->json([
                'success' => false,
                'error' => 'Task not found'],
                 404);
        }

        $task->completed = true;
        $task->save();

        return response()->json([
            'success' => true,
            'message' => 'Task completed'
            ]);
    }
}

