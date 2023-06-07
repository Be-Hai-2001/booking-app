<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class thanhPho extends Model
{
    use HasFactory;
   protected $arr =[];
   protected $tables = 'thanh_phos';
   public function quanhuyen(){
        return $this->hasMany(quanHuyen::class);
   }
}
