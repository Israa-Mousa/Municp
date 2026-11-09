<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Careers;

class CareersController extends Controller
{
    public function index(){
         $careers=Careers::query()->latest('id')->paginate(10)->withQueryString();
        return view('dashboard.careers.index',['careers'=>$careers]);
    }
    public function create(){

        return view('dashboard.careers.create',['careers'=>new Careers()]);
    }
    public function store(Request $request){
        $data = $request->validate($this->rules());
        $data['created_userID'] = Auth::id();
        Careers::create($data);

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
        $data = $request->validate($this->rules());
        $data['created_userID'] = Auth::id();
        $careers->update($data);

        return redirect()
            ->route("dashboard.careers.index")
            ->with(
                "success",
                "careers ( ) updated"
            );
    }

    public function delete($id){
      $careers=Careers::findOrFail($id);
      $careers->delete();
      return redirect()->route('dashboard.careers.index')->with('success', __('Career opportunity deleted successfully.'));


    }
    public function rules()
    {
        return [
            'job_title' => ['required', 'string', 'max:255'],
            'job_title_ar' => ['required', 'string', 'max:255'],
            'emai_careers' => ['required', 'email', 'max:255'],
            'status' => ['required', 'integer', 'in:0,1'],
            'job_skills' => ['required', 'string'],
            'job_skills_ar' => ['required', 'string'],
            'job_description' => ['required', 'string'],
            'job_description_ar' => ['required', 'string'],
        ];
    }
}
