<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserAndCategories extends Model
{
    protected $table = 'user_and_categories';

    public function category(){
        return $this->hasMany('App\Models\User', 'category_id');
    }
}
