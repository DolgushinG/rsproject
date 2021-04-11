<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\ImageRequest;
use App\Models\Category;
use App\Models\Grade;
use App\Models\UserAndCategories;

class ProfileController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index() {
        $user = User::find(Auth()->user()->id);
        return view('profile.index', compact('user'));
    }
    public function getTabContentGeneral() {
        $user = User::find(Auth()->user()->id);
        return view('profile.general', compact('user'));
    }
    public function editTabContentGeneral(Request $request) {
        $id = Auth()->user()->id;
        $user = User::find($id);
        if ($request->file) {
            $file = $request->file;
            $imageName = time() . '.' . $request->file->getClientOriginalExtension();
            $file->storeAs('images/users/' , $imageName, 'public');
            $user->photo = 'images/users/'.$imageName;
        }
        $user->name = $request->name;
        $user->city_name = $request->city;
        ;
        if ($user->save()) {
            return response()->json(['success' => true, 'message' => 'сохранено'], 200);
         } else {
            return response()->json(['success' => false, 'message' => 'ошибка сохранения'], 422);
         }
    }

    public function getTabContentInfo() {
        // $categoriesAll = Category::all();
        $user = User::find(Auth()->user()->id);
        $userAndCategories = UserAndCategories::where('user_id','=',$user->id)->distinct()->get('category_id');
        $categories = Category::whereIn('id', $userAndCategories)->get();
        $notCategories = Category::whereNotIn('id', $userAndCategories)->get();
        $grades = Grade::all();
        return view('profile.info', compact('user','categories','notCategories','grades'));
    }
    public function editChagesInfo(Request $request) {
        $user = User::find(Auth()->user()->id);
        $user->description = $request->description;
        $user->exp_level = $request->exp_level;
        $user->educational_requirements = $request->educational_requirements;
        $user->exp_local = $request->exp_local;
        $user->exp_national = $request->exp_national;
        $user->exp_international = $request->exp_international;
        $user->salary_hour = $request->salaryHour;
        $user->salary_route = $request->salaryRoute;
        $user->company = $request->company;
        $user->grade = $request->grade;
        // $product->save($request->all());
        $notCategories = Category::whereNotIn('id', $request->categories)->get();
        foreach($notCategories as $notCategory){
           $match = UserAndCategories::where('user_id','=',$user->id)->where('category_id','=',$notCategory->id)->get()->count();
           if($match) {
            UserAndCategories::where('user_id','=',$user->id)->where('category_id','=',$notCategory->id)->delete();
           }
        }
        foreach($request->categories as $id => $x){
            $userAndCategory = new UserAndCategories;
            $UserAndCategories = UserAndCategories::where('user_id','=',$user->id)->where('category_id','=',$x)->get()->count();
            if ($UserAndCategories === 0) {
                $userAndCategory->user_id = $user->id;
                $userAndCategory->category_id = $id;
                $userAndCategory->save();
            } 
        }
        $user->save();
        // $userAndCategories = UserAndCategories::where('user_id','=',$user->id)->distinct()->get('category_id');
        // $categories = Category::whereIn('id', $userAndCategories)->get();
        // $notCategories = Category::whereNotIn('id', $userAndCategories)->get();
        // return view('profile.info', compact('user','categories','notCategories'));
        if ($user->save()) {
            return response()->json(['success' => true, 'message' => 'сохранено'], 200);
        } else {
            return response()->json(['success' => false, 'message' => 'ошибка сохранения'], 422);
        }
    }

    public function getTabContentNotifications() {
        $user = User::find(Auth()->user()->id);
        return view('profile.notifications', compact('user'));
    }
    public function editChagesNotifications(Request $request) {
        $user = User::find(Auth()->user()->id);
        $user->active_status = intval($request->active);
        $user->other_city = intval($request->otherCity);
        $user->all_time = intval($request->allTime);
        if ($user->save()) {
            return response()->json(['success' => true, 'message' => 'сохранено'], 200);
        } else {
            return response()->json(['success' => false, 'message' => 'ошибка сохранения'], 422);
        }
    }
    public function getTabContentSocialLinks() {
        $user = User::find(Auth()->user()->id);
        return view('profile.socialLinks', compact('user'));
    }
    
    public function editChagesSocialLinks(Request $request) {
        $user = User::find(Auth()->user()->id);
        $user->telegram = $request->telegram;
        $user->instagram = $request->instagram;
        $user->contact = $request->contact;
        if ($user->save()) {
            return response()->json(['success' => true, 'message' => 'сохранено'], 200);
        } else {
            return response()->json(['success' => false, 'message' => 'ошибка сохранения'], 422);
        }
    }

}
