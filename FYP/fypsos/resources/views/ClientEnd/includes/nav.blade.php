<div class="logo-menu">
    <nav class="navbar navbar-default" role="navigation" data-spy="affix" data-offset-top="50">
    <div class="container">
    
    <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar">
    <span class="sr-only">Toggle navigation</span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand logo" href="/"><img src="frontasset/assets/img/logo.png" alt=""></a>
    </div>
    <div class="collapse navbar-collapse" id="navbar">
    
    <ul class="nav navbar-nav">
    <li><a class="active" href="/">Home </a></li>
    <li><a href="#">About US </a></li>
    <li><a href="#">Categories </a></li>
    <li><a href="#">Workers</a></li>
    @guest
    @if (Route::has('login'))
    <li><a href="{{ route('login') }}">Login </a></li>
    @endif
    @if (Route::has('register'))
    <li><a href="{{ route('register') }}">Register </a></li>
    @endif
    @else
    <li>
    <a href="blog.html">
        {{ Auth::user()->name }} <i class="fa fa-angle-down"></i>
    </a>
    <ul class="dropdown">
    <li><a href="{{route('client.profile',Auth::user()->id)}}">My Profile</a></li>
    <li><a href="{{ route('user.logout') }}">Logout</a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form>
    </li>
    </ul>
    </li>
    @endguest
    </ul>
    <ul class="nav navbar-nav navbar-right float-right">
    <li class="left"><a href="post-job.html"><i class="ti-pencil-alt"></i> Post A Job</a></li>
    <li class="right"><a href="my-account.html"><i class="ti-lock"></i> Log In</a></li>
    </ul>
    </div>
    </div>
    
    <ul class="wpb-mobile-menu">
    <li>
    <a class="active" href="index.html">Home</a>
    </li>
    <li>
    <a href="about.html">About US</a>
    </li>
    <li>
    <a href="#">Categories</a>
    </li>
    <li>
    <a href="#">Worker</a>
    </li>
    
    <li class="btn-m"><a href="post-job.html"><i class="ti-pencil-alt"></i> Post A Job</a></li>
    <li class="btn-m"><a href="my-account.html"><i class="ti-lock"></i> Log In</a></li>
    </ul>
    
    </nav>
    
    </div>