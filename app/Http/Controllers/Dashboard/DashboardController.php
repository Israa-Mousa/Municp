<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\support\Facades\Http;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Route;
class DashboardController extends Controller
{
    //
    public function index(){
        $cities = json_decode(file_get_contents(storage_path() . "\cities.json"), true);

        // echo "<pre>";
        print_r(__($cities['Cities'][0]['name']));

        // dd();
        return view('dashboard.index');
    }

    public function userpage(){
        return view('dashboard.users.index');
    }
    // public function Blogs(){

    //   $request=Request::create('api/blogs','Get');

    //   $data=Route::dispatch($request);
    //   //var_dump( $data);
    //   $data=json_decode($data->getContent(),true);
    // //   $data=json_encode($data);
    // // var_dump( $data);
    //  //die();
    //          return view('dashboard.blogs.index',['data'=>$data]);

    // //
    // }
}
