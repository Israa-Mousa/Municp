<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\session;
use Illuminate\Http\UploadedFile;
use App\Models\Services;
use  Illuminate\Support\Facades\Storage;

class ServicesController extends Controller
{
    //
    public function index(){

         $services=Services::all();
        return view('dashboard.Services.index',['services'=>$services]);
    }
    public function create(){

        return view('dashboard.Services.create',['service'=>new Services()]);
    }
    public function store(Request $request){
        $rules = $this->rules();
        //    var_dump(Session::get('langID') );
        //    dd();
        $lang=Session::get('langID') ;
        $request->validate($rules);
        $request->merge([
            "created_userID" => Auth::user()->id,
            "news_letter_langid" => $lang,
        ]);
        $data =$request->except("icon");
        if ($request->hasFile("icon")) {
            $data["icon"] = $this->upload(
                $request->file("icon")
            );
        }


        $service = Services::create($data);

        return redirect()
            ->route("dashboard.services.index")
            ->with(
                "success",
                "Newsletters ( ) Created"
            );
    }

    public function edit($id){
        $lang=Session::get('langID') ;
         $service=Services::findOrFail($id);
        return view('dashboard.Services.edit',['service'=>$service]);
    }
    public function update(Request $request, $id){
        // dd($request->all());
        $service=Services::findOrFail($id);
        $locale=Session::get('locale');
        $old_icon=$service->icon;
        $rules=$this->rules();
        // dd($this->rules());
        $created_userID =Auth::user()->id;
        $request->validate($rules);
        $request->merge([
            'locale'=>$locale,
            'created_userID'=>$created_userID
        ]);
        $data=$request->except('icon');
           if($request->hasFile('icon')){
            $file=$request->file('icon');
            $data['icon']=$this->upload($file);
            // var_dump($file);
            // dd($data['icon']);
           }
           $service->update($data);
           if($old_icon && $old_icon != $service->icon){
            Storage::disk('public')->delete($old_icon);
           }
         return redirect()->route('dashboard.services.index')->with('success updated');
    }

    public function delete($id){
      $service=Services::findOrFail($id);
      $service->delete($id);
      return redirect()->route('dashboard.services.index')->with('success deleted');


    }
    public function rules($id = 0)
    {
        return [[
            "description" => "nullable|string|min:8",
            "description_ar" => "nullable|string|min:8",
            "name" => "required|string|max:20",
            "name_ar" => "required|string|max:20",
            "icon" => "nullable|image",
            "parentID" => "nullable|int|exists:services",
            ]

    ];
    }

    protected function upload(UploadedFile $file)
    {
        return $file->store("services", [
            "disk" => "public",
        ]);
    }
}
