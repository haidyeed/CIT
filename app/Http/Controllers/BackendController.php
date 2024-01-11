<?php

namespace App\Http\Controllers;

class BackendController extends Controller
{
    public function dashboard()
    {
        return view('dashboard.index');
    }

}