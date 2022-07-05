<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Session;

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
    public function store(Request $request){

        $request->validate([
            'email' => 'required|email|unique',
            'password' => 'required|min:8'
        ]);

        $remember_me = $request->has('remember') ? true : false;

        if(auth()->attempt(['email' => $request->email, 'password' => $request->password], $remember_me)){
        }
        else{
            return back()->with('error', 'Something went wrong, try again');
        }
        return redirect('dashboard');
    }

    public function checklogin(Request $request)
    {
          $input = $request->all();
          $this->validate($request, [
              'email' => 'required',
              'password' => 'required',
           ],[
              'email.required' => 'Email is required',
              'password.required' => 'Password is required',
              
            ]);
 
             if($request->rememberme===null){
                setcookie('login_email',$request->email,100);
                setcookie('login_pass',$request->password,100);
             }
             else{
                setcookie('login_email',$request->email,time()+60*60*24*100);
                setcookie('login_pass',$request->password,time()+60*60*24*100);
 
             }
             if (Auth::attempt(['email' => $input['email'], 'password' => $input['password']]))
             {
                Session::put('user_session', $input['email']);
                return redirect('dashboard');
             }
             else
             {
                dd('Invalid credentials!');
            }
        }
    public function login(Request $request)
    {   
        $input = $request->all();
  
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required',
        ]);
  
        $fieldType = filter_var($request->email, FILTER_VALIDATE_EMAIL) ? 'email' : 'name';
        if(auth()->attempt(array($fieldType => $input['email'], 'password' => $input['password'])))
        {
            return redirect('dashboard');
        }else{
            return back()
                ->with('error','Email-Address And Password is Wrong.');
        }
          
    }
}
