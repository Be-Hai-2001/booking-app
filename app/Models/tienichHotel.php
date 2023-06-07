<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tienichHotel extends Model
{
    use HasFactory;
    protected $table = 'tienich_hotels';
    protected $fillable =['hotel_id','tenTienIch','noiDung'];


}
