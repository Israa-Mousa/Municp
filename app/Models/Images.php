<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Images extends Model
{
    use HasFactory;
    protected $fillable=['file_name','tourisms_id'];
    protected $table="images";
    protected $primaryKey = 'Banners_image_ID';

}
