<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class image extends Model
{
    use HasFactory;
    protected $table = 'images';
    protected $fillable=['hotel_id','roomtype_id','images','avt'];

    public function roomtype(){
        return $this->belongsTo(roomtype::class);
    }
}

