<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Hash;
use App\Models\MyWorker;
use App\Models\Rating;
use App\Models\Country;
use App\Models\State;
use App\Models\City;
use Carbon\Carbon;




class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'phone',
        'password',
        'role',
        'image',
        'lat',
        'state',
        'district',
        'city',
        'dob',
        'profession',
        'lon',
        'description',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];


    public function myworker()
    {
        return $this->hasMany(MyWorker::class);
    }
    public function rating()
    {
        return $this->hasMany(Rating::class);
    }
    public function country()
    {
        return $this->hasMany(Country::class);
    }
    public function state()
    {
        return $this->hasMany(State::class);
    }
    public function city()
    {
        return $this->hasMany(City::class);
    }
    // public function age()
    // {
    //     return Carbon::parse($this->attributes['dob'])->age;
    // }
   
    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function setPasswordAttribute($password){
        $this->attributes['password'] = Hash::needsRehash($password) ? Hash::make($password) : $password;
    }
}
