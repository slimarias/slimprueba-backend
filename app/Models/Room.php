<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'hotel_id',
        'room_type_id',
        'acomodation_id',
        'updated_by',
    ];

    function roomType(){
        return $this->belongsTo(RoomType::class,'room_type_id');
    }
    function acomodation(){
        return $this->belongsTo(Acomodation::class,'acomodation_id');
    }
}
