<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApplyforTraining extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'training_id',
        'status'
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function training(){
        return $this->belongsTo(Training::class,'training_id');
    }
}
