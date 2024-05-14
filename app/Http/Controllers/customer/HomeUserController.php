<?php
namespace App\Http\Controllers\customer;
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
        
        $template='customer.homepage.home.index';
    
        return view('customer.homepage.layout', compact( 'rooms', 'numberOfPage', 'pageIndex','template'));
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
         $template='customer.homepage.home.roomDetail';
         return view('customer.homepage.layout', compact( 'room','pageIndex','config','template'));
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
         $template='customer.homepage.home.roomConfirm';
         return view('customer.homepage.layout', compact( 'room','pageIndex','config','template'));
    }

    public function myOrder(OrderRoom $room,Request $request){
        $r=1;
        if($request->has('user')) $r = $request->input('user');    
        $orders= OrderRoom::where('userId', '=', $r)->get(); 
        $config['seo']=config('apps.home');
        $template='customer.homepage.home.orderRoom';
        return view('customer.homepage.layout', compact('orders','config','template'));
    }
}