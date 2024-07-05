<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\State;
use App\Models\Country;
use App\Models\City;
use App\Models\MyWorker;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;




class MyWorkerController extends Controller
{
    public function workers(){
        if(Auth::check()){
            $me=Auth::user()->id;
            $worker=User::where('role','=','worker')
            ->where('id','!=',$me)->paginate(6);
            // $avgrating = DB::table('ratings')
            // ->join('users', 'ratings.worker_id','=','users.id')
            // // ->join('users', 'ratings.user_id','=','users.id')
            // ->select(DB::raw('CAST(AVG(score) as decimal(10,1)) as rating'),DB::raw('count(ratings.worker_id) as total'),'ratings.score')
            // ->where('users.role','=','worker')
            // ->where('users.id','=','ratings.worker_id')
            // ->groupBy('ratings.score')->get();
//             $avgrating = User::with('rating')
// ->join('ratings','users.id','=','ratings.user_id')
// ->select('users.id',DB::raw('avg(score) as rating'),'ratings.worker_id')
// ->where('users.id','=','ratings.worker_id')
// ->groupBy('ratings.worker_id')
// ->get();

    $avgrating=DB::table('users')
            ->join('ratings', 'users.id', '=', 'ratings.worker_id')
            ->select('ratings.worker_id')
            ->selectRaw('CAST(AVG(ratings.score) AS DECIMAL(2,0)) AS rating')
            ->groupBy('ratings.worker_id')->get();
        // $countries = DB::table("users")->join('countries','countries.id','=','users.country')->select('countries.name','users.id')->get();
        // $city=DB::table("cities")->join('users','users.city','=','cities.id')->select('cities.name','cities.id')->groupBy('cities.name')->groupBy('cities.id')->get();
        $cities=DB::table("cities")->join('users','users.city','=','cities.id')->select('cities.name','cities.id')->where('users.role','=','worker')->groupBy('cities.name')->groupBy('cities.id')->get();
        $states=DB::table("states")->join('users','users.state','=','states.id')->select('states.name','states.id')->groupBy('states.name')->groupBy('states.id')->get();
        $countries=DB::table("countries")->join('users','users.country','=','countries.id')->select('countries.name','countries.id')->groupBy('countries.name')->groupBy('countries.id')->get();
        // $states = DB::table("users")->join('states','states.id','=','users.state')->select('states.name','users.id')->get();
        // $cities = DB::table("users")->join('cities','cities.id','=','users.state')->select('cities.name','users.id')->groupBy('cities.name')->groupBy('users.id')->get();
        $category=DB::table("users")->select('profession',DB::raw('count(*) as total'))->where('role','=','worker')->groupBy('profession')->get();
        return view('frontend.pages.workerspage')->with('worker',$worker)->with('states',$states)->with('cities',$cities)->with('countries',$countries)->with('category',$category)->with('avgrating',$avgrating);
        }
        else{
            $worker2=User::where('role','=','worker')->paginate(6);

            $avgrating2=DB::table('users')
            ->join('ratings', 'users.id', '=', 'ratings.worker_id')
            ->select('ratings.worker_id')
            ->selectRaw('CAST(AVG(ratings.score) AS DECIMAL(2,0)) AS rating')
            ->groupBy('ratings.worker_id')->get();

            $cities2=DB::table("cities")->join('users','users.city','=','cities.id')->select('cities.name','cities.id')->where('users.role','=','worker')->groupBy('cities.name')->groupBy('cities.id')->get();
            $states2=DB::table("states")->join('users','users.state','=','states.id')->select('states.name','states.id')->groupBy('states.name')->groupBy('states.id')->get();
            $countries2=DB::table("countries")->join('users','users.country','=','countries.id')->select('countries.name','countries.id')->groupBy('countries.name')->groupBy('countries.id')->get();
        // $countries2 = DB::table("users")->join('countries','countries.id','=','users.country')->select('countries.name','users.id')->get();
        // $countries2 = DB::table("users")->join('states','states.id','=','users.state')->select('states.name','users.id')->get();
        // $cities2 = DB::table("users")->join('cities','cities.id','=','users.state')->select('cities.name','users.id',DB::raw('count(cities.name) as total'))->groupBy('cities.name')->groupBy('users.id')->get();
        $category2=DB::table("users")->select('profession',DB::raw('count(*) as total'))->where('role','=','worker')->groupBy('profession')->get();
        return view('frontend.pages.workerspage')->with('worker2',$worker2)->with('states2',$states2)->with('cities2',$cities2)->with('countries2',$countries2)->with('category2',$category2)->with('avgrating2',$avgrating2);
        }
        
    }

