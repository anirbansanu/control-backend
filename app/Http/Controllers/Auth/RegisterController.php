<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Auth;

use App\Models\User;
use App\Models\UserDetail;
class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        parent::__construct();
        $this->middleware('guest');
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    public function register(Request $request)
    {
        $inputs = $request->all();
        // print_r($inputs);exit;
        $this->validator($inputs)->validate();
        $inputs['first_name']='';
        $inputs['last_name']='';
        if(isset($inputs['name'])){
            $nameArr= explode(' ',$inputs['name']);
            if(count($nameArr)>0)   $inputs['first_name']=$nameArr[0];
            if(count($nameArr)>1)   $inputs['last_name']=$nameArr[1];
            $inputs['username']=str_replace(' ','',$inputs['name']).generateUniqueCode(4);
        }
        $user = $this->create($inputs);
        // Mail::to($user->email)->send(new WelcomeMail());
        event(new Registered($user));
        $user->assignRole('user');

        // $dob = $inputs['dob_year'] . '-' . $inputs['dob_month'] . '-'  . $inputs['dob_date'];
        // $inputs['dob'] = Carbon::createFromFormat('Y-m-d', $dob);
        $userDetail = new UserDetail($inputs);

        $user->userDetail()->save($userDetail);
        //$this->guard()->login($user);

        if ($response = $this->registered($request, $user)) {
            return $response;
        }

        /*return $request->wantsJson()
                    ? new JsonResponse([], 201)
                    : redirect($this->redirectPath());*/
        return redirect()->route('register')->with('success', 'You have registered successfully. An email has been sent to your email address. Please check & verify your account');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            // 'gender' => ['required', 'in:' . implode(',', array_keys(getGenders()))],
            // 'first_name' => ['required', 'string', 'max:255'],
            // 'last_name' => ['required', 'string', 'max:255'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required','digits:10', 'numeric'],
            // 'phone' => ['required||regex:/(01)[0-9]{9}/', ' starts_with: 6,7,8,9'],
            // 'username' => ['required', 'string', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'terms' => ['required'],
            // 'country_id' => [
            //     'required',
            //     'exists:App\Models\Country,id'
            // ],
            // 'dob_date' => ['required', 'string', 'max:2'],
        ],
        [
            // 'country_id.required' => 'The country field is required.',
            // 'country_id.exists' => 'The country field is invalid.',
            // 'region_id.required' => 'The region / state field is required.',
            // 'region_id.exists' => 'The region / state field is invalid.',
            // 'city_id.required' => 'The city field is required.',
            // 'city_id.exists' => 'The city field is invalid.',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'username' => $data['username'],
            'name' => $data['name'] ,
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            // 'country_id' => $data['country_id'],
            // 'region_id' => $data['region_id'],
            // 'city_id' => $data['city_id'],
            'user_type' => 2,
            'status' => 0,
            // 'email_verified_at' => now()
        ]);
    }
}
