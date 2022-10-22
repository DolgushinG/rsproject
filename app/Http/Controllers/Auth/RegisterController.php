<?php

namespace App\Http\Controllers\Auth;
use App\Mail\NewUser;
use App\Models\Organizer;
use App\Models\Routesetter;
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
use Illuminate\Support\Facades\Mail;

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
    protected $redirectTo = 'email/verify';

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
        if (array_key_exists("is_organizer",$data) && $data['is_organizer'] == '1')
        {
            return Validator::make($data, [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'city_name' => ['required', 'string'],
                'password' => ['required', 'string', 'min:5', 'confirmed'],
            ]);
        }
        else
        {
            return Validator::make($data, [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'salary_route_rope' => ['integer','nullable'],
                'salary_route_bouldering' => ['integer','nullable'],
                'salary_hour' => ['required', 'integer'],
                'exp_level' => ['required', 'string'],
                'city_name' => ['required', 'string'],
                'grade' => ['required', 'string'],
                'password' => ['required', 'string', 'min:5', 'confirmed'],
                'categories' => ['required'],
            ]);
        }
    }


    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        if (array_key_exists("is_organizer",$data) && $data['is_organizer'] == '1') {
            $user = User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'city_name' => $data['city_name'],
                'telegram' => $data['telegram'],
                'contact' => $data['contact'],
                'apply_instruction' => 'yes',
                'active_status' => 1,
            ]);
            $organizer = new Organizer;
            $organizer->user_id = $user->id;
            $organizer->save();

            $newUser = $data['name'];
            $userCity = $data['city_name'];
            $details = [
                'title' => "NEW ORGANIZER !!",
                'body' => date('Y-m-d H:i:s'),
                'userName' => $newUser,
                'userCity' => $userCity
            ];
        } else {
            $user = User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'salary_hour' => intval($data['salary_hour']),
                'salary_route_rope' => intval($data['salary_route_rope']),
                'salary_route_bouldering' => intval($data['salary_route_bouldering']),
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
                'apply_privacy_conf' => 'yes',
                'average_rating' => 0,
                'photo' => 'images/users/defaultAvatar.jpeg',
            ]);
            $routesetter = new Routesetter;
            $routesetter->user_id = $user->id;
            $routesetter->save();

            foreach ($data['categories'] as $id => $x) {
                $userAndCategory = new UserAndCategories;
                $userAndCategory->user_id = $user->id;
                $userAndCategory->category_id = $id;
                $userAndCategory->save();
            }
            $newUser = $data['name'];
            $userCity = $data['city_name'];
            $details = [
                'title' => "NEW USER !!",
                'body' => date('Y-m-d H:i:s'),
                'userName' => $newUser,
                'userCity' => $userCity
            ];
        }
        Mail::to('Dolgushing@yandex.ru')->send(new NewUser($details));
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
