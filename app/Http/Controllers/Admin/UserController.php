<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Bug;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $users = User::all();
        return view('admin.user.index', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);

        $data = $request->validate([
            'name' => 'required|string',
            'email' => 'required',
            'image' => 'image|nullable',
            'job' => 'nullable',
            'phone' => 'required',
            'password' => 'required',
        ]);
        if ($request->file('image')) {
            $file = $request->file('image')->store('users', 'public');
            $data['image'] = $file;
        }

        $user = User::create($data);
        $user->assignRole('user');
        return redirect()->route('admin.user.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,  $id)
    {
        $user = User::findOrFail($id);
        $tasks = $user->task;
        return view('admin.user.show', compact('user', 'tasks'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.user.edit', compact('user'));
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
            'email' => 'required',
            'image' => 'image|nullable',
            'phone' => 'required',
        ]);

        if ($request->file('image')) {
            $file = $request->file('image')->store('users', 'public');
            $data['image'] = $file;
        }


        $user = User::find($id);
        $user->update($data);
        return redirect()->route('admin.user.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->route('admin.user.index');
    }
}
