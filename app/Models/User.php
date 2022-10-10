<?php

namespace App\Models;
use CyrildeWit\EloquentViewable\InteractsWithViews;
use willvincent\Rateable\Rateable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use CyrildeWit\EloquentViewable\Contracts\Viewable;
use App\Notifications\CustomResetPasswordNotification;

class User extends Authenticatable implements MustVerifyEmail, Viewable
    {
    use HasFactory, Notifiable, Rateable, InteractsWithViews, Notifiable;
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
        'salary_route_rope',
        'salary_route_bouldering',
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
        'apply_privacy_conf',
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

    public function categories(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(UserAndCategories::class);
    }
    public function rating(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
      return $this->hasMany(Rating::class);
    }

    public function organizer(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Organizer::class);
    }

    public function is_organizator()
    {
        $user_id = Auth()->user()->id;
        $organizer = Organizer::where('user_id','=', $user_id)->get('user_id');
        return count($organizer) !== 0;
    }

    public function is_routesetter()
    {
        $user_id = Auth()->user()->id;
        $routesetter = Routesetter::where('user_id','=', $user_id)->get('user_id');
        return count($routesetter) !== 0;
    }
    /**
     *
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new CustomResetPasswordNotification($token));
    }
}
