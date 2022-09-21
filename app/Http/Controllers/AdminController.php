<?php

namespace App\Http\Controllers;

use App\Models\Bug;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $programmers = User::role('user')->count();
        $bugs = Bug::count();
        $tasks = Task::count();
        $approved = Task::where('status', 'APPROVED')->count();
        return view('admin.dashboard', compact('bugs', 'tasks', 'programmers', 'approved'));
    }
}
