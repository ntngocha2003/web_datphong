<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Http\Requests\AuthRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function __construct(){
        
    }

    public function index(){
        if(Auth::id()>0){
            return redirect()->route('order.index');
        }
        return view('admin.auth.login');
    }

    public function login(AuthRequest $request){
        $credentials = [
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ];
        
        if (Auth::guard('admin')->attempt($credentials)) {
            return redirect()->route('order.index')->with('success','Đăng nhập thành công');
        }
        return redirect()->route('auth.admin')->with('error','Email hoặc mật khẩu không chính xác');
    }

    public function logout(Request $request){
        Auth::guard('admin')->logout();
        return redirect()->route('auth.admin');
    }
}