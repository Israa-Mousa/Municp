<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Http;
use App\Models\Blog;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class BlogsController extends Controller
{
    //
    public function index()
    {
        $data = Blog::query()->latest()->paginate(10)->withQueryString();
        return view('dashboard.blogs.index', ['data'=>$data]);
    }
    public function delete($id=10)
    {
        $request=Request::create('api/blogs/'.$id, 'delete');
        $data=Route::dispatch($request);
        $data=json_decode($data->getContent(), true);
        return redirect()->back()->with('success', 'ypu are success delete.');
    }

    public function create()
    {
        $blog=new Blog();
        $status=Blog::getStatusOption();
        return view('dashboard.blogs.create',[
            'blog'=>$blog,
            'status'=>$status
    ]);
    }

   public function store(Request $request){

    $rules=$this->rules();
    $request->validate($rules);
    $request->merge([
        'locale' => app()->getLocale(),
        'created_userID' => Auth::id(),
    ]);
    $data=$request->except('image','blogs_banner');
    if($request->hasFile('image')){
        $data["image"] = $this->upload(
            $request->file("image")
        );
    }
    if($request->hasFile('blogs_banner')){
        $data["blogs_banner"] = $this->upload(
            $request->file("blogs_banner")
        );
    }
    Blog::create($data);
    return redirect()->route('dashboard.blogs.index')
    ->with('success',"addding successful");
   }

   public function edit($id)
   {
       $blog=Blog::findOrFail($id);
       $status=Blog::getStatusOption();
       return view('dashboard.blogs.edit',[
           'blog'=>$blog,
           'status'=>$status
   ]);
   }

   public function update(Request $request,$id){
    $rules=$this->rules($id);
    $blog=Blog::findOrFail($id);
    $old_image=$blog->image;
    $old_blogs_banner=$blog->blogs_banner;

    $request->validate($rules);
    $request->merge([
        'locale' => app()->getLocale(),
        'created_userID' => Auth::id(),
    ]);

    $data=$request->except('image','blogs_banner');
    if($request->hasFile('image')){
        $data["image"] = $this->upload(
           $image= $request->file("image")
        );
    }
    if($request->hasFile('blogs_banner')){
        $data["blogs_banner"] = $this->upload(
           $blogs_banner= $request->file("blogs_banner")
        );
    }
    $blog->update($data);
    if($old_image && $old_image != $blog->image){
        Storage::disk('public')->delete($old_image);
       }

       if($old_blogs_banner && $old_blogs_banner != $blog->blogs_banner){
        Storage::disk('public')->delete($old_blogs_banner);
       }
    return redirect()->route('dashboard.blogs.index')
    ->with('success',"addding successful");

   }


    public function rules($id=0){
        return
        [
            // 'name' =>'required|string|min:5',
            'name' => ['required', 'string', 'max:255'],

            'name_ar' =>'required|string|min:5',
            "introduction" => "required|string|min:8",
            "introduction_ar" => "required|string|min:8",
            "description" => "required|string|min:12",
            "description_ar" => "required|string|min:12",
            "image" => "nullable|image",
            "blogs_banner" => "nullable|image",
            "status"=>"required|string|in:active,nonactive"
        ];
    }


    public function upload(UploadedFile $file){
        return $file->store("Blogs",[
            "disk"=>"public",
        ]);
        }




        public function storeapi(Request $request)
    {
        // $response = Request::create('http://127.0.0.1:8000/api/blogs/','post', [
        //     'name' => 'iscxzvraa',
        // ]);
        // $data=Route::dispatch($request);
        // $data=json_decode($data->getContent(),true);

        $request->name="sdmsa,dn";
        $response = Http::post('http://127.0.0.1:8000/api/blogs/', [
            'name' => $request->name,

        ]);
        // $request->name="safnkalnfmkle";

        // $response = Http::acceptJson()->Post('http://127.0.0.1:8000/api/blogs/',$request->name);
        // $data=Route::dispatch($response);
        // $data=json_decode($data->getContent(),true);
        return redirect()->back()->with('success', 'ypu are success add.');
    }

}
