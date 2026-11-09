<?php

namespace App\Http\Controllers\Application;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Careers;
//use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\Projects;
use App\Models\contacts;
use App\Models\Services;
use App\Models\Tourisms;
use App\Models\Institutions;
use App\Models\Tenders;

use Mail;

class AppController extends Controller
{
    //

    // public function index($lang = null)
    // {
    //     if (Session::get('locale') == null) {
    //         Session::put('locale', 'en');
    //     }
    //     if ($lang != '') {
    //         if ($lang == "1") {
    //             session::put('locale', 'en');
    //         } else if ($lang == "2") {
    //             session::put('locale', 'ar');
    //         }
    //     }
    //     $blogs = Blog::all();
    //     $lang = Session::get('locale');
    //     $services = Services::mainServices();
    //     $tourisms = Tourisms::all();
    //     $projects = Projects::all();
    //     $institutions=institutions::all();
    //     return view('app.Home', [
    //         'services' => $services,
    //         'projects' => $projects,
    //         'tourisms' => $tourisms,
    //         'institutions'=>$institutions

    //     ]);
    // }

    public function index($lang = null)
{
    if ($lang) {
        Session::put('locale', $lang);
        app()->setLocale($lang); // مهم لتفعيل اللغة في نفس الطلب
    }

    $blogs = Blog::where('status', 'active')->latest()->take(6)->get();
    $lang = Session::get('locale');
    $services = Services::mainServices();
    $tourisms = Tourisms::with('images')->get();
    $projects = Projects::all();
    $institutions = Institutions::all();
    $tenders = Tenders::where('status', 1)->latest()->take(4)->get();

    return view('app.Home', [
        'services' => $services,
        'projects' => $projects,
        'tourisms' => $tourisms,
        'institutions' => $institutions,
        'blogs' => $blogs,
        'tenders' => $tenders,
    ]);
}

    public function blogs($id)
    {
        $blog = Blog::where('status', 'active')->findOrFail($id);
        return view('app.pagess.news', [
            'blog' => $blog
        ]);
    }

    public function projects($id)
    {

        $project = Projects::findOrFail($id);
        return view('app.pagess.projects', [
            'project' => $project
        ]);
    }

    public function careers($id)
    {
        $career = Careers::findOrFail($id);
        return view('app.pagess.careers', [
            'career' => $career
        ]);
    }

    public function indexsec($lang)
    {
        if ($lang == "1") {
            session::put('locale', 'en');
        } else {
            session::put('locale', 'ar');
        }

        return view('app.Home');
    }



    public function contact( Request $request,$name = null)
    {
        $name = $request->name;
        return view('app.contacts.index', [
            'name' => $name
        ]);
    }

    public function map()
    {
        return view('app.map');
    }



    public  function contactsave(Request $request)
    {
        $this->validate($request, ['name' => 'required', 'email' => 'required|email', 'phone' => 'required', 'subject' => 'required', 'text' => 'required']);
        contacts::create($request->all());
        Mail::send('app.email', array(
            'Name' => $request->get('name'),
            'Email' => $request->get('email'),
            'phone' => $request->get('phone'),
            'subject' => $request->get('subject'),
            'text' => $request->get('message'),
        ), function ($message) use ($request) {
            $message->from($request->email);
            $message->to($request->get('email'), 'Example')
                ->subject($request->get('subject'));
        });
        return back()
            ->with('success', 'Thanks for contacting us.');
    }
}
