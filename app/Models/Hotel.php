<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'address',
        'city_id',
        'document',
        'rooms',
        'updated_by',
    ];

    function city(){
        return $this->belongsTo(City::class,'city_id');
    }

    function roomData(){
        return $this->hasMany(Room::class,'hotel_id');
    }
}
