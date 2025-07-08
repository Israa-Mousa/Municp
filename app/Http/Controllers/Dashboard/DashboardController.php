<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\support\Facades\Http;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Xml\Project;
use App\Models\Blog;
//use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\Projects;
use App\Models\contacts;
use App\Models\Services;
use App\Models\Tourisms;
use App\Models\Institutions;
use App\Models\Tenders;

class DashboardController extends Controller
{
    //
    public function index(){
        $cities = json_decode(file_get_contents(storage_path() . "\cities.json"), true);

        // echo "<pre>";
        print_r(__($cities['Cities'][0]['name']));
           $blogs = Blog::all();
    $lang = Session::get('locale');
    $services = Services::mainServices();
    $tourisms = Tourisms::all();
    $projects = Projects::all();
    $institutions = Institutions::all();
    $tendersCount=Tenders::all()->count();
         // Count each
    $blogCount = $blogs->count();
    $serviceCount = $services->count();
    $tourismCount = $tourisms->count();
    $projectCount = $projects->count();
    $institutionCount = $institutions->count();
        // dd();
        return view('dashboard.index',[     // Send counts
        'blogCount' => $blogCount,
        'serviceCount' => $serviceCount,
        'tourismCount' => $tourismCount,
        'projectCount' => $projectCount,
        'institutionCount' => $institutionCount,
        'tendersCount'=>$tendersCount,
        'services' => $services,
        'projects' => $projects,
        'tourisms' => $tourisms,

        'institutions' => $institutions
    ]);
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
