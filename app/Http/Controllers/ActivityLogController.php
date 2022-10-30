<?php

namespace App\Http\Controllers;

use App\Models\ActivityLog;
use Illuminate\Http\Request;

class ActivityLogController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if (auth()->user()->type != 'admin')
            abort(403);
        $title = 'Activity Log';
        $activities = ActivityLog::paginate(10);
        return view('pages.activity.index',compact('title','activities'));
    }
}
