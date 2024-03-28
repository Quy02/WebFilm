<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    use HasFactory;
  
   
    protected $table = 'histories'; // Tên bảng trong cơ sở dữ liệu

    protected $fillable = ['id_movie', 'id_customer', 'watched'];
}