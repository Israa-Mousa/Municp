<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class contacts extends Model
{
    use HasFactory;

    public $timestamps=false;
    protected $primaryKey='name_id';

    // use HasFactory;
    public $fillable = [
        'name',
        'email',
        'phone',
        'subject',
        'text'
    ];
}
