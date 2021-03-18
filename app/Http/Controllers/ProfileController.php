<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\ImageRequest;

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

        return view('profile.general');
    }
    public function getTabContentConnections() {
        return view('profile.connections');
    }
    public function getTabContentChangePassword() {
        return view('profile.changePassword');
    }
    public function getTabContentInfo() {
        return view('profile.info');
    }
    public function getTabContentNotifications() {
        return view('profile.notifications');
    }
    public function getTabContentSocialLinks() {
        return view('profile.socialLinks');
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
