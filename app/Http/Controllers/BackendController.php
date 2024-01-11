<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\User;

class BackendController extends Controller
{
    public function dashboard()
    {
        $admins = Admin::get();
        $users = User::get();
        return view('dashboard.index', compact('admins', 'users'));
    }

}