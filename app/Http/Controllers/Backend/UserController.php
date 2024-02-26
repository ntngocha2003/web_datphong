<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUserRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request){
        $numberOfRecord = User::count();
        $perPage = 10;
        $numberOfPage = $numberOfRecord % $perPage == 0?
             (int) ($numberOfRecord / $perPage): (int) ($numberOfRecord / $perPage) + 1;
        $pageIndex = 1;
        if($request->has('pageIndex'))
            $pageIndex = $request->input('pageIndex');
        if($pageIndex < 1) $pageIndex = 1;
        if($pageIndex > $numberOfPage) $pageIndex = $numberOfPage;
        //
        $users = User::orderByDesc('userId')
                ->skip(($pageIndex-1)*$perPage)
                ->take($perPage)
                ->get();  
        
        $config['seo']=config('apps.user');
        $template='backend.user.index';
    
        return view('backend.dashboard.layout', compact( 'users', 'numberOfPage', 'pageIndex','config','template'));
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('frontend.auth.register');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $create=$request->except(['re_pasword']);

        $create['password']=Hash::make($create['password']);
        $create['role']='Khách hàng';
      
        if(User::create($create)){
            return redirect()->route('auth.user')->with('success','Đăng ký thành công');
        }
        
        return redirect()->route('user.create')->with('error','Đăng ký không thành công');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function myaccount(User $user,Request $request)
    {
        $r = Auth::user()->userId;
        $user=User::find($r);
         // pageIndex
         $pageIndex = 1;
         if($request->has('pageIndex')) $pageIndex = $request->input('pageIndex');
         // show form edit
         $config['seo']=config('apps.home');
         $template='frontend.homepage.home.myAccount';
         return view('frontend.homepage.layout', compact( 'user','pageIndex','config','template'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateAccount(Request $request, User $user)
    {
        $pageIndex = 1;
        if($request->has('pageIndex')) $pageIndex = $request->input('pageIndex');
        // update
        $r = Auth::user()->userId;
                
        if($user=User::find($r)->update($request->all())){
            return redirect()->route('home.myaccount', ['pageIndex' => $pageIndex])->with('success','Cập nhật thành công');
        }
        
        return redirect()->route('home.myaccount', ['pageIndex' => $pageIndex])->with('error','Cập nhật không thành công');
    }

    public function delete(User $user,Request $request){
        $r = 1;
        if($request->has('user')) $r = $request->input('user');
        $user=User::find($r);
        
         // pageIndex
         $pageIndex = 1;
         if($request->has('pageIndex')) $pageIndex = $request->input('pageIndex');
         // show form edit
         $config['seo']=config('apps.user');
         $template='backend.user.delete';
         return view('backend.dashboard.layout', compact( 'user','pageIndex','config','template'));
    }

    public function destroy(User $user, Request $request)
    {
        $pageIndex = 1;
        if($request->has('pageIndex')) $pageIndex = $request->input('pageIndex');
        
        // update
        if($request->has('user')) $r = $request->input('user');

        if($user=User::find($r)->destroy($request->all())){

            return redirect()->route('user.index', ['pageIndex' => $pageIndex])->with('success', 'Xóa thành công!');
        }
        return redirect()->route('user.index', ['pageIndex' => $pageIndex])->with('error', 'Xóa không thành công!');

    }
}
