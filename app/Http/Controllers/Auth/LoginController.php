<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;

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
        // parent::__construct();
        $this->middleware('guest')->except('logout');
    }

    /**
     * Get the needed authorization credentials from the request. Override the default
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    protected function credentials(Request $request)
    {
        return $request->only($this->username(), 'password');
        return ['email' => $request->{$this->username()}, 'password' => $request->password, 'status' => 1];
    }

    public function redirectTo()
    {
        $user = Auth::user();
        // print_r($user);
        // echo $user->isSubAdmin();
        // exit;
        if($user)
        {
            $user->last_login_at = now();
            $user->online_status = 1;
            $user->save();
            if($user->isAdmin())
            {
                return '/admin/dashboard';
            }
            elseif($user->isSubadmin())
            {
                return '/subadmin/dashboard';
            }
            elseif($user->isUser())
            {
                return '/user/home';
            }
            else
            {
                Auth::logout();
                return '/login';
            }
        }
        return '/login';

    }

    /**
     * Log the user out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    public function logout(Request $request)
    {
        $user = Auth::user();
        if($user)
        {
            $user->online_status = 0;
            $user->save();
        }
        $this->guard()->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        /*if ($response = $this->loggedOut($request)) {
            return $response;
        }

        return $request->wantsJson()
            ? new JsonResponse([], 204)
            : redirect('/');*/

        return redirect()->route('login');
    }
}
