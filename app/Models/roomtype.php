<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use League\CommonMark\Extension\Table\Table;

class roomtype extends Model
{
    use HasFactory;
    protected $tables = 'roomtypes';
    protected $primaryKey = 'id';
    protected $fillable = [
        'hotel_id',
        'loai_giuong_id',
        'tenLoai',
        'slGiuongThem',
        'giaThemGiuong',
        'giaLoaiPhong',
        'dienTich',
        'sucChuaMax',
        'content',
        'type',
        'hienThi',
        'trangThai'
    ];

    public function image(){
        return $this->hasMany(image::class);
    }

    // public 
    public function services(){
        return $this->hasMany(tienichRoomtype::class);
    }


}

