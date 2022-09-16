<?php

namespace App\Http\Controllers;

use App\Models\Bug;
use Illuminate\Http\Request;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

class UserController extends Controller
{
    public function index()
    {
        $bugs = Bug::count();
        return view('user.dashboard', compact('bugs'));
    }
}
