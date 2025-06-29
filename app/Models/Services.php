<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Services extends Model
{
    use HasFactory;
    protected $fillable=[
        "name","name_ar","description","description_ar","parentID","created_userID","icon","locale"

    ];
    public  static function   mainServices(){
        $services=Services::where('parentID',null)->get();
        return $services;

    }

//     <li class="menu-item menu-item-has-children dropdown"><a href="#">{{ __('News') }}</a>
//     <ul class="sub-menu">
//         <li class="menu-item menu-item-has-children dropdown"><a href="blog-grid.html"> Latest Blogs </a>
//             <ul class="sub-menu">
//                 @foreach ($blogs as $blog)
//                 <li class="menu-item"><a href="blog-grid.html">{{$blog->name }}</a></li>

//                 @endforeach
//             </ul>
//         </li>
//     </ul>
// </li>
}
