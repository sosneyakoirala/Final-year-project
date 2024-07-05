<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\State;
use App\Models\City;
use App\Models\Country;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
// use Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Validator;





class FrontendController extends Controller
{

    use AuthenticatesUsers;
    
    public function index(){
        $worker=User::take(4)->where('role','=','worker')->get();
        $profession=DB::table('users')
        ->select('profession',DB::raw('COUNT(profession) AS total'))
        ->where('role','=','worker')
        ->orderBy('total','DESC')
        ->groupBy('profession')
        ->limit(4)
        ->get();

        $avgrating=DB::table('users')
            ->join('ratings', 'users.id', '=', 'ratings.worker_id')
            ->select('ratings.worker_id',DB::raw('AVG(ratings.score) as rating'))
            // ->selectRaw('CAST(AVG(ratings.score) AS DECIMAL(2,0)) AS rating')
            
            ->groupBy('ratings.worker_id')->orderBy('rating','ASC')->limit(4)->get();

      

        $location=DB::table("cities")->join('users','users.city','=','cities.id')->select('cities.name','cities.id',DB::raw('count(cities.name) as total'))->where('users.role','=','worker')->groupBy('cities.name')->groupBy('cities.id')->limit(6)->get();
        // DB::table("users")->select('profession',DB::raw('count(*) as total'))->groupBy('profession')->get();
        $countries = DB::table("users")->join('countries','countries.id','=','users.country')->select('countries.name','users.id')->get();
        $states = DB::table("users")->join('states','states.id','=','users.state')->select('states.name','users.id')->get();
        $cities = DB::table("users")->join('cities','cities.id','=','users.state')->select('cities.name','users.id')->get();
        return view('frontend.pages.index')->with('worker',$worker)->with('states',$states)->with('cities',$cities)->with('countries',$countries)->with('location',$location)->with('profession',$profession)->with('avgrating',$avgrating);
    }
    // public function mys(){
    //     $states = DB::table("countries")->pluck("name", "id");
    //     return view('frontend.index')->with('states',$states);
    // }
    public function register(){
        $states = DB::table("countries")->pluck("name", "id");
        return view('frontend.pages.register')->with('states',$states);
    }
    public function getState(Request $request)
    {
        $states = DB::table("states")
            ->where("country_id", $request->country_id)
            ->pluck("name", "id");
        return response()->json($states);
    }

