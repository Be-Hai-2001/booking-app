<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class hotel extends Model
{
    use HasFactory;
    protected $table = 'hotels';
    protected $primary = 'id';
    // protected $connection = 'booking-app';
    protected $fillable =[
        'content',
        'tuoiThemGiuong',
        'tuoiFree',
        'soluong_free',
        'tenKS',
        'sdt',
        'checkinCheckout',
        'doiTra',
        'soSao',
        'thanhPho',
        'quanHuyen',
        'phuongXa',
        'is_float',

    ];

    // public function getThanhPho(): BelongsTo
    // {
    //     return $this->belongsTo(thanhPho::class,'thanhPho','id');
    // }
}
