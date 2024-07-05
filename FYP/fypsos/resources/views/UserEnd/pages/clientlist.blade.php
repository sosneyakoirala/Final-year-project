<!DOCTYPE html>
<html lang="en">
   <head>
      @include('frontend.includes.head')
   </head>
   <body>
@include('frontend.includes.nav')


    
    
    <div id="content">
    <div class="container">
    <div class="row">
    <div class="col-md-4 col-sm-4 col-xs-12">
    <div class="right-sideabr">
    <div class="inner-box">
    <h4>Manage Profile</h4>
    <ul class="lest item">
        <li><a  href="{{route('user.profile',Auth::user()->id)}}">My Profile</a></li>
        <li><a href="{{url('profile-update',Auth::user()->id)}}">Update Profile</a></li>
        <li><a href="{{route('user.location',Auth::user()->id)}}">Update Location</a></li>
        <li><a href="{{route('contactlist')}}">Contact List</a></li>
        <li><a class="active" href="{{route('clientlist')}}">Client List</a></li>
        <li><a href="/user/logout">Sign Out</a></li>
    </ul>
    
    
    </div>
    </div>
    </div>
    <div class="col-md-8 col-sm-8 col-xs-12">
        <div class="job-alerts-item candidates">
        <h3 class="alerts-title">Contact List</h3>
        <div class="alerts-list">
            
                
            
        <div class="row">
        <div class="col-md-3"> 
        <p>Name</p>
        </div>
        <div class="col-md-3">
        <p>Phone</p>
        </div>
        {{-- <div class="col-md-3"> 
            <p>Name</p>
            </div> --}}
        <div class="col-md-6">
        <p>Action</p>
        </div>
        </div>
        </div>
        @foreach ($clientlist as $item)
        <div class="alerts-content">
        <div class="row">
        <div class="col-md-3">
        <h3>{{$item->name}}</h3>
        <span class="location"><i class="ti-location-pin"></i> @foreach ($location->where('id','=',$item->city) as $city)
            {{$city->name}}
        @endforeach</span>
        </div>
        
        <div class="col-md-3">
            <h3>{{$item->phone}}</h3>
            <span class="location"><i class="ti-email"></i> {{$item->email}}</span>
        </div>
        {{-- <div class="col-md-3">
            <h3>{{$item->email}}</h3>
            
        </div> --}}
        
        <div class="col-md-3">
            {{-- <a href="{{route('delete.contact',$item->id)}}"><span class="full-time">Remove</span></a> --}}
            <form id="delete-form-{{$item->id}}" action=" {{route('delete.contact', $item->id)}} " method="POST" style="display: none">
                @csrf
                @method('DELETE')
             </form>
             <a href="" onclick=
                "if(confirm('Are you sure, you want to delete this Address?'))
                {
                event.preventDefault();
                document.getElementById('delete-form-{{$item->id}}').submit();
                }
                else{
                event.preventDefault();
                }">
                <i class="ni ni-basket text-danger"><span class="full-time">Remove</span></i>
             </a>
            
        </div>
        <div class="col-md-3">
            <a href="{{route('clientdetail',$item->id)}}"><span class="full-time">View Detail</span></a>
            
        </div>
        </div>
        </div>
        @endforeach
        

        <br>
        <ul class="pagination">
            
            {{$clientlist->links("pagination::bootstrap-4")}}
            </ul>
        
        </div>
        </div>

        
    </div>
    </div>
    </div>
	  


    
@include('frontend.includes.scriptf')

@include('frontend.includes.footer')