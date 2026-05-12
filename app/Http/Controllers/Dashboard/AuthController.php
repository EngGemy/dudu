<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login()
    {

        return view('dashboard.login');
    }

    public function postlogin(Request $request)
    {
        $credentials = $request->only('email', 'password');

        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|string',
        ], [

            'email.required' => 'email is required',

            'password.required' => 'Password is required',
        ]);

        if (auth()->guard('admin')->attempt(['email' => $request->input('email'), 'password' => $request->input('password')])) {
            return redirect()->route('admin_dashboard');
        }

        return redirect()->back()->with(['error' => 'The Data is Wrong']);
    }

    public function logout()
    {
        $guard = $this->getguard();
        $guard->logout();

        return redirect()->route('login.admin');
    }

    private function getguard()
    {
        return auth('admin');
    }
}
