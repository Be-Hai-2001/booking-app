<?php

namespace Database\Seeders;

use App\Models\thanhPho;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ThanhPhoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        thanhPho::create([
            'tenTp'=>'Hồ Chí Minh',
        ]);
        thanhPho::create([
            'tenTp'=>'Đồng Tháp',
        ]);
        thanhPho::create([
            'tenTp'=>'Long An',
        ]);
        thanhPho::create([
            'tenTp'=>'An Giang',
        ]);
        thanhPho::create([
            'tenTp'=>'Vĩnh Long',
        ]);
        thanhPho::create([
            'tenTp'=>'Cần Thơ',
        ]);
        thanhPho::create([
            'tenTp'=>'Cà Mau',
        ]);
        thanhPho::create([
            'tenTp'=>'Tiền Giang',
        ]);
        thanhPho::create([
            'tenTp'=>'Hà Nội',
        ]);
        thanhPho::create([
            'tenTp'=>'Thái Nguyên',
        ]);
        thanhPho::create([
            'tenTp'=>'Quản Ninh',
        ]);
        thanhPho::create([
            'tenTp'=>'Thành Phố Đà Lạt',
        ]);
        thanhPho::create([
            'tenTp'=>'Bà Rịa - Vũng Tàu',
        ]);
        thanhPho::create([
            'tenTp'=>'Bình Dương',
        ]);
        thanhPho::create([
            'tenTp'=>'Đà Nẵng',
        ]);
        thanhPho::create([
            'tenTp'=>'Thừa Thiên Huế',
        ]);
        thanhPho::create([
            'tenTp'=>'Hải Phòng',
        ]);
    }
}
