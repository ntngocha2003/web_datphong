<?php

namespace App\Http\Controllers\admin;

use App\Models\OrderRoom;
use App\Models\Room;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreRoomRequest;
use App\Http\Requests\StoreOrderRoomRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use DateTime;
class OrderRoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $numberOfRecord = OrderRoom::count();
        $perPage = 10;
        $numberOfPage = $numberOfRecord % $perPage == 0?
             (int) ($numberOfRecord / $perPage): (int) ($numberOfRecord / $perPage) + 1;
        $pageIndex = 1;
        if($request->has('pageIndex'))
            $pageIndex = $request->input('pageIndex');
        if($pageIndex < 1) $pageIndex = 1;
        if($pageIndex > $numberOfPage) $pageIndex = $numberOfPage;
        //
        $orders = OrderRoom::orderByDesc('roomId')
                ->skip(($pageIndex-1)*$perPage)
                ->take($perPage)
                ->get();  
        
        $config['seo']=config('apps.order');
        $template='admin.orderRoom.index';
    
        return view('admin.dashboard.layout', compact( 'orders', 'numberOfPage', 'pageIndex','config','template'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function orderRoom()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(OrderRoom $orderRoom,StoreOrderRoomRequest $request)
    {
        
        $r = 1;
        if($request->has('room')) $r = $request->input('room');
        $ci=$request->input('checkIn');
        $co=$request->input('checkOut');
       
        $checkin=new DateTime($ci);      
        $checkout=new DateTime($co);

        $intervel=$checkin->diff($checkout);
        $days=$intervel->d;
        $room=Room::find($r);
        echo $room;
        $price=$room->price;
        $totalMoney=$days*$price;
        
        $create=$request->all();
        $create['userId']=Auth::user()->userId;
        $create['roomId']=$r;
        $create['status']='Đang xác thực';
        $create['numberOfDay']=$days;
        $create['totalMoney']=$totalMoney;
        // echo $checkin;
        if(OrderRoom::create($create) ){
            $update['status']='Đã được đặt';
            Room::find($r)->update($update);
            return redirect()->route('order.myOrder',['user' => Auth::user()->userId])->with('success','Đặt phòng thành công');
        }
        
        return redirect()->route('home.roomConfirm',['user' => Auth::user()->userId])->with('success','Đặt phòng không thành công');
    }

    /**
     * Display the specified resource.
     */
    public function show(OrderRoom $orderRoom)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(OrderRoom $orderRoom,Request $request)
    {
        $r = 1;
        if($request->has('order')) $r = $request->input('order');
        $order=OrderRoom::find($r);
        echo $order;
         // pageIndex
         $pageIndex = 1;
         if($request->has('pageIndex')) $pageIndex = $request->input('pageIndex');
         // show form edit
         $config['seo']=config('apps.order');
         $template='admin.orderRoom.edit';
         return view('admin.dashboard.layout', compact( 'order','pageIndex','config','template'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateCancel(Request $request, OrderRoom $orderRoom)
    {
       
        $r =1;
        if($request->has('order')) $r = $request->input('order');
            $update=$request->all();
            $update['status']='Đã hủy';
            if($orderRoom=OrderRoom::find($r)->update($update)){
                $room=OrderRoom::find($r)->roomId;
                $updateRoom['status']='Còn trống';
                Room::where('roomId', '=', $room)->update($updateRoom); 
            return redirect()->route('order.myOrder',['user' => Auth::user()->userId])->with('success','Bạn đã hủy yêu cầu đặt phòng thành công');
        }
        return redirect()->route('order.myOrder', ['user' => Auth::user()->userId])->with('error','Yêu cầu hủy không thành công');
        
    }

    public function updateBack(Request $request, OrderRoom $orderRoom)
    {
        $r =1;
        if($request->has('order')) $r = $request->input('order');
        // update
            $update=$request->all();
            $update['status']='Đã trả phòng';

            if($orderRoom=OrderRoom::find($r)->update($update)){
                $room=OrderRoom::find($r)->roomId;
                $updateRoom['status']='Còn trống';
                Room::where('roomId', '=', $room)->update($updateRoom); 
                return redirect()->route('order.myOrder',['user' => Auth::user()->userId])->with('success','Bạn đã trả phòng thành công');
            }
            return redirect()->route('order.myOrder', ['user' => Auth::user()->userId])->with('error','Yêu cầu trả phòng của bạn không thành công');
        
    }

    public function updateConfirm(Request $request, OrderRoom $orderRoom)
    {
        $pageIndex = 1;
        if($request->has('pageIndex')) $pageIndex = $request->input('pageIndex');
        $r =1;
        if($request->has('order')) $r = $request->input('order');
        // update
            $update=$request->all();
            $update['status']='Đã xác nhận đặt phòng';
            $orderRoom=OrderRoom::find($r);
            echo $orderRoom;
            if($orderRoom->update($update)){
                return redirect()->route('order.index',['order'=>$orderRoom->orderId,'pageIndex' => $pageIndex])->with('success','Bạn đã xác nhận đặt phòng thành công');
            }
            return redirect()->route('order.index', ['pageIndex' => $pageIndex])->with('error','Yêu cầu xác nhận của bạn không thành công');
        
    }

    public function delete(OrderRoom $order,Request $request){
        $r = 1;
        if($request->has('order')) $r = $request->input('order');
        $order=OrderRoom::find($r);
        
         // pageIndex
         $pageIndex = 1;
         if($request->has('pageIndex')) $pageIndex = $request->input('pageIndex');
 
         $config['seo']=config('apps.order');
         $template='admin.orderRoom.delete';
         return view('admin.dashboard.layout', compact( 'order','pageIndex','config','template'));
    }

    public function destroy(OrderRoom $order, Request $request)
    {
        $pageIndex = 1;
        if($request->has('pageIndex')) $pageIndex = $request->input('pageIndex');
        
        if($request->has('order')) $r = $request->input('order');

        if($order=OrderRoom::find($r)->destroy($request->all())){

            return redirect()->route('order.index', ['pageIndex' => $pageIndex])->with('success', 'Xóa thành công!');
        }
        return redirect()->route('order.index', ['pageIndex' => $pageIndex])->with('error', 'Xóa không thành công!');

    }
}
