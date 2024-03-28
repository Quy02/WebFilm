<?php

// app/Models/Customer.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    public $timestamps = false;
      protected $primaryKey = 'id_customer';
    protected $table = 'customers'; // Tên bảng trong cơ sở dữ liệu

    protected $fillable = ['id_customer','user', 'password', 'fullname', 'dob'];
    protected $hidden = ['password'];

    // Bạn có thể đặt các quan hệ và phương thức khác ở đây

    public static function findByUsername($username)
    {
        return static::where('user', $username)->first();
    }
    

    // Bạn cũng có thể sử dụng Eloquent relationships cho các mối quan hệ khác như hasMany, belongsTo, v.v.
}