<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTaskRequest;
use App\Models\Task;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $tasks = Task::paginate(10, ['*'], 'taskpage');
        return view('dashboard.tasks.index', compact('tasks'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTaskRequest  $request
     */
    public function store(StoreTaskRequest $request)
    {
        $task = new Task;
        $task->title = $request->title;
        $task->description = $request->description;
        $task->admin_id = $request->assigned_by_id;
        $task->user_id = $request->assigned_to_id;

        $task->save();
        return redirect(route('tasks.index'));

    }


    /**
     * Remove the specified resource from storage.
     * @param  int  $id
     */
    public function destroy($id)
    {
        $response = false;
        $task = Task::find($id);

        if ($task) {
            if ($task->delete()) {
                $response = true;
            }
        }
        echo json_encode($response);
        exit;
    }


}