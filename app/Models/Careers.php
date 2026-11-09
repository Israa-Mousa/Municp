<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Careers extends Model
{
    use HasFactory;

    protected $fillable = [
        'job_title',
        'job_title_ar',
        'emai_careers',
        'status',
        'job_skills',
        'job_skills_ar',
        'job_description',
        'job_description_ar',
        'created_userID',
    ];
}
