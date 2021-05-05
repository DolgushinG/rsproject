<?php

namespace App\Http\Controllers;
 
use App\Models\User;
use Illuminate\Http\Request;

class CropImageController extends Controller
{
    public function uploadCropImage(Request $request)
    {
        
        $user = User::find(Auth()->user()->id);
        if (!file_exists('storage/images/users/'.$user->id.'/')) {
            mkdir('storage/images/users/'.$user->id.'/', 0777, true);
        }
        $folderPath = public_path('storage/images/users/'.$user->id.'/');
        $image_parts = explode(";base64,", $request->image);
        $image_type_aux = explode("image/", $image_parts[0]);
        $image_type = $image_type_aux[1];
        $image_base64 = base64_decode($image_parts[1]);
        if ($image_type == 'png'|| $image_type == 'jpg' || $image_type == 'jpeg')
        {
            $imageName = uniqid() . '.png';
            $imageFullPath = $folderPath.$imageName;
            file_put_contents($imageFullPath, $image_base64);
            $user->photo = 'images/users/'.$user->id.'/'.$imageName;
            if($user->save()){
                return response()->json(['success'=> true,'message' => 'Аватар успешно изменен'], 200);
            } 
        } else {
            return response()->json(['success'=> false, 'message' => 'Неверный формат файла'],422);
        }
    }
}