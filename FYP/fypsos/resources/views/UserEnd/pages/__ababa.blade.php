
@include('frontend.includes.head')
@include('frontend.includes.nav')

<link rel="stylesheet" type="text/css" href="{{asset('frontasset/tab/css/opensans-font.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('frontasset/tab/css/montserrat-font.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('frontasset/tab/fonts/material-design-iconic-font/css/material-design-iconic-font.min.css')}}">
<!-- Main Style Css -->
<link rel="stylesheet" href="{{asset('frontasset/tab/css/style.css')}}"/>

{{-- <div class="page-header" style="background: url(frontasset/assets/img/banner1.jpg);">
    <div class="container">
    <div class="row">
    <div class="col-md-12">
    <div class="breadcrumb-wrapper">
    <h2 class="product-title">My Profile</h2>
    <ol class="breadcrumb">
    <li><a href="#"><i class="ti-home"></i> Home</a></li>
    <li class="current">Job Alerts</li>
    </ol>
    </div>
    </div>
    </div>
    </div>
    </div> --}}
    
    {{-- <div class="page-content"> --}}
		<!-- <div class="wizard-heading">FORM WIZARD</div> -->
		<div class="wizard-v7-content">
			<div class="wizard-form">
		        <div class="form-register">
		        	<div id="form-total">
		        		<!-- SECTION 1 -->
			            <h2>
			            	<p class="step-icon"><span>1</span></p>
			            	<div class="step-text">
			            		<span class="step-inner-1">My Profile</span>
			            		<span class="step-inner-2" style="text-transform: capitalize;">{{Auth::user()->name}}</span>
			            	</div>
			            </h2>
			            <section>
			                <div class="inner">
			                	<div class="wizard-header">
									<h3 class="heading">Profile Detail</h3>
								</div>
								<div class="form-row col-md-3">
									<div class="form-holder form-holder-2">
										<label for="your_email">Email Address</label>
										<input type="email" name="your_email" id="your_email" class="form-control" pattern="[^@]+@[^@]+.[a-zA-Z]{2,6}" placeholder="Your Email" required>
									</div>
								</div>
								<div class="form-row col-md-3">
									<div class="form-holder form-holder-2">
										<label for="password">Password</label>
										<input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
									</div>
								</div>
								<div class="form-row">
									<div class="form-holder form-holder-2">
										<label for="confirm_password">Confirm Password</label>
										<input type="password" name="confirm_password" id="confirm_password" class="form-control" placeholder="Password" required>
									</div>
								</div>
							</div>
			            </section>
						<!-- SECTION 2 -->
			            <h2>
			            	<p class="step-icon"><span>2</span></p>
			            	<div class="step-text">
			            		<span class="step-inner-1">Update Profile</span>
			            		<span class="step-inner-2">Details</span>
			            	</div>
			            </h2>
			            <section>
                            <form class="form" action="{{route('update.profile',$user->id)}}" method="POST" enctype="multipart/form-data">
                                {{ csrf_field() }}
			                <div class="inner">
			                	<div class="wizard-header">
									<h3 class="heading">Update Information</h3>
								</div>
								<div class="form-row">
									<div class="form-holder form-holder-2">
										<label for="card_name">Name</label>
										<input type="text" name="name" id="name" value="{{$user->name}}" placeholder="Taylor Fuller" class="form-control" required>
									</div>
								</div>
								<div class="form-row">
									<div class="form-holder form-holder-2">
										<label for="card_number">Email</label>
										<input type="email" name="email" id="email" value="{{$user->email}}" class="form-control" required>
									</div>
								</div>
								<div class="form-row">
									<div class="form-holder form-holder-2">
										<label for="cvc">Image</label>
										<input type="file" name="image" id="image" class="form-control" required>
									</div>
								</div>
								<div class="form-row">
									<div class="form-holder form-holder-2">
										<label for="description">Description</label>
										<input type="text" name="description" id="description" placeholder="Short description" class="form-control" required>
									</div>
								</div>
                                <div class="form-row">
									{{-- <div class="form-holder form-holder-2"> --}}
										{{-- <label for="description">Description</label> --}}
										<button class="btn btn-common" type="submit" id="btnSubmit">Update</button>
									{{-- </div> --}}
								</div>
							</div>
                            </form>
			            </section>
			            <!-- SECTION 3 -->
			            <h2>
			            	<p class="step-icon"><span>3</span></p>
			            	<div class="step-text">
			            		<span class="step-inner-1">Agreement</span>
			            		<span class="step-inner-2">Our site policy</span>
			            	</div>
			            </h2>
			            <section>
			                <div class="inner">
			                	<div class="wizard-header">
									<h3 class="heading">Agreement</h3>
								</div>
								<div class="form-row">
			                		<div class="form-holder form-holder-2">
			                			<div class="content-inner">
			                				<p>Massa placerat duis ultricies lacus sed turpis tin Elementum sagittis vitae et leo duis ut diam quam nulla. Viverra mauris in aliquam sem fringilla ut. Id leo in vitae turpis massa sed elementum tempus. Aliquet enim tortor at auctor urna nunc id cursus. Nulla aliquet enim tortor at auctor .Consquat nisl vel pretium lectus quam id leo.</p>
			                				<div class="form-checkbox">
												<label class="container">
													<p>I read agreement and i have not any objection.</p>
												  	<input type="checkbox" name="checkbox">
												  	<span class="checkmark"></span>
												</label>
											</div>
			                			</div>
			                		</div>
			                	</div>
							</div>
			            </section>
		        	</div>
		        </div>
			</div>
		</div>
	{{-- </div>	 --}}
	   
	   
    <script src="{{asset('frontasset/tab/js/jquery-3.3.1.min.js')}}"></script>
	<script src="{{asset('frontasset/tab/js/jquery.steps.js')}}"></script>
	<script src="{{asset('frontasset/tab/js/main.js')}}"></script>

@include('frontend.includes.footer')