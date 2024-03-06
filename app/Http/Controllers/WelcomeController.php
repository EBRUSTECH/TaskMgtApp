<?php
namespace App\Http\Controllers;
use App\Models\Task;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function addTask()
    {
        return view('add-task');
    }

    public function singleTask($id)
    {
        $task = Task::find($id);
        if (!$task) {
            return back()->with(['error' => 'Task not found']);
        }
        $id = $task->id;
        $task = [
            'id' => $task->id,
            'title' => $task->title,
            'description' => $task->description,
            'created' => $task->created_at->format('D m Y'),
            'completed' => $task->completed,
        ];
        $task = json_encode($task);

        return view('single-task', ['task' => $task, 'id' => $id]);
    }

    public function editTask($id)
    {
        $task = Task::find($id);
        if (!$task) {
            return back()->with(['error' => 'Task not found']);
        }

        return view('edit-task', ['task' => $task]);
    }

    public function allTasks()
    {

        return view('tasks');
    }
}
