<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Room;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $f=Faker::create();
        for($i=0;$i<20;$i++){
            Room::create([
                'nameRoom' => $f->name,
                'price' => $f->randomFloat(2, 100000,500000),
                'status' => $f->boolean()
            ]);
        }
    }
}
