<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;
    protected $fillable = [
        'ho_ten',
        'noi_dung',
        'email',
        'dia_chi'
    ];
    protected $table = 'feedbacks';
    protected $primary = 'id';
}
