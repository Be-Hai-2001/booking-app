<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class quanHuyen extends Model
{
    use HasFactory;
    protected $tables = 'quan_huyens';
    protected $fillable  = ['thanh_pho_id','tenQuanHuyen'];
}
