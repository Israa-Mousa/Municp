<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\UploadedFile;
use  Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\session;
use Illuminate\Support\Facades\DB;
use App\Models\Careers;

class CareersController extends Controller
{
    public function index(){
         $careers=Careers::all();
        return view('dashboard.careers.index',['careers'=>$careers]);
    }
    public function create(){

        return view('dashboard.careers.create',['careers'=>new Careers()]);
    }
    public function store(Request $request){

        $rules = $this->rules();
        //    dd($request->all());
        $lang=Session::get('langID') ;
        $request->validate($rules);
        $request->merge([
            "created_userID" => Auth::user()->id,
            "news_letter_langid" => $lang,
        ]);
        $data =$request->except("image");
        $careers = Careers::create($data);
        // dd($careers);

        return redirect()
            ->route("dashboard.careers.index")
            ->with(
                "success",
                "careers ( ) Created"
            );
    }

    public function edit($id){
        $lang=Session::get('langID') ;
         $careers=Careers::findOrFail($id);
        return view('dashboard.careers.edit',['careers'=>$careers]);
    }

    public function update(Request $request, $id){
        $careers=Careers::findOrFail($id);
        $rules = $this->rules();

        $request->validate($rules);
        $request->merge([
            "created_userID" => Auth::user()->id,

        ]);

        return redirect()
            ->route("dashboard.careers.index")
            ->with(
                "success",
                "careers ( ) updated"
            );
    }

    public function delete($id){
      $careers=Careers::findOrFail($id);
      $careers->delete($id);
      return redirect()->route('dashboard.careers.index')->with('success deleted');


    }
    public function rules($news_letter_id = 0)
    {
        return [[
            "description" => "nullable|string|min:8",
            "description_ar" => "nullable|string|min:8",
            "location" => "nullable|string|min:8",
            "location_ar" => "nullable|string|min:8",
            "name" => "required|string|max:20",
            "name_ar" => "required|string|max:20",
            "image" => "nullable|image",
            ]

    ];
    }

    protected function upload(UploadedFile $file)
    {
        return $file->store("careers", [
            "disk" => "public",
        ]);
    }

}
