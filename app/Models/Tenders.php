<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tenders extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'name_ar',
        'name_buyer',
        'name_buyer_ar',
        'number_tenders',
        'description',
        'description_ar',
        'status',
        'signature',
        'parentID',
        'created_userID',
    ];
}
