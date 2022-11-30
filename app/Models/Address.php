<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;
    // protected $table = 'addresses';

    // protected $fillable = [
    //     "line1", 
    //     "line2", 
    //     "line3",
    //     "line4", 
    //     "city",
    // ];

    public function address()
    {
        return $this->belongsTo(User::Class);
    }


}
