<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
      protected $table = 'properties';
      public $timestamps = false;
      const CREATED_AT = 'creation_date';
      const UPDATED_AT = 'updated_date';

      //relationship to user
      public function user()
      {
            return $this->belongsTo(User::class, 'user_id');
      }

      public function booking()
      {
            return $this->hasMany(Booking::class, 'property_id');
      }

      public function reviews()
      {
            return $this->hasMany(Review::class, 'property_id');
      }
}

