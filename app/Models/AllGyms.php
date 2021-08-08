<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AllGyms extends Model
{
    use HasFactory;

    public function likesGyms(){
        return $this->hasMany('App\Models\LikeDislike')->sum('like');
    }
    public function dislikesGyms(){
        return $this->hasMany('App\Models\LikeDislike')->sum('dislike');
    }

}
