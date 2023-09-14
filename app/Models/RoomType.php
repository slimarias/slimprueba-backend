<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomType extends Model
{
    use HasFactory;
    function acomodations(){
        return $this->belongsToMany(Acomodation::class,'room_type_acomodations');
    }
}
