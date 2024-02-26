<?php

namespace App\Http\Controllers\Backend;

use App\Models\OrderRoom;
use App\Models\Room;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreRoomRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class OrderRoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(Room $room,Request $request)
    {
        
        $r = 1;
        if($request->has('room')) $r = $request->input('room');
        $create=$request->all();
        $create['userId']=Auth::user()->userId;
        $create['roomId']=$r;
        $create['status']='Đang đặt';
        if(OrderRoom::create($create) ){
            $update['status']='Đã được đặt';
            Room::find($r)->update($update);
            return redirect()->route('order.myOrder')->with('success','Đặt phòng thành công');
        }
        
        return redirect()->route('home.roomConfirm')->with('success','Đặt phòng không thành công');
    }

    /**
     * Display the specified resource.
     */
    public function show(OrderRoom $orderRoom)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(OrderRoom $orderRoom)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, OrderRoom $orderRoom)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(OrderRoom $orderRoom)
    {
        //
    }
}
