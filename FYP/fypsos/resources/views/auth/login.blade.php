



 



@include('frontend.includes.head')
@include('frontend.includes.nav')

<div class="page-header" style="background: url(frontasset/assets/img/banner1.jpg);">
    <div class="container">
    <div class="row">
    <div class="col-md-12">
    <div class="breadcrumb-wrapper">
    <h2 class="product-title">LOGIN</h2>
    <ol class="breadcrumb">
    <li><a href="/"><i class="ti-home"></i> Home</a></li>
    <li class="current">LOGIN</li>
    </ol>
    </div>
    </div>
    </div>
    </div>
    </div>
    
    <div id="content" class="my-account">
    <div class="container">
    <div class="row">
    <div class="col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-6 cd-user-modal">
    <div class="my-account-form">
    {{-- <ul class="cd-switcher">
    <li><a class="selected" href="#0">Worker Register</a></li>
    <li><a href="#0">Client Register</a></li>
    </ul> --}}
    
    <div id="cd-login" class="is-selected">
    <div class="page-login-form">
        <form role="form" action="{{route('login')}}" method="POST" class="login-form">
            {{ csrf_field() }}
            <div class="form-group">
            <label class="control-label" >Email</label>

            <div class="input-icon">
            <i class="ti-email"></i>
            <input type="text" id="sender-email" class="form-control" name="email" placeholder="Email">
            @if ($errors->has('email'))
            <span class="text-danger">{{ $errors->first('email') }}</span>
            @endif
            </div>
            </div>
            <div class="form-group">
            <label class="control-label" >Password</label>

            <div class="input-icon">
            <i class="ti-lock"></i>
            <input type="password" id="password" name="password" class="form-control" placeholder="Password">
            @if ($errors->has('password'))
            <span class="text-danger">{{ $errors->first('password') }}</span>
            @endif
            </div>
            </div>
            <button class="btn btn-common log-btn" id="btnSubmit">Login</button>
            </form>
    </div>
    </div>
    
    
     
    </div>
    </div>
    </div>
    </div>
    </div>
    
       
       
      

@include('frontend.includes.footer')
@include('frontend.includes.scriptf')