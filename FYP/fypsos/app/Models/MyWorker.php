<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;


class MyWorker extends Model
{
    use HasFactory;
    protected $table = "my_workers";
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
