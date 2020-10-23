<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Auth;
class LoginController extends Controller
{
    public function getLogin()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $remember_me = $request->has('remember') ? true : false;
        if (Auth::guard('admin')->attempt(['email' => $request->input("email"), 'password' => $request->input("password")], $remember_me)) {
//            print ('aaaaaaaaaaaa');
            return redirect()->route('admin.welcome');
        }else{
            print ('xxxxxxxxxxxx');
        }

        return redirect()->back()->with(['error' => 'هناك خطا بالبيانات']);
    }

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->flush();
        $request->session()->regenerate();
        return redirect()->route('admin.login');
    }
}
