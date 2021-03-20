<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\ImageRequest;
use App\Models\Category;
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
        return view('profile.index');
    }
    public function getTabContentGeneral() {
        $user = User::find(Auth()->user()->id);
        return view('profile.general', compact('user'));
    }
    public function getTabContentInfo() {
        $categoriesAll = Category::all();
        $user = User::find(Auth()->user()->id);
        $userAndCategories = UserAndCategories::where('user_id','=',$user->id)->distinct()->get('category_id');
        $categories = Category::whereIn('id', $userAndCategories)->get();
        $notCategories = Category::whereNotIn('id', $userAndCategories)->get();
        return view('profile.info', compact('user','categories','notCategories'));
    }
    public function getTabContentNotifications() {
        $user = User::find(Auth()->user()->id);
        return view('profile.notifications', compact('user'));
    }
    public function getTabContentSocialLinks() {
        $user = User::find(Auth()->user()->id);
        return view('profile.socialLinks', compact('user'));
    }
    

    // public function saveAvatar(ImageRequest $ImageRequest)
    // {
    //     $id = Auth()->user()->id;
    //     $user = User::find($id);
    //     if ($ImageRequest->hasFile('avatar')) {
    //         $file = $ImageRequest->file('avatar');
    //         $imageName = time() . '.' . $ImageRequest->file('avatar')->getClientOriginalExtension();
    //         $file->storeAs('images/users/' , $imageName, 'public');
    //         $user->photo = 'images/users/'.$imageName;
    //     }
    //     $user->save();

    //     return redirect()->route('profile')->with('success', 'Изменения сохранены');
    // }

}
