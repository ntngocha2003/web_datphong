<?php
namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;
use App\Models\Room;
use App\Models\OrderRoom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $numberOfRecord = Room::count();
        $perPage = 10;
        $numberOfPage = $numberOfRecord % $perPage == 0?
             (int) ($numberOfRecord / $perPage): (int) ($numberOfRecord / $perPage) + 1;
        $pageIndex = 1;
        if($request->has('pageIndex'))
            $pageIndex = $request->input('pageIndex');
        if($pageIndex < 1) $pageIndex = 1;
        if($pageIndex > $numberOfPage) $pageIndex = $numberOfPage;
        //
        $rooms = Room::orderByDesc('roomId')
                ->skip(($pageIndex-1)*$perPage)
                ->take($perPage)
                ->get();  
        
        $template='frontend.homepage.home.index';
    
        return view('frontend.homepage.layout', compact( 'rooms', 'numberOfPage', 'pageIndex','template'));
    }

    public function show(Room $room,Request $request)
    {
        $r = 1;
        if($request->has('home')) $r = $request->input('home');
        $room=Room::find($r);
         // pageIndex
         $pageIndex = 1;
         if($request->has('pageIndex')) $pageIndex = $request->input('pageIndex');
         // show form orderDetail
         $config['seo']=config('apps.home');
         $template='frontend.homepage.home.roomDetail';
         return view('frontend.homepage.layout', compact( 'room','pageIndex','config','template'));
    }

    
    public function confirm(Room $room,Request $request)
    {
        $r = 1;
        if($request->has('home')) $r = $request->input('home');     
        $room=Room::find($r);
         // pageIndex
         $pageIndex = 1;
         if($request->has('pageIndex')) $pageIndex = $request->input('pageIndex');
         // show form orderDetail
         $config['seo']=config('apps.home');
         $template='frontend.homepage.home.roomConfirm';
         return view('frontend.homepage.layout', compact( 'room','pageIndex','config','template'));
    }

    public function myOrder(OrderRoom $room,Request $request){
        $r=1;
        if($request->has('order')) $r = $request->input('order');    
        $orders= OrderRoom::where('userId', '=', $r)->get(); 
        // $room =  Room::where('roomId', '=', $r)->get(); 
        
        $config['seo']=config('apps.home');
        $template='frontend.homepage.home.orderRoom';
        return view('frontend.homepage.layout', compact('orders','config','template'));
    }
}