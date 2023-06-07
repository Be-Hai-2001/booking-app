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
        Schema::create('hotels', function (Blueprint $table) {
            $table->id();
            $table->integer('tuoiThemGiuong');
            $table->integer('tuoiFree');
            $table->integer('soluong_free');
            $table->text('tenKS');
            $table->string('sdt');
            $table->text('checkinCheckout');
            $table->text('doiTra');
            $table->integer('soSao');
            $table->text('thanhPho');
            $table->text('quanHuyen');
            $table->text('phuongXa');
            $table->text('content')->nullable();
            $table->integer('trangThai')->default('1');
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
        Schema::dropIfExists('hotels');
    }
};
