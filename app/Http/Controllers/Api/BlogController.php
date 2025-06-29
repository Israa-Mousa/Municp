<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // route inside api not route
        //session &token  & cookies not using in api
    $Blogs=Blog::all();
        //$Blogs=Blog::paginate(2);
        //bydefult when retun the json object will reurtn
        return $Blogs;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //return json data
        $request->validate([
            'name'=>['sometimes','string','max:255']
        ]);
       // $request->name='dnv';
        // var_dump('ss');
        // die($request->name);
//         if(!$request->name)
// {
//     $request->name='default';
// }

  $blog=Blog::create($request->all());
        // var_dump($request->all());
        // die('ss');
        return $blog;

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // view one row
        $blog=Blog::findOrFail($id);
        return $blog;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Blog $blog)
    {
        //
        $request->validate([
            'name'=>['sometimes','string','max:255']
        ]);

       $blog->update($request->all());
      return $blog;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        //
        //die($id);
        //$blog=Blog::findOrFail($id)->delete();
        $blog->delete();
        return[
            'message'=>__('category deleted'),
        ];

    }
}
