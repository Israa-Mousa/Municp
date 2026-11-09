<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Careers;
use App\Models\Projects;
use App\Models\Services;
use App\Models\Tenders;
class DashboardController extends Controller
{
    //
    public function index(){
        return view('dashboard.index', [
            'metrics' => [
                ['label' => __('Citizen services'), 'count' => Services::count(), 'icon' => 'S', 'route' => 'dashboard.services.index'],
                ['label' => __('Projects'), 'count' => Projects::count(), 'icon' => 'P', 'route' => 'dashboard.projects.index'],
                ['label' => __('Tenders'), 'count' => Tenders::count(), 'icon' => 'T', 'route' => 'dashboard.tenders.index'],
                ['label' => __('News and updates'), 'count' => Blog::count(), 'icon' => 'N', 'route' => 'dashboard.blogs.index'],
                ['label' => __('Career opportunities'), 'count' => Careers::count(), 'icon' => 'C', 'route' => 'dashboard.careers.index'],
            ],
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
