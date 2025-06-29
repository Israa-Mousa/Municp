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
use Mail;

class AppController extends Controller
{
    //

    public function index($lang = null)
    {
        // var_dump($lang);
        // var_dump(session::get('locale'));
        if (Session::get('locale') == null) {
            // dd('sad');
            Session::put('locale', 'en');
        }
        if ($lang != '') {
            if ($lang == "1") {
                session::put('locale', 'en');
            } else if ($lang == "2") {
                session::put('locale', 'ar');
            }
        }
        $blogs = Blog::all();
        $lang = Session::get('locale');
        $services = Services::mainServices();
        $tourisms = Tourisms::all();
        $projects = Projects::all();
        return view('App.Home', [
            'services' => $services,
            'projects' => $projects,
            'tourisms' => $tourisms,

        ]);
    }

    public function blogs($id)
    {
        $blog = Blog::findOrFail($id);
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
//  var_dump($id);
        $career = Careers::findOrFail(1);
        // dd($career);
        return view('app.pagess.careers', [
            'career' => $career
        ]);
    }

    public function indexsec($lang)
    {
        var_dump($lang);
        if ($lang == "1") {
            session::put('locale', 'en');
        } else {
            session::put('locale', 'ar');
        }

        return view('App.Home');
    }



    public function contact($name = null, Request $request)
    {
        // var_dump($name);
        // var_dump($request->name);
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
        var_dump($request->all());
        contacts::create($request->all());
        Mail::send('App.email', array(
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
