<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Requests\{RegisterRequest, LoginRequest};
use Illuminate\Support\Facades\{Auth, Session};

class UserController extends Controller
{
    /**
     * Display register page.
     * 
     * @return Renderable
     */
    public function showRegister()
    {
        return view('auth.register');
    }

    /**
     * Handle account registration request
     * 
     * @param RegisterRequest $request
     * 
     * @return \Illuminate\Http\Response
     */
    public function register(RegisterRequest $request)
    {
        $user = User::create($request->validated());
        auth()->login($user);
        return redirect('/')->with('success', "Account successfully registered.");
    }


    /**
     * Display login page.
     * 
     * @return Renderable
     */
    public function showLogin()
    {
        return view('auth.user-login');
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

        if (!Auth::validate($credentials)) {
            return redirect()->to('login')
                ->withErrors(trans('auth.failed'));
        }


        $user = Auth::getProvider()->retrieveByCredentials($credentials);

        Session::flush();
        Auth::guard('admin')->logout();
        Auth::login($user);
        return $this->authenticated($request, $user);
    }

    /**
     * Handle response after user authenticated
     * 
     * @param Request $request
     * 
     * @return \Illuminate\Http\Response
     */
    protected function authenticated(Request $request, $user)
    {
        return redirect()->intended();
    }

    /**
     * Log out account user.
     *
     * @return \Illuminate\Routing\Redirector
     */
    public function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect('login');
    }

    public function index()
    {
        return view('auth.home');
    }

}