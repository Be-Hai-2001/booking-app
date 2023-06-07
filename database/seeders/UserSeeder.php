<?php

namespace Database\Seeders;

use App\Models\user;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        user::create([
            'tenUser'=>'Bé Hải',
            'cccd'=>'0306201123',
            'email'=>'haimnh@gmail.com',
            'sdt'=>'0363060577',
            'password'=>'123456789',
            'is_admin'=>true,
            // 'email_verified_at' => now(),
            'remember_token' => Str::random(10),
            'trangThai'=>'1',
        ]);
        user::create([
            'tenUser'=>'Gia Huy',
            'cccd'=>'0306201126',
            'email'=>'giahuy@gmail.com',
            'sdt'=>'0123456789',
            'password'=>'123456789',
            'is_admin'=>true,
            // 'email_verified_at' => now(),
            'remember_token' => Str::random(10),
            'trangThai'=>'1',
        ]);
        user::create([
            'tenUser'=>'Công Tín',
            'cccd'=>'0306201194',
            'email'=>'congtin@gmail.com',
            'sdt'=>'1111111111',
            'password'=>'123456789',
            // 'email_verified_at' => now(),
            'remember_token' => Str::random(10),
            'trangThai'=>'1',
        ]);
    }
}
