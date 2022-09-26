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
        $bugs = Task::where('user_id', Auth::user()->id)->count();
        $bugtask = Task::where('status', 'WAITING APPROVAL')->where('user_id', Auth::user()->id)->count();
        $tasks = Task::where('status', 'PENDING')->where('user_id', Auth::user()->id)->count();
        $task = Task::where('status', 'APPROVED')->where('user_id', Auth::user()->id)->count();
        $solved = Task::where('status', 'APPROVED')->where('user_id', Auth::user()->id)->count();
        return view('user.dashboard', compact('bugs', 'tasks', 'bugtask', 'task', 'solved'));
    }
}
