<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projects extends Model
{
    use HasFactory;
   protected $fillable=["name","introduction",'description',"name_ar","introduction_ar",'description_ar',"locale","created_userID","image",'city',"status"];
    public static function  statusOptions(){
        return ['draft'=>'Draft',
                'inprogress'=>'InProgress',
                'complete'=>'Complete',
                'delay'=>'Delayed'
    ];
    }
}
