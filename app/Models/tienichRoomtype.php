<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tienichRoomtype extends Model
{
    use HasFactory;
    protected $fillable = [
        'roomtype_id',
        'tenTienIch',
        'noiDung'
    ];

    public function roomtype(){
        return $this->belongsTo(roomtype::class);
    }
}
