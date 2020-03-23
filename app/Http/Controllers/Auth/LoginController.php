<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\RoleType;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;
use App\User;

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
    //protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        $this->validateLogin($request);
        $user = User::where('email', $request->email)->first();
        $role_type = RoleType::where('name', 'admin')->first();
        if (is_null($user)) {
            return redirect()->route('login')->with('error', 'Email does not found in Database. Please register first');
        } elseif ($user->role_type_id == $role_type->id) {
            if (Auth::guard('web')->attempt(['email' => $request->email, 'password'=>$request->password], $request->remember)) {
                return redirect()->intended(route('admin.index'));
            }
            return redirect()->route('login')->with('error', 'Incorrect password');
        }else{
            return redirect()->route('login')->with('error', 'Access denied!');
        }
    }
}
