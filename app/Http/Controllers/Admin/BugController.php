<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Bug;
use App\Models\Task;
use App\Models\User;
use Illuminate\Console\View\Components\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Contracts\Service\Attribute\Required;

class BugController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bugs = Bug::orderBy('status', 'asc')->orderBy('created_at', 'desc')->get();
        return view('admin.bug.index', compact('bugs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $url = route('admin.bug.store');
        return view('admin.bug.create', compact('url'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'description' => 'nullable',
            'image' => 'image|nullable',
            'status' => 'required',
        ]);
        if ($request->file('image')) {
            $file = $request->file('image')->store('bugs', 'public');
            $data['image'] = $file;
        }


        $bug = Bug::create($data);
        alert()->success('Success', 'Bug has been created');
        activity()->performedOn($bug)->log('Create Bug');
        return redirect()->route('admin.bug.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $bug = Bug::findOrFail($id);
        $tasks = $bug->tasks;
        $url = route('admin.task.store');
        $users = User::role(['user'])->get();
        return view('admin.bug.show', ['bug' => $bug, 'tasks' => $tasks], compact('url', 'users'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bug = Bug::find($id);
        return view('admin.bug.edit', compact('bug'));
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
        $data = $request->validate([
            'name' => 'required|string',
            'description' => 'nullable',
            'image' => 'image|nullable',
            'status' => 'required',
        ]);
        if ($request->file('image')) {
            $file = $request->file('image')->store('bugs', 'public');
            $data['image'] = $file;
        }
        $bug = Bug::find($id);
        $bug->update($data);
        alert()->success('Success', 'Bug has been Updated');
        activity()->performedOn($bug)->log('Update Bug');
        return redirect()->route('admin.bug.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bug = Bug::findOrFail($id);

        $bug->delete();
        alert()->error('Delete', 'Bug has been Deleted');
        activity()->performedOn($bug)->log('Delete Bug');
        return redirect()->route('admin.bug.index');
    }
}
