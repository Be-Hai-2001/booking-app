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
        Schema::create('roomtypes', function (Blueprint $table) {
            $table->id('id');
            $table->foreignId('hotel_id')->constrained();
            $table->foreignId('loai_giuong_id')->constrained();
            $table->text('tenLoai');
            $table->integer('slGiuongThem')->default(1);
            $table->double('giaThemGiuong',15,2)->default(100000);
            $table->double('giaLoaiPhong',15,2)->default(100000);
            $table->integer('dienTich');
            $table->integer('sucChuaMax')->default(1);
            $table->integer('sl_roomtype')->default(1);
            $table->text('content')->nullable();
            $table->text('type');
            $table->integer('hienThi')->default(1);
            $table->integer('discount')->default(0);
            $table->integer('trangThai')->default(1);
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
        Schema::dropIfExists('roomtypes');
    }
};
