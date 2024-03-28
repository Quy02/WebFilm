<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'favorites'; // Tên bảng trong cơ sở dữ liệu

    protected $fillable = ['id_movie', 'id_customer', 'yeuthich', 'luu'];
}