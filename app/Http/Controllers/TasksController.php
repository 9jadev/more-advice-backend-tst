<?php

namespace App\Http\Controllers;

use App\Models\Tasks;
use Illuminate\Http\Request;
use App\Http\Requests\CreateTaskRequest;
use Illuminate\Console\View\Components\Task;

class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = Tasks::paginate(10);
        return view('index', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateTaskRequest $request)
    {
        $task = new Tasks;
        $task->task_name = $request->task_name;
        $task->task_description = $request->task_description;
        $task->save();
        return redirect()->back()->with('message','Operation Successful !');
    }

    /**
     * Display the specified resource.
     */
    public function show(Tasks $tasks)
    {
        return view('single', compact('tasks'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tasks $tasks)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CreateTaskRequest $request, Tasks $tasks)
    {
        $data = $request->validated();
        $tasks->update($data);
        return redirect('/')->with('message','Operation Successful !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tasks $tasks)
    {
        $tasks->delete();
        return redirect()->back()->with('message','Delete Successful !');

    }
}
