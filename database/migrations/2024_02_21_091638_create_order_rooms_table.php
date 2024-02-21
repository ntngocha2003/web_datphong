<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('order_rooms', function (Blueprint $table) {
            $table->id('orderId');
            $table->unsignedInteger('userId');
            $table->unsignedInteger('roomId');
            $table->dateTime('checkIn');
            $table->dateTime('checkOut')->nullable();
            $table->integer('numberOfHour')->nullable();
            $table->decimal('totalMoney',12,2)->nullable();

            $table->foreign('userId')->references('userId')->on('users');
            $table->foreign('roomId')->references('roomId')->on('rooms');

            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_rooms');
    }
};
