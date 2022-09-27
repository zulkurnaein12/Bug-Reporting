<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Activitylog\Models\Activity;

class HistoryController extends Controller
{
    public function index()
    {
        $logs = Activity::latest()->get();
        return view('admin.history.index', compact('logs'));
    }
}
