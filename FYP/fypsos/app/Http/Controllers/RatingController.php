<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\State;
use App\Models\Country;
use App\Models\City;
use App\Models\Rating;
use App\Models\MyWorker;
use Illuminate\Support\Facades\Auth;


class RatingController extends Controller
{
    public function show($id){
        $worker=User::where('id',$id)->first();
        $rating = MyWorker::where('id',$id)->first();
        return view('frontend.pages.ratingform')->with('rating',$rating)->with('worker',$worker);

    }
    public function store(Request $request)
    {

        $rating = new Rating();
        $rating->user_id = auth()->id();
        $rating->worker_id = $request->worker_id;
        $rating->score = $request->score;
        // $rating->review = $request->review;
        $rating->save();
        return redirect()->route('contactlist');
    }
    

}
