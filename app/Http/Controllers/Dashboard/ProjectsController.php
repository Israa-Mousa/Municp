<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Projects;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Models\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;
use SebastianBergmann\CodeCoverage\Report\Xml\Project;

class ProjectsController extends Controller
{
    //
    public function index()
    {

        $projects = Projects::all();
        $cities = json_decode(file_get_contents(storage_path() . "\cities.json"), true);
        //   print_r(__($cities['Cities'][0]['name']));
        return view('dashboard.projects.index', [
            'projects' => $projects,
            'cities' => $cities

        ]);
    }
    public function create()
    {
        $status = Projects::statusOptions();
        $cities = json_decode(file_get_contents(storage_path() . "\cities.json"), true);
        return view('dashboard.projects.create', [
            'project' => new Projects(),
            'status' => $status,
            'cities' => $cities
        ]);
    }
    public function store(Request $request)
    {
        // dd($request->all());
        $rules = $this->rules();
        $locale = Session::get('locale');
        $created_userID = Auth::user()->id;
        $request->validate($rules);
        $request->merge([
            'locale' => $locale,
            'created_userID' => $created_userID
        ]);
        $data = $request->except('image');
        if ($request->hasFile('image')) {
            $data["image"] = $this->upload(
                $request->file("image")
            );
        }
        // var_dump($data);
        $project = Projects::create($data);
        // dd($project);
        // dd();
        return redirect()->route('dashboard.projects.index')
            ->with('success', "addding successful");
    }



    public function edit($id)
    {
        $project = Projects::findOrFail($id);
        // var_dump( $project);
        // dd();
        $status = Projects::statusOptions();
        $cities = json_decode(file_get_contents(storage_path() . "\cities.json"), true);
        return view('dashboard.projects.edit', compact('project', 'status', 'cities'));
    }
    public function update(Request $request, $id)
    {
       dd($request->all());
        $project = Projects::findOrFail($id);
        $old_image = $project->image;
        $rules = $this->rules();
        $locale = Session::get('locale');
        $created_userID = Auth::user()->id;
        $request->validate($rules);
        $request->merge([
            'locale' => $locale,
            'created_userID' => $created_userID
        ]);
        $data = $request->except('image');
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $data['image'] = $this->upload($file);
            // var_dump($file);
            // dd($data['image']);
        }
        $project->update($data);
        if ($old_image && $old_image != $project->image) {
            Storage::disk('public')->delete($old_image);
        }
        return redirect()->route('dashboard.projects.index')->with('success updated');
    }
    public function rules($id = 0)
    {
        return
            [
                'name' => 'required|string|min:5',
                "introduction" => "required|string|min:8",
                "description" => "required|string|min:12",
                'name_ar' => 'required|string|min:5',
                "introduction_ar" => "required|string|min:8",
                "description_ar" => "required|string|min:12",
                "status" => "required|in:draft,inProgress,complete,delay",
                "image" => "nullable|image",
                'city' => 'required',
            ];
    }
    public function delete($id)
    {
        $project = Projects::findOrFail($id);
        $project->delete();
        return redirect()
            ->route("dashboard.projects.index")
            ->with(
                "success",
                "Newsletters ($project->id ) Deleted"
            );
    }
    public function upload(UploadedFile $file)
    {
        return $file->store("thumbnails", [
            "disk" => "public",
        ]);
    }
}
