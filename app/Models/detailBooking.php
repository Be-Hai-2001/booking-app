<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detailBooking extends Model
{
    use HasFactory;

    protected $fillable = [
        'roomtype_id',
        'booking_hotel_id',
        'soDem',
        'SL_Loaiphong',
        'SL_giuongThem',
        'SL_nguoiLon',
        'SL_nguoiNho',
        'SL_treEm',
        'donGia'
    ];
    public function booking(){
        return $this->belongsTo(bookingHotel::class);
    }
}
