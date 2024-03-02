<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Students extends Model
{
    use HasFactory;
    protected $fillable = [

        'user_id',
        'course',
        'dob',
        'percentage',
        'no_of_backlog',
        'address',
        'mobile',
        'image',
        'resume',
        'status',
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
}
