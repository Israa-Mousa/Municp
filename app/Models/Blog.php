<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $fillable=[
        "name","name_ar",
        "description","description_ar",
        "introduction","introduction_ar",
        "blogs_banner","image",
        "created_userID","locale",
        "status"
];

public static function getStatusOption(){
    return[
       "active"=>"Active",
        "nonactive"=>"nonactive"

    ];
}
public static function GetimageUrl($id){

}
}

