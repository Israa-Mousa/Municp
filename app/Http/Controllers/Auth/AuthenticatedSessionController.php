<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.login');
    }
     public function see_session(Request $request){
        // die();
//    var_dump($request->input('role'))  ;

        if( $request->input('role') =='1'){
            Session::put('locale', 'en');
    //   var_dump( Session::get('locale'));
            // die('here');
    }
else{
            Session::put('locale', 'ar');
            // die('aa');


    }
$msg="change";

return response()->json(array('msg'=> $msg), 200);

// return view('auth.login');
// die();
     }
    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(LoginRequest $request)
    {

        $request->authenticate();
var_dump($request->language);
        if($request->language==1){
            Session::put('locale', 'en');
            // die('here');
    }
else{
            Session::put('locale', 'ar');
            // die('aa');


    }


        $request->session()->regenerate();

        return redirect()->intended(RouteServiceProvider::HOME);
    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        // dd('shhsh');
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
