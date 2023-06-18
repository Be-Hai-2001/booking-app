<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bookingHotel extends Model
{
    use HasFactory;
    protected $fillable = ['tongTien', 'soDem', 'checkin', 'ngayDP', 'sdt'];

    public function detailBooking(){
        return $this->hasMany(detailBooking::class);
    }

}
