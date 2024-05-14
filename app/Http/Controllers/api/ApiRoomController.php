<?php

namespace App\Http\Controllers\api;
use App\Http\Controllers\Controller;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ApiRoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request,$id=null)
    {
        if($id==null){
            $rooms= Room::orderBy('roomId','asc')->get();
            return response()->json($rooms, Response::HTTP_OK);
        }
        else{
            $rooms= Room::find($id);
            return response()->json($rooms, Response::HTTP_OK);
        }
        
    }

   
    public function create(Request $request)
    {
        try{
            $room=new Room();
            $room->nameRoom=$request->input('nameRoom');
            $room->description=$request->input('description');
            $room->price=$request->input('price');
            $room->status=$request->input('status');

            $room->save();
            return $room;
        }
        catch(Throwable $err){
            return $err->getMessage();
        }
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        try{
            $room=Room::find($id);
            if($room){

                $room->nameRoom=$request->input('nameRoom');
                $room->description=$request->input('description');
                $room->price=$request->input('price');
                $room->status=$request->input('status');
    
                $room->save();
                return $room;
            }
            else{
                return'Not found';
            }
        }
        catch(Throwable $err){
            return $err->getMessage();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id,Request $request){
        try{
            $room=Room::find($id);
            if($room){
                $room->delete();
                return $room;
            }
            else{
                return'Not found';
            }
        }
        catch(Throwable $err){
            return $err->getMessage();
        }
    }
}
