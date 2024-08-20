<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Treatment_record extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = "treatment_records";
    public function patient(){
        return $this->belongsTo(Patient::class,'patient_id');
    }

    public function doctor(){
        return $this->belongsTo(Doctor::class);
    }

    public function room(){
        return $this->belongsTo(Room::class);
    }

    public function congenitals(){
        return $this->belongsToMany(Congenital::class);
    }
}
