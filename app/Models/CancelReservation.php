<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CancelReservation extends Model
{
    use HasFactory;
    protected $fillable = [
        'ho_ten',
        'noi_dung',
        'cccd',
        'ma_hd',
        'sdt'
    ];
    protected $table = 'cancel_reservations';
    protected $primary = 'id';
}
