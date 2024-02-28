<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use App\Models\Room;
use Illuminate\Http\Request;
use App\Http\Requests\StoreRoomRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RoomController extends Controller
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
        
        $config['seo']=config('apps.room');
        $template='backend.room.index';
    
        return view('backend.dashboard.layout', compact( 'rooms', 'numberOfPage', 'pageIndex','config','template'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $config['seo']=config('apps.room');
        $template='backend.room.create';
        return view('backend.dashboard.layout', compact('config','template'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRoomRequest $request)
    {
        
        if(Room::create($request->all())){
            return redirect()->route('room.index')->with('success','Thêm mới thành công');
        }
        
        return redirect()->route('room.index')->with('error','Thêm mới không thành công');
    }

    /**
     * Display the specified resource.
     */
    public function show(Room $room)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Room $room,Request $request)
    {
        $r = 1;
        if($request->has('room')) $r = $request->input('room');
        // $room= room::where('roomId', '=', $r)->get();
        $room=Room::find($r);
        
         // pageIndex
         $pageIndex = 1;
         if($request->has('pageIndex')) $pageIndex = $request->input('pageIndex');
         // show form edit
         $config['seo']=config('apps.room');
         $template='backend.room.edit';
         return view('backend.dashboard.layout', compact( 'room','pageIndex','config','template'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Room $room)
    {
        // pageIndex
        $pageIndex = 1;
        if($request->has('pageIndex')) $pageIndex = $request->input('pageIndex');
       
        // update
        $r =1;
        if($request->has('room')) $r = $request->input('room');
        if($room=Room::find($r)->update($request->all())){
            return redirect()->route('room.index', ['pageIndex' => $pageIndex])->with('success','Cập nhật thành công');
        }
        
        return redirect()->route('room.index', ['pageIndex' => $pageIndex])->with('error','Cập nhật không thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(Room $room,Request $request){
        $r = 1;
        if($request->has('room')) $r = $request->input('room');
        $room=Room::find($r);
        
         // pageIndex
         $pageIndex = 1;
         if($request->has('pageIndex')) $pageIndex = $request->input('pageIndex');
     
         $config['seo']=config('apps.room');
         $template='backend.room.delete';
         return view('backend.dashboard.layout', compact( 'room','pageIndex','config','template'));
    }

    public function destroy(Room $room, Request $request)
    {
        $pageIndex = 1;
        if($request->has('pageIndex')) $pageIndex = $request->input('pageIndex');
        $r =1;
        if($request->has('room')) $r = $request->input('room');

        if($room=Room::find($r)->destroy($request->all())){

            return redirect()->route('room.index', ['pageIndex' => $pageIndex])->with('success', 'Xóa thành công!');
        }
        return redirect()->route('room.index', ['pageIndex' => $pageIndex])->with('error', 'Xóa không thành công!');

    }
}
