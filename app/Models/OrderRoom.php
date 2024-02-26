<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderRoom extends Model
{
    protected $primaryKey='orderId';
    public $timestamps=false;
    protected $fillable = [ 'userId','roomId', 'checkIn','checkOut','numberOfHour','totalMoney','status'];
    use HasFactory;
}
