<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AuthRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class AuthUserController extends Controller
{
    public function __construct(){
        
    }

    public function index(){
        if(Auth::id()>0){
            return redirect()->route('home.index');
        }
        return view('customer.auth.login');
    }

    public function login(AuthRequest $request){
        $credentials = [
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ];
        
        if (Auth::attempt($credentials)) {
            return redirect()->route('home.index')->with('success','Đăng nhập thành công');
        }
        return redirect()->route('auth.user')->with('error','Email hoặc mật khẩu không chính xác');
    }

    public function logoutUser(Request $request){
        Auth::logout();
        // $request->session()->invalidate(); 
        // $request->session()->regenerateToken();  
        return redirect()->route('auth.user');
    }
}
