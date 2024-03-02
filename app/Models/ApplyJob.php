<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApplyJob extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'job_listing_id',
        'status'
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function joblisting(){
        return $this->belongsTo(JobListings::class,'job_listing_id');
    }
}
