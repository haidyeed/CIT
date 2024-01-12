<?php

namespace App\Http\Controllers;

use App\Models\{Admin, User};

class BackendController extends Controller
{
    public function dashboard()
    {
        $admins = Admin::select('id', 'name')->get();
        $users = User::select('id', 'name')->get();
        return view('dashboard.index', compact('admins', 'users'));
    }

}