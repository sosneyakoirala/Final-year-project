

@include('frontend.includes.head')
@include('frontend.includes.nav')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<div class="page-header" style="background: url(frontasset/assets/img/banner1.jpg);">
   <div class="container">
      <div class="row">
         <div class="col-md-12">
            <div class="breadcrumb-wrapper">
               <h2 class="product-title">Create Account</h2>
               <ol class="breadcrumb">
                  <li><a href="/"><i class="ti-home"></i> Home</a></li>
                  <li class="current">Create Account</li>
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
               <ul class="cd-switcher">
                  <li><a class="selected" href="#0">Worker Register</a></li>
                  <li><a href="#0">Client Register</a></li>
               </ul>
               <div id="cd-login" class="is-selected">
                  <div class="page-login-form">
                     <form role="form" action="{{ route('wregister') }}" method="POST" class="login-form">
                        {{ csrf_field() }}
                        <div class="form-group">
                           <label class="control-label" for="country">User Name:</label>
                           <div class="input-icon">
                              <i class="ti-user"></i>
                              <input type="hidden" value="worker" name="role">
                              <input type="hidden" value="26.66283883" name="lat">
                              <input type="hidden" value="87.27446795" name="lon">
                              <input type="text" id="sender-email" class="form-control" name="name" placeholder="Username">
                              @error('name')
                              <span class="invalid-feedback" role="alert">
                              <strong class="text-danger">{{ $message }}</strong>
                              </span>
                              @enderror
                           </div>
                        </div>
                        <div class="form-group">
                           <label class="control-label" for="country">Email:</label>
                           <div class="input-icon">
                              <i class="ti-email"></i>
                              <input type="text" id="sender-email" class="form-control" name="email" placeholder="Email">
                              @error('email')
                              <span class="invalid-feedback" role="alert">
                              <strong class="text-danger">{{ $message }}</strong>
                              </span>
                              @enderror
                           </div>
                        </div>
                        <div class=" form-group">
                           <label class="control-label" >Profession</label>
                           <select class="wide form-control " name="profession">
                              <option>Select Profession</option>
                              <option value="Plumber">Plumber</option>
                              <option value="Painter">Painter</option>
                              <option value="Barber">Barber</option>
                              <option value="Cooksmen">Cookmen</option>
                              <option value="Washer">Washer</option>
                              <option value="Beautician">Beautician</option>
                              <option value="Carpenter">Carpenter</option>
                           </select>
                           @error('profession')
                           <span class="invalid-feedback" role="alert" >
                           <strong class="text-danger">{{ $message }}</strong>
                           </span>
                           @enderror
                        </div>
                        <div class="form-group">
                           <label class="control-label" for="country">Country:</label>
                           <select id="country" name="country" class="form-control">
                              <option value="" selected disabled>Select Country</option>
                              @foreach ($states as $key => $country)
                              <option value="{{ $key }}"> {{ $country }}</option>
                              @endforeach
                           </select>
                           @error('country')
                           <span class="invalid-feedback" role="alert">
                           <strong class="text-danger">{{ $message }}</strong>
                           </span>
                           @enderror
                        </div>
                        <div class="form-group">
                           <label class="control-label" for="state">State:</label>
                           <select name="state" id="state" class="form-control"></select>
                        </div>
                        @error('state')
                        <span class="invalid-feedback" role="alert">
                        <strong class="text-danger">{{ $message }}</strong>
                        </span>
                        @enderror
                        <div class="form-group is-empty">
                           <label class="control-label" class="control-label" >City</label>
                           <select class="wide form-control " name="city" id="city" >
                           </select>
                           @error('city')
                           <span class="invalid-feedback" role="alert">
                           <strong class="text-danger">{{ $message }}</strong>
                           </span>
                           @enderror
                           <span class="material-input"></span>
                        </div>
                        <div class="form-group">
                           <label class="control-label" for="country">Password:</label>
                           <div class="input-icon">
                              <i class="ti-lock"></i>
                              <input type="password" id="password" name="password" class="form-control" placeholder="Password">
                              @error('password')
                              <span class="invalid-feedback" role="alert">
                              <strong class="text-danger">{{ $message }}</strong>
                              </span>
                              @enderror
                           </div>
                        </div>
                        <div class="form-group">
                           <label class="control-label" for="country">Conform Password:</label>
                           <div class="input-icon">
                              <i class="ti-lock"></i>
                              <input type="password" id="password" class="form-control" placeholder="Repeat Password">
                           </div>
                        </div>
                        <button class="btn btn-common log-btn" type="submit" id="btnSubmit">Register</button>
                     </form>
                  </div>
               </div>
               <div id="cd-signup">
                  <div class="page-login-form register">
                     <form role="form" action="{{ route('cregister') }}" method="post" class="login-form">
                        {{ csrf_field() }}
                        <div class="form-group">
                           <label class="control-label" >User Name</label>
                           <div class="input-icon">
                              <i class="ti-user"></i>
                              <input type="hidden" value="client" name="role">
                              <input type="hidden" value="26.66283883" name="lat">
                              <input type="hidden" value="87.27446795" name="lon">
                              <input type="text" id="sender-email" class="form-control" name="name" placeholder="Username">
                              @error('name')
                              <span class="invalid-feedback" role="alert">
                              <strong class="text-danger">{{ $message }}</strong>
                              </span>
                              @enderror
                           </div>
                        </div>
                        <div class="form-group">
                           <label class="control-label" >Email</label>
                           <div class="input-icon">
                              <i class="ti-email"></i>
                              <input type="email" id="sender-email" class="form-control" name="email" placeholder="Email">
                              @error('email')
                              <span class="invalid-feedback" role="alert">
                              <strong class="text-danger">{{ $message }}</strong>
                              </span>
                              @enderror
                           </div>
                        </div>
                        <div class="form-group">
                           <label class="control-label" >Phone</label>
                           <div class="input-icon">
                              <i class="ti-email"></i>
                              <input type="text" id="sender-phone" class="form-control" name="phone" placeholder="Phone No.">
                              @error('phone')
                              <span class="invalid-feedback" role="alert">
                              <strong class="text-danger">{{ $message }}</strong>
                              </span>
                              @enderror
                           </div>
                        </div>
                        <div class="form-group">
                           <label class="control-label" >Password</label>
                           <div class="input-icon">
                              <i class="ti-lock"></i>
                              <input type="password" id="password2" name="password" class="form-control" placeholder="Password">
                              @error('password')
                              <span class="invalid-feedback" role="alert">
                              <strong class="text-danger">{{ $message }}</strong>
                              </span>
                              @enderror
                           </div>
                        </div>
                        <div class="form-group">
                           <label class="control-label" >Conform Password</label>
                           <div class="input-icon">
                              <i class="ti-lock"></i>
                              <input type="password" id="password2" class="form-control" placeholder="Repeat Password">
                           </div>
                        </div>
                        <button class="btn btn-common log-btn" type="submit" id="btnSubmit2">Register</button>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
{{-- <script>
   // when country dropdown changes
   $('#country').change(function() {
   
       var countryID = $(this).val();
   
       if (countryID) {
   
           $.ajax({
               type: "GET",
               url: "{{ url('getState') }}?country_id=" + countryID,
               success: function(res) {
   
                   if (res) {
   
                       $("#state").empty();
                       $("#state").append('<option>Select State</option>');
                       $.each(res, function(key, value) {
                           $("#state").append('<option value="' + key + '">' + value +
                               '</option>');
                       });
   
                   } else {
   
                       $("#state").empty();
                   }
               }
           });
       } else {
   
           $("#state").empty();
           $("#city").empty();
       }
   });
   
   // when state dropdown changes
   $('#state').on('change', function() {
   
       var stateID = $(this).val();
   
       if (stateID) {
   
           $.ajax({
               type: "GET",
               url: "{{ url('getCity') }}?state_id=" + stateID,
               success: function(res) {
   
                   if (res) {
                       $("#city").empty();
                       $("#city").append('<option>Select City</option>');
                       $.each(res, function(key, value) {
                           $("#city").append('<option value="' + key + '">' + value +
                               '</option>');
                       });
   
                   } else {
   
                       $("#city").empty();
                   }
               }
           });
       } else {
   
           $("#city").empty();
       }
   });
   
</script> --}}
@include('frontend.includes.scriptf')
@include('frontend.includes.footer')

