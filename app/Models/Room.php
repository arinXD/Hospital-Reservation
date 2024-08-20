<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function building(){
        return $this->belongsTo(Building::class,'building_id');
    }
    
    public function treatment_records(){
        return $this->hasMany(Treatment_record::class);
    }
}
