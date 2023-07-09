<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bookingHotel extends Model
{
    use HasFactory;
    protected $tables = 'booking_hotels';
    protected $primaryKey = 'id';    
    protected $fillable = [
        'tongTien',
        'soDem',
        'checkin',
        'ngayDP',
        'sdt',
        'trangThai',
        'SL_treEm',
        'SL_nguoiNho',
        'SL_nguoiNho',
        'user_id',
        'CCCD',
        'content',
        'tenKS'
    ];

    public function detailBooking(){
        return $this->hasMany(detailBooking::class);
    }

}
