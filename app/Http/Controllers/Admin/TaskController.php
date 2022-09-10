<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Bug;
use App\Models\Task;
use App\Models\User;
use DateTime;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = Task::all();
        return view('admin.task.index', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $bug = Bug::all();
        $user = User::all();
        $url = route('admin.task.store');
        return view('admin.task.create', compact('bug', 'user', 'url'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $bug = Bug::find($request->bug_id);
        $data = $request->validate([
            'bug_id' => 'required',
            'user_id' => 'required',
        ]);

        $data['start'] = date('Y-m-d');
        $data['end'] = null;
        $data['status'] = 'PENDING';

        Task::firstOrCreate([
            'bug_id' => $request->bug_id,
            'user_id' => $request->user_id,
        ], $data);
        return redirect()->route('admin.bug.show', $bug->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $task = Task::find($id);
        $url = route('admin.task.update', $task->id);
        return view('admin.task.create', compact('task', 'url'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $bug = Bug::find($request->bug_id);
        $data = $request->validate([
            'user_id' => 'required',
            'description' => 'nullable',
            'status' => 'required',
        ]);
        $task = Task::find($id);

        if ($request->status == 'APPROVED') {
            $data['end'] = now();
        }
        $task->update($data);
        return redirect()->route('admin.bug.show', $bug->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $task = Task::findOrFail($id);

        $task->delete();

        return redirect()->route('admin.bug.index');
    }
}
