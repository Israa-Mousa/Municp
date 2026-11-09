<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\UploadedFile;
use  Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\session;
use App\Models\Tourisms;
use App\Models\Images;
class TourismsController extends Controller
{
    public function index(){
         $tourisms=Tourisms::with('images')->latest('id')->paginate(10)->withQueryString();
        return view('dashboard.tourisms.index',['tourisms'=>$tourisms]);
    }
    public function create(){

        return view('dashboard.tourisms.create',['tourisms'=>new Tourisms()]);
    }
    public function store(Request $request){

            $validated = $request->validate($this->rules());
            $lang=Session::get('langID') ;
            $imageFiles = $validated['image'] ?? [];
            unset($validated['image']);
            $validated['created_userID'] = Auth::id();
            $validated['news_letter_langid'] = $lang;
            $tourism = Tourisms::create($validated);

            foreach ($imageFiles as $imageFile) {
                Images::create([
                    'file_name' => $this->upload($imageFile),
                    'tourisms_id' => $tourism->id,
                ]);
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
         $tourisms=Tourisms::with('images')->findOrFail($id);
        return view('dashboard.tourisms.edit',['tourisms'=>$tourisms]);
    }

    public function update(Request $request, $id){
        $tourism=Tourisms::findOrFail($id);
        $validated = $request->validate($this->rules());
        $lang=Session::get('langID');
        $imageFiles = $validated['image'] ?? [];
        unset($validated['image']);
        $validated['created_userID'] = Auth::id();
        $validated['news_letter_langid'] = $lang;
        $tourism->update($validated);

        if ($imageFiles) {
            $oldImages = Images::where('tourisms_id', $tourism->id)->get();

            foreach ($imageFiles as $imageFile) {
                Images::create([
                    'file_name' => $this->upload($imageFile),
                    'tourisms_id' => $tourism->id,
                ]);
            }

            foreach ($oldImages as $oldImage) {
                Storage::disk('public')->delete($oldImage->file_name);
                $oldImage->delete();
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
        return [
            "description" => "nullable|string|min:8",
            "description_ar" => "nullable|string|min:8",
            "location" => "nullable|string|min:8",
            "location_ar" => "nullable|string|min:8",
            "name" => "required|string|max:20",
            "name_ar" => "required|string|max:20",
            "image" => "nullable|array",
            "image.*" => "image|max:5120",
        ];
    }

    protected function upload(UploadedFile $file)
    {
        return $file->store("tourisms", [
            "disk" => "public",
        ]);
    }

}
