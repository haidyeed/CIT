<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\{Admin, User, Statistic};

class BackendController extends Controller
{
    public function dashboard()
    {
        $admins = Admin::select('id', 'name')->get();
        $users = User::select('id', 'name')->get();
        return view('dashboard.index', compact('admins', 'users'));
    }

    public function statistics()
    {
        $topUsers = Statistic::select('user_id', 'tasks_count')->take(10)->get();
        return view('dashboard.tasks.statistics', compact('topUsers'));
    }

}