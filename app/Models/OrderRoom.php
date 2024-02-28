<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderRoom extends Model
{
    protected $primaryKey='orderId';
    public $timestamps=false;
    protected $fillable = [ 'userId','roomId', 'checkIn','checkOut','numberOfDay','totalMoney','status'];
    use HasFactory;

    function getNameRoom(){
        $room=Room::where('roomId',$this->roomId)->first();
        return $room->nameRoom;
    }
    function getPriceRoom(){
        $room=Room::where('roomId',$this->roomId)->first();
        return $room->price;
    }
    function getNameUser(){
        $user=User::where('userId',$this->userId)->first();
        return $user->name;
    }
    function getPhoneUser(){
        $user=User::where('userId',$this->userId)->first();
        return $user->phone;
    }
}