    public function byprofession($name){

        if(Auth::check()){
            $me=Auth::user()->id;
            $worker=User::where('role','=','worker')->where('profession','=',$name)
            ->where('id','!=',$me)->paginate(6);
            // $cities=DB::table("cities")->join('users','users.city','=','cities.id')->select('cities.name','cities.id','user.id')->groupBy('cities.name',DB::raw('count(cities.name) as total'))->groupBy('users.id')->groupBy('cities.id')->get();
            // $countries = DB::table("users")->join('countries','countries.id','=','users.country')->select('countries.name','users.id')->get();
            // $states = DB::table("users")->join('states','states.id','=','users.state')->select('states.name','users.id')->get();
            $location=DB::table("cities")->join('users','users.city','=','cities.id')->select('cities.name','cities.id')->where('users.role','=','worker')->groupBy('cities.name')->groupBy('cities.id')->get();
            $countries = DB::table("users")->join('countries','countries.id','=','users.country')->select('countries.name','users.id')->get();
        $states = DB::table("users")->join('states','states.id','=','users.state')->select('states.name','users.id')->get();
        $cities = DB::table("users")->join('cities','cities.id','=','users.state')->select('cities.name','users.id',DB::raw('count(cities.name) as total'))->groupBy('cities.name')->groupBy('users.id')->get();
        
            $category=DB::table("users")->select('profession',DB::raw('count(*) as total'))->where('role','=','worker')->groupBy('profession')->get();
            return view('frontend.pages.bylocation')->with('worker',$worker)->with('states',$states)->with('cities',$cities)->with('countries',$countries)->with('category',$category)->with('location',$location);
        }else{
        $worker2=User::where('role','=','worker')->where('profession','=',$name)->paginate(6);
        $location2=DB::table("cities")->join('users','users.city','=','cities.id')->select('cities.name','cities.id')->where('users.role','=','worker')->groupBy('cities.name')->groupBy('cities.id')->get();
        $countries2 = DB::table("users")->join('countries','countries.id','=','users.country')->select('countries.name','users.id')->get();
        $states2 = DB::table("users")->join('states','states.id','=','users.state')->select('states.name','users.id')->get();
        $cities2 = DB::table("users")->join('cities','cities.id','=','users.state')->select('cities.name','users.id',DB::raw('count(cities.name) as total'))->groupBy('cities.name')->groupBy('users.id')->get();
        $category2=DB::table("users")->select('profession',DB::raw('count(*) as total'))->where('role','=','worker')->groupBy('profession')->get();
        return view('frontend.pages.bylocation')->with('worker2',$worker2)->with('states2',$states2)->with('cities2',$cities2)->with('countries2',$countries2)->with('category2',$category2)->with('location2',$location2);
        }
    }

    public function bylocation($id){
        if(Auth::check()){
            $me=Auth::user()->id;
            $worker=User::where('role','=','worker')->where('city','=',$id)
            ->where('id','!=',$me)->paginate(6);
            $location=DB::table("cities")->join('users','users.city','=','cities.id')->select('cities.name','cities.id')->where('users.role','=','worker')->groupBy('cities.name')->groupBy('cities.id')->get();
        $countries = DB::table("users")->join('countries','countries.id','=','users.country')->select('countries.name','users.id')->get();
        $states = DB::table("users")->join('states','states.id','=','users.state')->select('states.name','users.id')->get();
        
        $category=DB::table("users")->select('profession',DB::raw('count(*) as total'))->where('role','=','worker')->groupBy('profession')->get();
        return view('frontend.pages.bylocation')->with('worker',$worker)->with('states',$states)->with('countries',$countries)->with('category',$category)->with('location',$location);
        }else{
        $worker2=User::where('role','=','worker')->where('city','=',$id)->paginate(6);
        $location2=DB::table("cities")->join('users','users.city','=','cities.id')->select('cities.name','cities.id')->where('users.role','=','worker')->groupBy('cities.name')->groupBy('cities.id')->limit(2    )->get();
        $countries2 = DB::table("users")->join('countries','countries.id','=','users.country')->select('countries.name','users.id')->get();
        $states2 = DB::table("users")->join('states','states.id','=','users.state')->select('states.name','users.id')->get();
       
        $category2=DB::table("users")->select('profession',DB::raw('count(*) as total'))->where('role','=','worker')->groupBy('profession')->get();
        return view('frontend.pages.bylocation')->with('worker2',$worker2)->with('states2',$states2)->with('countries2',$countries2)->with('category2',$category2)->with('location2',$location2);
    
        }
    }

