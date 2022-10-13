<?php

namespace App\Http\Controllers;
use App\Models\Rating;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;
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
        $this->middleware(['auth','verified']);
    }
    public function getTabContentSidebar(){
        $user = User::find(Auth()->user()->id);
        $reviews = Rating::where('user_id', '=', $user->id);
        $userAndCategories = UserAndCategories::where('user_id','=',$user->id)->distinct()->get('category_id');
        $categories = Category::whereIn('id', $userAndCategories)->get();
        $notCategories = Category::whereNotIn('id', $userAndCategories)->get();
        $foundReviews = $reviews->count();
        $userView = views($user)->count();
        $grades = Grade::all();
        return view('profile.sidebar', compact(['user', 'userView', 'foundReviews','categories','notCategories','grades']));
    }
    public function index() {
        $user = User::find(Auth()->user()->id);
        $reviews = Rating::where('user_id', '=', $user->id);
        $userAndCategories = UserAndCategories::where('user_id','=',$user->id)->distinct()->get('category_id');
        $categories = Category::whereIn('id', $userAndCategories)->get();
        $notCategories = Category::whereNotIn('id', $userAndCategories)->get();
        $foundReviews = $reviews->count();
        $userView = views($user)->count();
        $grades = Grade::all();
        return view('profile.index', compact(['user', 'userView', 'foundReviews','categories','notCategories','grades']));
    }

    public function indexOrganizer() {
        $user = User::find(Auth()->user()->id);
        return view('profileOrganizer.index', compact('user'));
    }
    public function getTabContentGeneral() {
        $user = User::find(Auth()->user()->id);
        $userAndCategories = UserAndCategories::where('user_id','=',$user->id)->distinct()->get('category_id');
        $categories = Category::whereIn('id', $userAndCategories)->get();
        $notCategories = Category::whereNotIn('id', $userAndCategories)->get();
        $grades = Grade::all();

        return view('profile.general', compact(['user','categories','notCategories','grades']));
    }
    public function editTabContentGeneral(Request $request) {
        $messages = array(
            'email.required' => 'Поле email обязательно для заполнения',
            'city.string' => 'Поле город нужно вводить только текст',
            'city.required' => 'Поле город обязательно для заполнения',
            'name.required' => 'Поле имя обязательно для заполнения',
        );
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'city' => 'required|string',
            'email' => 'required',
        ],$messages);
        if ($validator->fails())
        {
            return response()->json(['success' => false,'message'=>$validator->errors()->all()],422);
        }
        $id = Auth()->user()->id;
        $user = User::find($id);
        $user->name = $request->name;
        $user->city_name = $request->city;
        if ($user->save()) {
            return response()->json(['success' => true, 'message' => 'сохранено'], 200);
        } else {
            return response()->json(['success' => false, 'message' => 'ошибка сохранения'], 422);
        }
    }

    public function getTabContentGeneralOrganizer() {
        $user = User::find(Auth()->user()->id);
        return view('profileOrganizer.general', compact('user'));
    }
    public function editTabContentGeneralOrganizer(Request $request): \Illuminate\Http\JsonResponse
    {
        $messages = array(
            'email.required' => 'Поле email обязательно для заполнения',
            'city.string' => 'Поле город нужно вводить только текст',
            'city.required' => 'Поле город обязательно для заполнения',
            'name.required' => 'Поле имя обязательно для заполнения',
        );
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'city' => 'required|string',
            'email' => 'required',
        ],$messages);
        if ($validator->fails())
        {
            return response()->json(['success' => false,'message'=>$validator->errors()->all()],422);
        }
        $id = Auth()->user()->id;
        $user = User::find($id);
        $user->name = $request->name;
        $user->city_name = $request->city;
        if ($user->save()) {
            return response()->json(['success' => true, 'message' => 'сохранено'], 200);
        } else {
            return response()->json(['success' => false, 'message' => 'ошибка сохранения'], 422);
        }
    }


    public function getTabContentReviews() {
        $user = User::find(Auth()->user()->id);
        $reviews = Rating::where('user_id', '=', $user->id)->get();
        return view('profile.reviews', compact('user', 'reviews'));
    }

    public function getTabContentEdit() {
        $user = User::find(Auth()->user()->id);
        $userAndCategories = UserAndCategories::where('user_id','=',$user->id)->distinct()->get('category_id');
        $categories = Category::whereIn('id', $userAndCategories)->get();
        $notCategories = Category::whereNotIn('id', $userAndCategories)->get();
        $grades = Grade::all();
        return view('profile.edit', compact(['user','categories','notCategories','grades']));
    }
    public function editChanges(Request $request) {
        $messages = array(
            'city.string' => 'Поле город нужно вводить только текст',
            'city.required' => 'Поле город обязательно для заполнения',
            'name.required' => 'Поле имя обязательно для заполнения',
            'salaryHour.required' => 'Поле оплата за час обязательно для заполнения',
            'salaryHour.numeric' => 'Поле оплата за час нужно вводить только цифры',
            'salaryRouteBouldering.numeric' => 'Поле оплата за трассу боулдеринг нужно вводить только цифры',
            'categories.required' => 'Укажите область накрутки, должна быть хотя бы одна область',
            'salaryRouteRope.numeric' => 'Поле оплата за трассу трудность нужно вводить только цифры',
            'contact.required' => 'Поле контакт для связи обязательно для заполнения',
        );
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'city_name' => 'required|string',
            'contact' => 'required',
            'salaryHour' => 'nullable|numeric',
            'salaryRouteBouldering' => 'numeric|nullable',
            'salaryRouteRope' => 'numeric|nullable',
            'categories' => 'required',
        ],$messages);
        if ($validator->fails())
        {
            return response()->json(['error' => true,'message'=>$validator->errors()->all()],422);
        }
        $user = User::find(Auth()->user()->id);
        $user->name = $request->name;
        $user->description = $request->description;
        $user->exp_level = $request->exp_level;
        $user->educational_requirements = $request->educational_requirements;
        $user->exp_local = $request->exp_local;
        $user->exp_national = $request->exp_national;
        $user->exp_international = $request->exp_international;
        $user->salary_hour = $request->salaryHour;
        $user->salary_route_rope = $request->salaryRouteRope;
        $user->salary_route_bouldering = $request->salaryRouteBouldering;
        $user->company = $request->company;
        $user->grade = $request->grade;
        $user->active_status = intval($request->active);
        $user->other_city = intval($request->otherCity);
        $user->city_name = intval($request->city_name);
        $user->all_time = intval($request->allTime);
        $user->telegram = $request->telegram;
        $user->instagram = $request->instagram;
        $user->contact = $request->contact;
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
        if ($user->save()) {
            return response()->json(['success' => true, 'message' => 'Успешно сохранено'], 200);
        } else {
            return response()->json(['success' => false, 'message' => 'Ошибка сохранения'], 422);
        }
    }

    public function getTabContentCreateEvent() {
//        $user = User::find(Auth()->user()->id);
        return view('profileOrganizer.create_event');
    }
    public function editChangesCreateEvent(Request $request) {
//        $messages = array(
//            'salaryHour.required' => 'Поле оплата за час обязательно для заполнения',
//            'salaryHour.numeric' => 'Поле оплата за час нужно вводить только цифры',
//            'salaryRouteBouldering.numeric' => 'Поле оплата за трассу боулдеринг нужно вводить только цифры',
//            'categories.required' => 'Укажите область накрутки, должна быть хотя бы одна область',
//            'salaryRouteRope.numeric' => 'Поле оплата за трассу трудность нужно вводить только цифры',
//        );
//        $validator = Validator::make($request->all(), [
//            'salaryHour' => 'nullable|numeric',
//            'salaryRouteBouldering' => 'numeric|nullable',
//            'salaryRouteRope' => 'numeric|nullable',
//            'categories' => 'required',
//        ],$messages);
//        if ($validator->fails())
//        {
//            return response()->json(['success' => false,'message'=>$validator->errors()->all()],422);
//        }
//        $user = User::find(Auth()->user()->id);
//        $user->description = $request->description;
//        $user->exp_level = $request->exp_level;
//        $user->educational_requirements = $request->educational_requirements;
//        $user->exp_local = $request->exp_local;
//        $user->exp_national = $request->exp_national;
//        $user->exp_international = $request->exp_international;
//        $user->salary_hour = $request->salaryHour;
//        $user->salary_route_rope = $request->salaryRouteRope;
//        $user->salary_route_bouldering = $request->salaryRouteBouldering;
//        $user->company = $request->company;
//        $user->grade = $request->grade;
//
//        $notCategories = Category::whereNotIn('id', $request->categories)->get();
//        foreach($notCategories as $notCategory){
//            $match = UserAndCategories::where('user_id','=',$user->id)->where('category_id','=',$notCategory->id)->get()->count();
//            if($match) {
//                UserAndCategories::where('user_id','=',$user->id)->where('category_id','=',$notCategory->id)->delete();
//            }
//        }
//        foreach($request->categories as $id => $x){
//            $userAndCategory = new UserAndCategories;
//            $UserAndCategories = UserAndCategories::where('user_id','=',$user->id)->where('category_id','=',$x)->get()->count();
//            if ($UserAndCategories === 0) {
//                $userAndCategory->user_id = $user->id;
//                $userAndCategory->category_id = $id;
//                $userAndCategory->save();
//            }
//        }
//
//        $user->save();
//        if ($user->save()) {
//            return response()->json(['success' => true, 'message' => 'сохранено'], 200);
//        } else {
//            return response()->json(['success' => false, 'message' => 'ошибка сохранения'], 422);
//        }
        return response()->json(['success' => true, 'message' => 'сохранено'], 200);
    }
    public function getTabContentCurrentEvent() {
//        $user = User::find(Auth()->user()->id);
        return view('profileOrganizer.current_event');
    }
    public function editChangesCurrentEvent(Request $request) {
//        $user = User::find(Auth()->user()->id);
//        $user->active_status = intval($request->active);
//        $user->other_city = intval($request->otherCity);
//        $user->all_time = intval($request->allTime);
//        if ($user->save()) {
//            return response()->json(['success' => true, 'message' => 'сохранено'], 200);
//        } else {
//            return response()->json(['success' => false, 'message' => 'ошибка сохранения'], 422);
//        }
        return response()->json(['success' => true, 'message' => 'сохранено'], 200);
    }
    public function getTabContentPreviewsEvent() {
//        $user = User::find(Auth()->user()->id);
        return view('profileOrganizer.previews_event');
    }
    public function editChangesPreviewsEvent(Request $request) {
//        $messages = array(
//            'contact.required' => 'Поле контакт для связи обязательно для заполнения',
//        );
//        $validator = Validator::make($request->all(), [
//            'contact' => 'required',
//        ],$messages);
//        if ($validator->fails())
//        {
//            return response()->json(['success' => false,'message'=>$validator->errors()->all()],422);
//        }
//        $user = User::find(Auth()->user()->id);
//        $user->telegram = $request->telegram;
//        $user->instagram = $request->instagram;
//        $user->contact = $request->contact;
//        if ($user->save()) {
//            return response()->json(['success' => true, 'message' => 'сохранено'], 200);
//        } else {
//            return response()->json(['success' => false, 'message' => 'ошибка сохранения'], 422);
//        }
        return response()->json(['success' => true, 'message' => 'сохранено'], 200);
    }

}
