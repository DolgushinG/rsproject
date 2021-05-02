<?php

namespace App\Models;
use CyrildeWit\EloquentViewable\InteractsWithViews;
use CyrildeWit\EloquentViewable\Contracts\Viewable;
use willvincent\Rateable\Rateable;
use Illuminate\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Notifications\Notifiable;

class User extends Model implements
    AuthenticatableContract,
    AuthorizableContract,
    CanResetPasswordContract,
    Viewable
    {
    use Authenticatable, Authorizable, CanResetPassword, HasFactory, Notifiable, Rateable, InteractsWithViews, MustVerifyEmail, Notifiable;
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
        'contact',
        'other_city',
        'all_time',
        'grade',
        'average_rating',
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
