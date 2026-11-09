<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\DB;
class Tourisms extends Model
{
    use HasFactory;

    protected $fillable=[
        "name","name_ar",
        "description","description_ar",
        "location","location_ar",
        "created_userID",
        "image","locale"

    ];
    public function images(): HasMany
    {
        return $this->hasMany(Images::class, 'tourisms_id');
    }

    public static function GetImageLibrary($id)
    {
        $Library = DB::table('images')->where('tourisms_id', $id)->get();
        foreach ($Library as $item)
        {
            $Librarys[] =$item->file_name;
        }
        // if(count($Library)==0){
        //     $Library[] = "/defaultBanner.png";
        //     // dd('israa');
        // }
        return $Library;
    }
}
