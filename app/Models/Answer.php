<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Answer extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function doctor(){
        return $this->belongsTo(Doctor::class);
    }

    public function question(){
        return $this->belongsTo(Question::class);
        // return $this->belongsTo(Question::class,'question_id','id');
    }
}
