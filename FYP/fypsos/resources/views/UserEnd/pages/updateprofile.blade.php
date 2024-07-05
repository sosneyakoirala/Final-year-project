
@include('frontend.includes.head')
@include('frontend.includes.nav')


    
    
    <div id="content">
    <div class="container">
        
    <div class="row">
    <div class="col-md-4 col-sm-4 col-xs-12">
    <div class="right-sideabr">
    <div class="inner-box">
    <h4>Manage Profile</h4>
    <ul class="lest item">
        <li><a href="{{route('user.profile',Auth::user()->id)}}">My Profile</a></li>
        <li><a class="active" href="{{url('profile-update',Auth::user()->id)}}">Update Profile</a></li>
        <li><a href="{{route('user.location',Auth::user()->id)}}">Update Location</a></li>
    <li><a href="{{route('contactlist')}}">Contact List</a></li>
    <li><a href="{{route('clientlist')}}">Client List</a></li>
    <li><a href="/user/logout">Sign Out</a></li>
    </ul>
    </div>
    </div>
    </div>
    <div class="col-md-8 col-sm-8 col-xs-12">
        <div class="job-alerts-item">
        <h3 class="alerts-title">Update Profile</h3>
        <form class="form" role="form" action="{{route('update.profile',$user->id)}}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            {{-- @method('PUT') --}}
            {{-- @method('PUT') --}}
        <div class="form-group ">
        <label class="control-label" >Name</label>
            <input class="form-control" type="text" name="name" value="{{$user->name}}">
        <span class="material-input"></span>
        </div>
        <div class="form-group ">
        <label class="control-label" >Email</label>
         <input class="form-control" type="email" name="email" value="{{$user->email}}">
        <span class="material-input"></span>
        </div>
        <div class="form-group ">
            <label class="control-label" >Phone</label>
             <input class="form-control" type="text" name="phone" value="{{$user->phone}}">
             @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong class="text-danger">{{ $message }}</strong>
                                    </span>
                                @enderror
            <span class="material-input"></span>
            </div>
            <div class="form-group ">
                <label class="control-label" >Date Of Birth</label>
                 <input class="form-control" type="date" name="dob" value="{{$user->dob}}">
                 @error('dob')
                                    <span class="invalid-feedback" role="alert">
                                        <strong class="text-danger">{{ $message }}</strong>
                                    </span>
                                @enderror
                <span class="material-input"></span>
                </div>
        <div class="form-group">
            <label class="control-label" >Description</label>
            <textarea class="form-control"  name="description"  rows="7">{{$user->description}}</textarea>
            @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong class="text-danger">{{ $message }}</strong>
                                    </span>
                                @enderror
            </div>
        
            <button class="btn btn-common" type="submit" >Update</button>
        </form>
        </div>
        </div>
        </div>
        </div>
        </div>
	   
	   
        <script>
            function previewFile(input){
                var file=$("input[type=file]").get(0).files[0];
                if(file)
                {
                    var reader = new FileReader();
                    reader.onload = function(){
                        $('#previewImg').attr("src",reader.result);
                    }
                    reader.readAsDataURL(file);
                }
            }
          </script>

<script type="text/javascript" src="assets/js/summernote.js"></script>
@include('frontend.includes.scriptf')

@include('frontend.includes.footer')