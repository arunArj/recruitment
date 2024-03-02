<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobListings extends Model
{
    use HasFactory;
    protected $fillable = [
        'recruiter_id',
        'job_title',
        'job_description',
        'percentage',
        'no_of_vacancy',
        'supply',
        'status',
    ];
    public function recruiter(){
        return $this->belongsTo(Recruiters::class,'recruiter_id');
    }
}
