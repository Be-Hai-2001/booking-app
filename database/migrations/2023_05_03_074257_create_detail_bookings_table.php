<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_bookings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('roomtype_id')->constrained();
            $table->foreignId('booking_hotel_id')->constrained();
            $table->double('giaTheoNgay',13,2);
            $table->integer('SL_LoaiPhong');
            $table->integer('SL_giuongThem');
            $table->integer('SL_nguoiLon');
            $table->integer('SL_nguoiNho');
            $table->integer('SL_treEm');
            $table->double('DonGia',15,2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail_bookings');
    }
};
