<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class loaiGiuong extends Model
{
    use HasFactory;
    protected $fillable = ['tenLoai','chuThichSucChua'];
}
