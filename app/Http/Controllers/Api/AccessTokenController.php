<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


class AccessTokenController extends Controller
{
    //authn user and return access token login
    public function store(Request $request){
  $request->validate([
    'email'=>['required','email'],
    'password'=>['required'],

  ]);
//   Auth::validate([
//     'email'=>$request->email,
//     'password'=>$request->password
//   ]);
$User=User::where('email','=',$request->email);

    }
}
