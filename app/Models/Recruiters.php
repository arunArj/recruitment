<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recruiters extends Model
{
    use HasFactory;
    protected $fillable = [

        'user_id',
        'address',
        'desc',
        'phone',
        'sub_title',
        'image'
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function jobListing(){
        return $this->hasMany(JobListings::class,'recruiter_id');
    }
}
