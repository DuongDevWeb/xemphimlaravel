<?php

namespace App\Http\Controllers\Admin\Login;

use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    //

    public function login_Admin_Uer_Web(Request $request){
        return view('bankend.admin.login.login');
    }

    public function loginHome(Request $request){

        $request->validate([
            'email' => 'required|email',
            'password' => 'required',

        ],[
            'email'=>'Vui lòng không bỏ chống Email',
            'password'=>'Vui lòng không có chống mật khẩu'
        ]);
        // chekc role
        if(Auth::attempt([
            "email" => $request->input("email"),
            "password" => $request->input("password"),

        ])){
            $user = Auth::user();
            if ($user->role == 1) {
                return redirect()->route('dashboard')->with('success', "Đăng nhập thành công!");
            } else {
                Auth::logout(); // Đăng xuất nếu không phải admin
                return redirect()->route('login')->with('error', "Tài khoản không có quyền truy cập.");
            }
        };
        return redirect()->back()->with('error', "Email hoặc mật khẩu không đúng.");
    }
}
