<?php

namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use App\Models\User;
 
class CropImageController extends Controller
{
    public function uploadCropImage(Request $request)
    {
        $user = User::find(Auth()->user()->id);
        $folderPath = public_path('storage/images/users/');
        $image_parts = explode(";base64,", $request->image);
        $image_type_aux = explode("image/", $image_parts[0]);
        $image_type = $image_type_aux[1];
        $image_base64 = base64_decode($image_parts[1]);
        $imageName = uniqid() . '.png';
        $imageFullPath = $folderPath.$imageName;
        file_put_contents($imageFullPath, $image_base64);
        $user->photo = '/images/users/'.$imageName;
        $user->save();
        return response()->json(['success'=> true,'message' => 'Crop Image Uploaded Successfully'], 200);
    }
}