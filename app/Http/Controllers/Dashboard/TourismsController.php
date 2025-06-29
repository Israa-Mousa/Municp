<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\UploadedFile;
use  Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\session;
use Illuminate\Support\Facades\DB;
use App\Models\Tourisms;
use App\Models\Images;
class TourismsController extends Controller
{
    public function index(){
         $tourisms=Tourisms::all();
        return view('dashboard.tourisms.index',['tourisms'=>$tourisms]);
    }
    public function create(){

        return view('dashboard.tourisms.create',['tourisms'=>new Tourisms()]);
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
        $tourisms = Tourisms::create($data);
        // dd($tourisms);
        if($tourisms && $request->hasFile("image")){
            if ($request->hasFile("image")) {
                $images = $request->file('image');
                foreach($images as $image) {
                    $name = $image->getClientOriginalName();
                    $path=$this->upload($image);
                    $image=Images::create([
                        'file_name' => $path,
                        // 'path' => 'uploads/thumbnails'.$path,
                         'tourisms_id'=>$tourisms->id,
                         'update_at'=>now()
                      ]);
                }
            }
            }
        return redirect()
            ->route("dashboard.tourisms.index")
            ->with(
                "success",
                "tourisms ( ) Created"
            );
    }

    public function edit($id){
        $lang=Session::get('langID') ;
         $tourisms=Tourisms::findOrFail($id);
        return view('dashboard.tourisms.edit',['tourisms'=>$tourisms]);
    }

    public function update(Request $request, $id){
        $tourisms=Tourisms::findOrFail($id);
        // $banner= $tourisms->GetImageLibrary($id);
        // dd($banner);
        $banner=Images::where('tourisms_id',$id)->get();

        $rules = $this->rules();
        $lang=Session::get('langID');
        $request->validate($rules);
        $request->merge([
            "created_userID" => Auth::user()->id,
            "news_letter_langid" => $lang,
        ]);
        $data =$request->except("image");
        $tourisms->update($data);
        if($tourisms && $request->hasFile("image")){
            if ($request->hasFile("image")) {
                $images = $request->file('image');
                foreach($images as $image) {
                    $name = $image->getClientOriginalName();
                    $path=$this->upload($image);
                    $image=Images::create([
                        'file_name' => $path,
                        // 'path' => 'uploads/thumbnails'.$path,
                         'tourisms_id'=>$tourisms->id,
                         'update_at'=>now()
                      ]);

                }
            }
            }
            if($banner!=$image){
                // dd($banner);

                foreach($banner as $index){
                    // dd($index->file_name);
                    Storage::disk('public')->delete($index->file_name);
                }
  foreach($banner as $ba){
            Images::find($ba->Banners_image_ID)->delete();
        }
            }
        return redirect()
            ->route("dashboard.tourisms.index")
            ->with(
                "success",
                "tourisms ( ) updated"
            );
    }

    public function delete($id){
      $tourisms=Tourisms::findOrFail($id);
      $tourisms->delete($id);
      return redirect()->route('dashboard.tourisms.index')->with('success deleted');


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
        return $file->store("tourisms", [
            "disk" => "public",
        ]);
    }

}
