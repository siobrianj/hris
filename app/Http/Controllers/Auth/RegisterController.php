<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\EmployeeProfile;
use DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

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
    protected $redirectTo = '/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
        $lastid = $user->id;
        // $user->profile()->save(new EmployeeProfile);

       // return  $user = DB::table("users")->insertGetId([
       //      "name" => $data["name"],
       //      "email" => $data["email"],
       //      "password" => Hash::make($data["password"]),

       //  ]);

        // #creation on profiles
  

        // $id2 = DB::table("employee_profiles")->insert([
        //     "first_name" => $data["name"],
        //     "user_id" => $lastid,
        //     "middle_name" => "",
        //     "last_name" => "",
        //     "suffix" => "",
        //     "birthday" => now(),
        //     "address" => "",
        //     "gender" => "Male",
        //     "reports_to" => "",
        //     "schedule" => "",
        //     "department" =>"",
        //     "position" => "",
        //     "date_hired" => now(),
        //     "date_end_contract" => now(),
        //     "date_separated" => now(),
        //     "passport_no" => "",
        //     "passport_expiration" => now(),
        //     "phone" => "",
        //     "nationality" => "",
        //     "religion" => "",
        //     "marital_status" => "",
        //     "have_spouse" => "No",
        //     "number_of_child" => 0,
        //     "bank_name" => "",
        //     "bank_accout_no" => "",
        //     "bank_status" => "Active",
        //     "salary_bir_status" => "",
        //     "salary_basis" => "",
        //     "salary_basic" => 0,
        //     "salary_allowance" => 0,
        //     "salary_cola" => 0,
        //     "primary_contact_name" => "",
        //     "primary_contact_relationship" => "",
        //     "primary_contact_phone" => "",
        //     "secondary_contact_name" => "",
        //     "secondary_contact_relationship" => "",
        //     "secondary_contact_phone" => "",
        //     "employee_status" => "Active",
        //     "employee_type" => ""]);


        /*    $user = User::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'password' => bcrypt($data['password']),
    ]);
    $user->profile()->save(new Profile);
    return $user;
}*/

    
        
    }
}
