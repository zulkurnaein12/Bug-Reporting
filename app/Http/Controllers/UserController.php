<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

class UserController extends Controller
{
    public function index()
    {
        return view('user.dashboard');
    }
}