    public function getCity(Request $request)
    {
        $cities = DB::table("cities")
            ->where("state_id", $request->state_id)
            ->pluck("name", "id");
        return response()->json($cities);
    }
    public function login(){
        return view('frontend.pages.login');
    }
    public function cregister(Request $request)
    {
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'role' => ['required'],
            'phone' => ['required'],
            'password' => ['required'],
            ]);
        $User = new User;
        $User->name = $request->name;
        $User->email = $request->email;
        $User->phone = $request->phone;
        $User->role = $request->role;
        $User->lat = $request->lat;
        $User->lon = $request->lon;
        $User->password = $request->password;
        $User->save();
        if($User){
            request()->session()->flash('success','Successfully registered and Logined');
            Auth::login($User);
            return redirect()->route('home');
        }
        else{
            request()->session()->flash('error','Please try again!');
            return back();
        }
        
    }

    public function wregister(Request $request)
    {   
       
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'role' => ['required'],
            'country' => ['required'],
            'state' => ['required'],
            'city' => ['required'],
            'profession' => ['required'],
            'password' => ['required'],
            ]);
        $User = new User;
        $User->name = $request->name;
        $User->email = $request->email;
        $User->role = $request->role;
        $User->country = $request->country;
        $User->state = $request->state;
        $User->city = $request->city;
        $User->profession = $request->profession;
        $User->lat = $request->lat;
        $User->lon = $request->lon;
        $User->password = $request->password;
        $User->save();
        if($User){
            request()->session()->flash('success','Successfully registered and Logined');
            Auth::login($User);
            return redirect()->route('home');
        }
        else{
            request()->session()->flash('error','Please try again!');
            return back();
        }
        
    }


    public function loginSubmit(Request $request){
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
   
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('home')->withSuccess('Signed in');
        }
  
        return redirect("login")->withSuccess('Login details are not valid');
    }
    public function logout(){
        Session::forget('user');
        Auth::logout();
        request()->session()->flash('success','Logout successfully');
        return redirect()->route('home');
    }

    public function myprofile($id){
        if(Auth::id()==$id){
            $user=User::find(Auth::user()->id);
            $countries = DB::table("users")->join('countries','countries.id','=','users.country')->select('countries.name','users.id')->get();
        $states = DB::table("users")->join('states','states.id','=','users.state')->select('states.name','users.id')->get();
            $cities = DB::table("cities")->join('users','users.city','=','cities.id')->select('cities.name','cities.id')->groupBy('cities.name')->groupBy('cities.id')->get();
            return view('UserEnd.pages.my-profile')->with('user',$user)->with('countries',$countries)->with('states',$states)->with('cities',$cities);
            
        }
       else{
           return redirect()->back();
       }
    }
    public function profileupdate($id){
        
                if(Auth::id()==$id){
                    $user=User::find(Auth::user()->id);
                    return view('UserEnd.pages.updateprofile')->with('user',$user);
                    
                }
                else{
                    return redirect()->back();
                }

    }
    public function locationupdate($id){
        $states = DB::table("countries")->pluck("name", "id");
        $user = User::where('id',$id)->first();

        return view('UserEnd.pages.location')->with('states',$states)->with('user',$user);

    
    }
    public function myformAjax($id)

    {

        $cities = DB::table("cities")

                    ->where("state_id",$id)

                    ->pluck("name","id");

        return json_encode($cities);

    }
    public function updateimage(Request $request, $id){
        if ($request->file('image') == null) {
                $imagename = "";
                }else{
                    $image = $request->file('image');
                    $imagename = time(). $image->getClientOriginalName();
                    $image->move(public_path('uploads/userprofiles/'),$imagename);  
                }
        $profile = User::findOrFail($id);
        $profile->image=$imagename;
        $profile->save();

        return redirect()->back();
    }
    public function updateprofiles(Request $request, $id){
        
        $this->validate($request, [
            'phone' => ['required'],
            'dob' => ['required'],
            'description' => ['required'],
            ]);
        $profile = User::findOrFail($id);
        $profile->name = $request->name;
        $profile->email = $request->email;
        $profile->phone = $request->phone;
        $profile->dob = $request->dob;
        $profile->description = $request->description;
        $profile->save();

        return redirect()->back();
    }
    public function updatelocation(Request $request, $id){
        $profile = User::findOrFail($id);
        $profile->lat = $request->lat;
        $profile->lon = $request->lon;
        $profile->country = $request->country;
        $profile->state = $request->state;
        $profile->city = $request->city;
        $profile->save();

        return redirect()->back();
    }

    public function clientdash($id){
        if(Auth::id()==$id){
            $user=User::find(Auth::user()->id);
            $countries = DB::table("countries")->join('users','users.country','=','countries.id')->select('countries.name','countries.id')->groupBy('countries.name')->groupBy('countries.id')->get();
        $states = DB::table("states")->join('users','users.city','=','states.id')->select('states.name','states.id')->groupBy('states.name')->groupBy('states.id')->get();
            $cities = DB::table("cities")->join('users','users.city','=','cities.id')->select('cities.name','cities.id')->groupBy('cities.name')->groupBy('cities.id')->get();
            return view('ClientEnd.pages.my-profile')->with('user',$user)->with('countries',$countries)->with('states',$states)->with('cities',$cities);
            
        }
       else{
           return redirect()->back();
       }
    }
    public function clientupdate($id){
        $states = DB::table("countries")->pluck("name", "id");
        $user = User::where('id',$id)->first();

        return view('ClientEnd.pages.updateprofile')->with('states',$states)->with('user',$user);

    
    }
    public function updateclientprofile(Request $request, $id){
        $profile = User::findOrFail($id);
        $profile->lat = $request->lat;
        $profile->lon = $request->lon;
        $profile->country = $request->country;
        $profile->state = $request->state;
        $profile->city = $request->city;
        $profile->name = $request->name;
        $profile->email = $request->email;
        $profile->phone = $request->phone;
        $profile->save();

        // return view('ClientEnd.pages.my-profile');
        return redirect()->route('client.profile',['id'=>$id]);
    }

    
    



}
