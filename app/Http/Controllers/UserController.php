<?php

namespace App\Http\Controllers;

use App\Models\Bug;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

class UserController extends Controller
{
    public function index()
    {
        $bugs = Bug::count();
        $bugtask = Task::where('status', 'WAITING APPROVAL')->count();
        $tasks = Task::where('status', 'PENDING')->count();
        $task = Task::where('status', 'APPROVED')->count();
        $solved = Bug::where('status', 'SOLVED')->count();
        return view('user.dashboard', compact('bugs', 'tasks', 'bugtask', 'task', 'solved'));
    }
}
