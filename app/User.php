<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
use HighIdeas\UsersOnline\Traits\UsersOnlineTrait;

class User extends Authenticatable
{
    use Notifiable;
    use HasRoles;
    use SoftDeletes;
    use UsersOnlineTrait;

    protected $guard_name = 'web';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'email', 'password', 'is_active', 'sex', 'date_of_birth', 'full_name', 'card_stu',
        'city_id', 'mobile_number', 'telephone_number', 'avatar', 'facebook_url', 'logins',
        'last_ip', 'last_login', 'active_date'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $dates = ['active_date'];


    public function city()
    {
        return $this->belongsTo('App\City');
    }


    public function getSexAttribute($value)
    {
        switch ($value) {
            case 1:
                $value = __('global.male');
                break;
            case 2:
                $value = __('global.female');
                break;

            default:
                # code...
                break;
        }
        return $value;
    }

    public function student(){
        return $this->hasOne("App\Student");
    }
    public function students(){
        return $this->hasMany("App\Student");
    }
    public function teacher(){
        return $this->hasOne("App\Teacher");
    }

    public function chats(){
        $user = auth()->user();
        $mode = request()->get("mode","student");
        if($user->hasRole("student")){
            return $this->getChatStudent($user->id);
        }else if($user->hasRole("teacher")){
            return $this->getChatTeacher($user->id);
        }else{
            return $this->getChatsSystem($mode);
        }

    }





    public function FirebaseToken(){
        return $this->hasOne("App\FirebaseToken");
    }

}
