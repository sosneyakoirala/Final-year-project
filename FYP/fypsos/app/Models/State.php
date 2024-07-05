<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Country;
use App\Models\City;


class State extends Model
{
    use HasFactory;
    protected $fillable = ['name','country_id'];

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function city()
    {
        return $this->hasMany(City::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
