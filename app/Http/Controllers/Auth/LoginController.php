<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
     }
    //  public function login(Request $request)
    //  {
    //     $input=$request->all;
    //     $this->validate($request,[
    //         'email' => 'required|email',
    //         'password' => 'required',
    //     ]);
    //   //  dd(auth()->guard('web')->user()->name);
    //     if(auth()->guard('admin')->attempt(array('email' => $input['email'],'password' => $input['password']))){

    //         if(auth()->guard('admin')->user()->is_admin == 'admin'){
    //             return redirect()->route('admin.getlogin');
    //         }
    //         else{
    //             redirect()->route('admin.adminPanelSetting.index');
    //         }

    //     }
    //     else{
    //         return redirect()->route('login')->with('error','email not found');
    //     }
    //  }
}