    public function categories(){
        $profession=DB::table("users")->select('profession',DB::raw('count(*) as total'))->where('role','=','worker')->groupBy('profession')->limit(10)->get();
        $location=DB::table("cities")->join('users','users.city','=','cities.id')->select('cities.name','cities.id',DB::raw('count(cities.name) as total'))->where('users.role','=','worker')->groupBy('cities.name')->groupBy('cities.id')->limit(10)->get();
        return view('frontend.pages.categories')->with('profession',$profession)->with('location',$location);
    }

    public function addcontact(Request $request){
        $contact = new MyWorker();
        $contact->user_id = auth()->id();
        $contact->worker_id =$request->worker_id;
        $contact->save();
        return redirect()->back();

    }


public function workerdetail($id){
    $worker=User::where('id',$id)->first();
    $countries = DB::table("users")->join('countries','countries.id','=','users.country')->select('countries.name','users.id')->get();
        $states = DB::table("users")->join('states','states.id','=','users.state')->select('states.name','users.id')->get();
        $cities = DB::table("cities")->join('users','users.city','=','cities.id')->select('cities.name','cities.id')->where('users.role','=','worker')->groupBy('cities.name')->groupBy('cities.id')->get();
         
    return view('frontend.pages.workerdetail')->with('worker',$worker)->with('states',$states)->with('cities',$cities)->with('countries',$countries);  

}
public function contactlist(){
    $me = auth()->id();

        //filtering the data of logged user
        $profiles = User::where('id',$me)->get();
        $location=DB::table("cities")->join('users','users.city','=','cities.id')->select('cities.name','cities.id')->groupBy('cities.name')->groupBy('cities.id')->get();
        $contactlist = User::join('my_workers', 'users.id','=','my_workers.worker_id')
        ->select('my_workers.id','my_workers.worker_id as wid', 'my_workers.user_id','my_workers.status', 'users.id as uid','users.name','users.city','users.profession','users.phone','users.lat','users.lon','users.dob','users.email' )
        ->where('user_id', $me)->where('status','=','show')->paginate(6);
        return view('ClientEnd.pages.contactlist')->with('profiles', $profiles)->with('contactlist', $contactlist)->with('location', $location);
}
public function removecontact(Request $request, $id){
    $contactlist = MyWorker::findOrFail($id);
    if($contactlist->status=="show"){
        $contactlist->status="remove";
    }
    else{
        $contactlist->status="show";
    }
    $contactlist->update();
    return redirect()->back();
}
public function clientlist(){
    $me = auth()->id();

        //filtering the data of logged user
        $profiles = User::where('id',$me)->get();
        $location=DB::table("cities")->join('users','users.city','=','cities.id')->select('cities.name','cities.id')->groupBy('cities.name')->groupBy('cities.id')->get();
    $clientlist = DB::table('users')
    ->Join('my_workers','my_workers.user_id','=','users.id')
    ->select('users.name','users.lat','users.lon','users.phone','users.email','users.city','my_workers.id as wid','users.id')
    ->where('worker_id', $me)->paginate(5);
        return view('UserEnd.pages.clientlist')->with('clientlist', $clientlist)->with('location',$location);
}

public function clientdetail($id){
    $client=User::where('id',$id)->first();
    $countries = DB::table("users")->join('countries','countries.id','=','users.country')->select('countries.name','users.id')->get();
        $states = DB::table("users")->join('states','states.id','=','users.state')->select('states.name','users.id')->get();
        $cities = DB::table("cities")->join('users','users.city','=','cities.id')->select('cities.name','cities.id')->where('users.role','=','worker')->groupBy('cities.name')->groupBy('cities.id')->get();
         
    return view('frontend.pages.clientdetail')->with('client',$client)->with('states',$states)->with('cities',$cities)->with('countries',$countries);  

}

public function workerSearch(Request $request){
        

    if(Auth::check()){
        $me=Auth::user()->id;
    $worker=User::where('profession','like','%'.$request->profession.'%')
    ->orderBy('id','DESC')
    ->paginate('9');
    $city=City::where('name','like','%'.$request->city.'%')
    ->orderBy('id','DESC')
    ->paginate('9');
    $avgrating=DB::table('users')
            ->join('ratings', 'users.id', '=', 'ratings.worker_id')
            ->select('ratings.worker_id')
            ->selectRaw('CAST(AVG(ratings.score) AS DECIMAL(2,0)) AS rating')
            ->groupBy('ratings.worker_id')->orderBy('rating','DESC')->limit(4)->get();

            $location=DB::table("cities")->join('users','users.city','=','cities.id')->select('cities.name','cities.id')->where('users.role','=','worker')->groupBy('cities.name')->groupBy('cities.id')->get();
            $countries = DB::table("users")->join('countries','countries.id','=','users.country')->select('countries.name','users.id')->get();
            $states = DB::table("users")->join('states','states.id','=','users.state')->select('states.name','users.id')->get();
            $cities=DB::table("cities")->join('users','users.city','=','cities.id')->select('cities.name','cities.id')->where('users.role','=','worker')->groupBy('cities.name')->groupBy('cities.id')->get();
            $category=DB::table("users")->select('profession',DB::raw('count(*) as total'))->where('role','=','worker')->groupBy('profession')->get();
    return view('frontend.pages.workerspage')->with('worker',$worker)->with('states',$states)->with('cities',$cities)->with('countries',$countries)->with('category',$category)->with('avgrating',$avgrating)->with('city',$city);
}
    else{


    //     $worker2 = User::where('profession','like','%'.$request->profession.'%')
    // ->orWhereHas('cities', function ($query)  {
    //     $query->where('name', 'like', '%'.$request->city.'%');
    // })
    // ->orderBy('id')
    // ->paginate(20);




        $worker2=User::where('profession','like','%'.$request->profession.'%')
                ->orderBy('id','DESC')
                ->paginate('9');
                $city2=City::where('name','like','%'.$request->city.'%')
    ->orderBy('id','DESC')
    ->paginate('9');
    $data=$worker2->merge($city2);
                $avgrating2=DB::table('users')
            ->join('ratings', 'users.id', '=', 'ratings.worker_id')
            ->select('ratings.worker_id')
            ->selectRaw('CAST(AVG(ratings.score) AS DECIMAL(2,0)) AS rating')
            ->groupBy('ratings.worker_id')->orderBy('rating','DESC')->limit(4)->get();
                // $worker2=User::where('role','=','worker')->paginate(6);
                // $location2=DB::table("cities")->join('users','users.city','=','cities.id')->where('cities.name','like','%'.$request->city.'%')
                // ->orderBy('cities.name','DESC')
                // ->paginate('9');
                $location2=User::where('city','like','%'.$request->city.'%')
                ->orderBy('id','DESC')
                ->paginate('9');
                $cities2=DB::table("cities")->join('users','users.city','=','cities.id')->select('cities.name','cities.id')->where('users.role','=','worker')->groupBy('cities.name')->groupBy('cities.id')->get();
            $states2=DB::table("states")->join('users','users.state','=','states.id')->select('states.name','states.id')->groupBy('states.name')->groupBy('states.id')->get();
            $countries2=DB::table("countries")->join('users','users.country','=','countries.id')->select('countries.name','countries.id')->groupBy('countries.name')->groupBy('countries.id')->get();
            $category2=DB::table("users")->select('profession',DB::raw('count(*) as total'))->where('role','=','worker')->groupBy('profession')->get();
    return view('frontend.pages.workerspage')->with('worker2',$worker2)->with('states2',$states2)->with('cities2',$cities2)->with('countries2',$countries2)->with('category2',$category2)->with('avgrating2',$avgrating2)->with('location2',$location2)->with('city2',$city2);
    } 
}
public function destroyworker($id){
    MyWorker::where('id', $id)->delete();
    return redirect()->back()->with('success','User data Deleted Successfully');
}

}
