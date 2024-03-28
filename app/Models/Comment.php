<?php

// app/Comment.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public $timestamps = false;
    protected $fillable = ['id_movie', 'id_customer','name_customer', 'comment'];

    public function movie()
    {
        return $this->belongsTo(Movie::class, 'id_movie');
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'id_customer');
    }

}
