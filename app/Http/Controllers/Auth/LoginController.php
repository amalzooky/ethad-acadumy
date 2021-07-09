<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{

    use AuthenticatesUsers;

    protected $redirectTo = 'dashboard/home';


    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        $this->validateLogin($request);

        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        $username = $request->username;
        $password = $request->password;

        if(filter_var($username, FILTER_VALIDATE_EMAIL)) {
            $user = Auth()->attempt(['email' => $username, 'password' => $password,"is_active"=>1]);
        } else {
            $user = Auth()->attempt(['username' => $username, 'password' => $password,"is_active"=>1]);
        }

        if ($user) {
            if(auth()->user()->hasRole('student')){
                auth()->logoutOtherDevices($request->password);
            }
            \App\User::where("id",auth()->user()->id)->update([
                "logins"=>auth()->user()->logins+=1,
                "last_ip"=>request()->ip(),
                "last_login"=>date("Y-m-d H:m:s")
            ]);
            return $this->sendLoginResponse($request);
        }

        $this->incrementLoginAttempts($request);


        return $this->sendFailedLoginResponse($request);
    }


    protected function validateLogin(Request $request)
    {
        $this->validate($request, [
            'username' => 'required|string',
            'password' => 'required|string',
        ]);
    }

        /**
     * The user has been authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    protected function authenticated(Request $request, $user)
    {
        session()->flash('success', __('dashboard.statuses.login_successfully'));
    }
}
