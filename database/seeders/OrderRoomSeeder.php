<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Room;
use App\Models\User;
use App\Models\OrderRoom;
class OrderRoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $f=Faker::create();
        $roomIds=Room::pluck('roomId');

        $userIds=User::pluck('userId');
        $checkin=$f->dateTimeBetween('-1 week', '-3 day');;
        $checkout=$f->dateTimeBetween('-2 day');
        $intervel=$checkin->diff($checkout);
        $hour=$intervel->h;
        $days=$intervel->d;
        $hours=$days * 24 + $hour;
        $roomId=$roomIds->random();
        $price =Room::where('roomId',$roomId)->first()->price;
        $totalMoney=$hours*$price;

        for($i=0;$i<40;$i++){
            OrderRoom::create([
                'userId'=>$userIds->unique()->random(),
                'roomId'=>$roomId,
                'checkIn'=>$checkin,
                'checkOut'=>$checkout,
                'numberOfDay'=>$hours,
                'totalMoney'=>$totalMoney,
            ]);
        }
    }
}
