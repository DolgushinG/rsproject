<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClimbingMoves extends Model
{
    public function likesMoves(){
        return $this->hasMany('App\Models\LikeDislike')->sum('like');
    }
}
