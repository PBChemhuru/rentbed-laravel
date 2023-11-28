<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
    public $timestamps = false;
    const UPDATED_AT = 'updated_date';

    public function Property()
    {
        return $this->belongsTo(Property::class, 'property_id');


    }

    public function User()
    {
        return $this->belongsTo(User::class, 'user_id');


    }

}
