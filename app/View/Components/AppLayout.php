<?php

namespace App\View\Components;

use App\Models\Task;
use Illuminate\View\Component;

class AppLayout extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

     public $post = [];
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $tasks = Task::latest()->take(3)->get();
        return view('layouts.app', compact('tasks'));
    }
}
