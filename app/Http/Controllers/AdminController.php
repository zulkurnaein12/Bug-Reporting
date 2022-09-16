<?php

namespace App\Http\Controllers;

use App\Models\Bug;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;

class AdminController extends Controller
{
    public function index()
    {
        $users = User::count();
        $programmers = User::where('id')->count();
        $bugs = Bug::count();
        $tasks = Task::count();
        return view('admin.dashboard', compact('users', 'bugs', 'tasks', 'programmers'));
    }
}
