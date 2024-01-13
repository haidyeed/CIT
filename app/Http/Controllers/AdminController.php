<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\{Auth, Session};

class AdminController extends Controller
{
    /**
     * Display login page.
     * 
     * @return Renderable
     */
    public function showLogin()
    {
        return view('auth.admin-login');
    }

    /**
     * Handle account login request
     * 
     * @param LoginRequest $request
     * 
     */
    public function login(LoginRequest $request)
    {
        $credentials = $request->getCredentials();

        if (!Auth::guard('admin')->validate($credentials)) {
            return redirect()->to('admin/login')
                ->withErrors(trans('auth.failed'));
        }

        Session::flush();
        Auth::logout();
        Auth::guard('admin')->attempt($credentials);

        return redirect()->route('dashboard');
    }


    /**
     * Log out account user.
     *
     * @return \Illuminate\Routing\Redirector
     */
    public function logout()
    {
        Session::flush();
        Auth::guard('admin')->logout();
        return redirect('admin/login');
    }

}