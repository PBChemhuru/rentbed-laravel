<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    
    public $timestamps = false;
    const CREATED_AT = 'creation_date';
    const UPDATED_AT = 'updated_date';
    use HasFactory;

    public function Property()
    {
        return $this->belongsTo(Property::class, 'property_id');


    }

    public function User()
    {
        return $this->belongsTo(User::class, 'user_id');


    }

}
