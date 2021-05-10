<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\Category;
use App\Models\Grade;
use App\Models\UserAndCategories;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

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
    protected $redirectTo = '/email/verify';

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
             'salary_route' => ['required', 'integer'],
             'salary_hour' => ['required', 'integer'],
             'exp_level' => ['required', 'string'],
             'city_name' => ['required', 'string'],
             'contact' => ['required', 'string'],
             'grade' => ['required', 'string'],
             'password' => ['required', 'string', 'min:5', 'confirmed'],
             'categories' => ['required'],
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

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'salary_hour' => intval($data['salary_hour']),
            'salary_route' => intval($data['salary_route']),
            'exp_level' => $data['exp_level'],
            'description' => $data['description'],
            'grade' => $data['grade'],
            'educational_requirements' => $data['educational_requirements'],
            'exp_local' => $data['exp_local'],
            'exp_national' => $data['exp_national'],
            'exp_international' => $data['exp_international'],
            'city_name' => $data['city_name'],
            'company' => $data['company'],
            'telegram' => $data['telegram'],
            'instagram' => $data['instagram'],
            'contact' => $data['contact'],
            'other_city' => 0,
            'all_time' => 0,
            'average_rating' => 0,
            'photo' => 'images/users/defaultAvatar.jpeg',
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
        $grades = Grade::all();
        return view('auth.register', compact('categories','grades'));
    }

    public function showRegistrationForm(Request $request)
    {
        $categories = Category::all();
        $grades = Grade::all();
        return view('auth.register', compact('categories','grades'));
    }

}
