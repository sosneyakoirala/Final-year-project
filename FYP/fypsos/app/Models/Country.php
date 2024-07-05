<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\State;
use App\Models\City;


class Country extends Model
{
    use HasFactory;
    protected $fillable = ['name'];

    public function state()
    {
        return $this->hasMany(State::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
