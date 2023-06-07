<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class phuonngXa extends Model
{
    use HasFactory;

    protected $tables = 'phuonng_xas';
    protected $primaryKey = 'id';
    protected $fillable = ['quan_huyen_id','tenPhuongXa'];
}
