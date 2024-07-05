<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\State;
use App\Models\City;
use App\Models\Country;
use Auth;
use Session;

class AddressController extends Controller
{
    public function show(){
       
        $country = Country::all();

        return view('AdminEnd.pages.address')->with('country',$country);
    }
    public function state(){
        $country = Country::all();
        $state = State::all();
        return view('AdminEnd.pages.stateadd')->with('country',$country)->with('state',$state);
    }
    public function city(){
        $city = State::all();
        $citys = City::all();
        return view('AdminEnd.pages.cityadd')->with('city',$city)->with('citys',$citys);
    }

    public function store(Request $request)
    {   
        $this->validate($request,[
          
            'name'=>'required',
        ]);
        $address = new Country;
        // $address->state_id = $request->state_id;
        $address->name = $request->name;
        $address->save();
        request()->session()->flash('success','Country name successfully added');
        return redirect()->back();
        
        
    }
    public function storestate(Request $request)
    {   
        $this->validate($request,[
            'country_id'=>'required',
            'name'=>'required',
        ]);
        $address = new State;
        $address->country_id = $request->country_id;
        $address->name = $request->name;
        $address->save();
        request()->session()->flash('success','State name successfully added');
        return redirect()->back();
        
        
    }
    public function storecity(Request $request)
    {   
        $this->validate($request,[
            'state_id'=>'required',
            'name'=>'required',
        ]);
        $address = new City;
        $address->state_id = $request->state_id;
        $address->name = $request->name;
        $address->save();
        request()->session()->flash('success','City name successfully added');
        return redirect()->back();
        
        
    }

    public function destroy($id)
    {
        Country::where('id', $id)->delete();
        return redirect()->back()->with('success','Country name Deleted Successfully');
    }
    public function destroystate($id)
    {
        State::where('id', $id)->delete();
        return redirect()->back()->with('success','State name Deleted Successfully');
    }
    public function destroycity($id)
    {
        City::where('id', $id)->delete();
        return redirect()->back()->with('success','City name Deleted Successfully');
    }
}
