<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Training extends Model
{
    use HasFactory;
    protected $fillable = [
       'type',
       'topic',
       'start',
       'end',
       'duration',
       'status',
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function applyTraining(){
        return $this->hasMany(ApplyforTraining::class);
    }
}
