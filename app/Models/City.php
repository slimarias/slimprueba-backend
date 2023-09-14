<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'name',
        'department_id',
    ];

    public function department(){
        return $this->belongsTo(Department::class,'department_id');
    }
}
