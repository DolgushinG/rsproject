<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\Category;
use App\Models\UserAndCategories;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
        // dd($data);
        return Validator::make($data, [
            // 'name' => ['required', 'string', 'max:255'],
            // 'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            // 'salary' => ['required', 'integer'],
            // 'exp_level' => ['required', 'string'],
            // 'description' => ['required', 'string'],
            // 'educational_requirements' => ['required', 'string'],
            // 'experience_requirements' => ['required', 'int'],
            // 'additional_requirements' => ['required', 'int'],
            // 'city_name' => ['required', 'string', 'min:8', 'confirmed'],
            // 'gender' => ['required'],
            // 'company' => ['required', 'string'],
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
        dd($data);
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'salary' => intval($data['salary']),
            'exp_level' => $data['exp_level'],
            'description' => $data['description'],
            'educational_requirements' => $data['educational_requirements'],
            'exp_local' => $data['exp_local'],
            'exp_national' => $data['exp_national'],
            'exp_international' => $data['exp_international'],
            'city_name' => $data['city_name'],
            'gender' => $data['gender'],
            'company' => $data['company'],
            'contact' => $data['contact'],
        ]);
        
        foreach($data['categories'] as $id => $x){
            $userAndCategory = new UserAndCategories;
            $userAndCategory->user_id = $user->id;
            $userAndCategory->category_id = $id;
            $userAndCategory->save();
        }
        return $user;
    }

    public function indexCategory(){
        $categories = Category::all();
        return view('auth.register', compact('categories'));
    }

}
