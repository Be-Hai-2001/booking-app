<?php

namespace Database\Seeders;

use App\Models\hotel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HotelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        hotel::create([
            'tuoiThemGiuong'=> 5,
            'tuoiFree'=> 1,
            'soluong_free'=> 1,
            'tenKS'=> 'required',
            'sdt'=> '123',
            'checkinCheckout'=> 'required',
            'doiTra'=> 'required',
            'soSao'=> 4,
            'thanhPho'=> 'required',
            'quanHuyen'=> 'required',
            'phuongXa'=> 'required',
            'trangThai'=> 1,
        ]);
    }
}
