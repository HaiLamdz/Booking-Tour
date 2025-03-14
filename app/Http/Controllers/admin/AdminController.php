<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Auth\Admin;

class AdminController extends Controller
{
    //
    public function login(){
        return view('admin.auth.login');
    }


    public function loginPost(Request $request)
    {
        // dd($request->all());
        $a = $request->only('admin_email', 'password');
        // dd($a);
        if (!class_exists(Admin::class)) {
            dd('Model Admin chưa được định nghĩa!');
        }
        if (Auth::guard('admin')->attempt($a)) {
            // dd(123);
            // dd(Auth::guard('admin')->user());
            toastr()->success('Đăng nhập thành công!');
            return redirect('/admin');
        } else {
            // dd(123);
            toastr()->error('Email hoặc Mật Khẩu Không Đúng!');
            return redirect()->route('admin_login');
        }
    }
}
