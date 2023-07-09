<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detailBooking extends Model
{
    use HasFactory;
    protected $tables = 'detail_bookings';
    protected $primaryKey = 'id';
    protected $fillable = [
        'roomtype_id',
        'booking_hotel_id',
        'giaTheoNgay',
        'SL_Loaiphong',
        'SL_giuongThem',
        'donGia'
    ];
    public function booking(){
        return $this->belongsTo(bookingHotel::class);
    }
}
