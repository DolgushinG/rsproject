<?php

namespace App\Models;

use willvincent\Rateable\Rateable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable,Rateable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'salary_hour',
        'salary_route',
        'exp_level',
        'description',
        'educational_requirements',
        'exp_local',
        'exp_national',
        'exp_international',
        'company',
        'city_name',
        'telegram',
        'instagram',
        'photo',
        'contact'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function categories()
    {
        return $this->hasMany('App\Models\UserAndCategories');
    }
    public function rating()
    {
      return $this->hasMany(Rating::class);
    }
}
