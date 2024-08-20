<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Congenital extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function treatment_records(){
        return $this->belongsToMany(Treatment_record::class);
        
    }
}
