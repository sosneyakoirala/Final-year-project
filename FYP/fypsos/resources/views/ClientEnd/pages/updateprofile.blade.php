
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
        <li><a href="{{route('client.profile',Auth::user()->id)}}">My Profile</a></li>
        <li><a class="active" href="{{route('client.location',Auth::user()->id)}}">Update Location</a></li>
        <li><a href="{{route('contactlist')}}">Contact List</a></li>
    <li><a href="/user/logout">Sign Out</a></li>
    </ul>
    </div>
    </div>
    </div>
    <div class="col-md-8 col-sm-8 col-xs-12">
    <div class="job-alerts-item">
    <h3 class="alerts-title">My Details</h3>
    <form class="form" action="{{route('update.clientprofile',Auth::user()->id)}}" method="POST">
        {{ csrf_field() }}
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
    
        <div class="form-group">
            <label for="country">Country:</label>
            <select id="country" name="country" class="form-control">
                <option value="" selected disabled>Select Country</option>
                @foreach ($states as $key => $country)
                    <option value="{{ $key }}"> {{ $country }}</option>
                @endforeach
            </select>
        </div>
                <div class="form-group">
                    <label for="state">State:</label>
                    <select name="state" id="state" class="form-control"></select>
                </div>
                <div class="form-group is-empty">
                    <label class="control-label" >City</label>
                    <select class="wide form-control " name="city" id="city" >
                         </select>
                    <span class="material-input"></span>
                    </div>
    <div class="form-group is-empty">
    {{-- <label class="control-label" for="textarea">New Password*</label> --}}
    <input type="hidden" name="lat" class="form-control" id="lat" size=12 value="{{$user->lat}}">
    {{-- {{Auth::user()->latitude}} --}}
    <input type="hidden" name="lon" class="form-control" id="lon" size=12 value="{{$user->lon}}">
    {{-- {{Auth::user()->longitude}} --}}
    <span class="material-input"></span>
    </div>
    <div class="form-group is-empty">
        <b>Address Lookup</b>
        <div id="search">
        <input type="text"   class="form-control" value="" id="addr" size="58" />
        <button type="button" class="btn btn-common" onclick="addr_search();">Search</button>
        <div id="results"></div>
        </div>

        <br />

        <div id="map"></div>
        <span class="material-input"></span>
        </div>

    <button type="submit" class="btn btn-common">Save Change</button>
    </form>

    
    </div>
    </div>
    </div>
    </div>
    </div>
	  


    <script type="text/javascript">

        // New York
        var startlat = {{$user->lat}};
        // {{Auth::user()->latitude}}
        var startlon = {{$user->lon}};
        // {{Auth::user()->longitude}}
        
        var options = {
         center: [startlat, startlon],
         zoom: 20
        }
        
        document.getElementById('lat').value = startlat;
        document.getElementById('lon').value = startlon;
        
        var map = L.map('map', options);
        var nzoom = 12;
        
        L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {attribution: 'OSM'}).addTo(map);
        
        var myMarker = L.marker([startlat, startlon], {title: "Coordinates", alt: "Coordinates", draggable: true}).addTo(map).on('dragend', function() {
         var lat = myMarker.getLatLng().lat.toFixed(8);
         var lon = myMarker.getLatLng().lng.toFixed(8);
         var czoom = map.getZoom();
         if(czoom < 18) { nzoom = czoom + 2; }
         if(nzoom > 18) { nzoom = 18; }
         if(czoom != 18) { map.setView([lat,lon], nzoom); } else { map.setView([lat,lon]); }
         document.getElementById('lat').value = lat;
         document.getElementById('lon').value = lon;
         myMarker.bindPopup("Lat " + lat + "<br />Lon " + lon).openPopup();
        });
        
        function chooseAddr(lat1, lng1)
        {
         myMarker.closePopup();
         map.setView([lat1, lng1],18);
         myMarker.setLatLng([lat1, lng1]);
         lat = lat1.toFixed(8);
         lon = lng1.toFixed(8);
         document.getElementById('lat').value = lat;
         document.getElementById('lon').value = lon;
         myMarker.bindPopup("Lat " + lat + "<br />Lon " + lon).openPopup();
        }
        
        function myFunction(arr)
        {
         var out = "<br />";
         var i;
        
         if(arr.length > 0)
         {
          for(i = 0; i < arr.length; i++)
          {
           out += "<div class='address' title='Show Location and Coordinates' onclick='chooseAddr(" + arr[i].lat + ", " + arr[i].lon + ");return false;'>" + arr[i].display_name + "</div>";
          }
          document.getElementById('results').innerHTML = out;
         }
         else
         {
          document.getElementById('results').innerHTML = "Sorry, no results...";
         }
        
        }
        
        function addr_search()
        {
         var inp = document.getElementById("addr");
         var xmlhttp = new XMLHttpRequest();
         var url = "https://nominatim.openstreetmap.org/search?format=json&limit=3&q=" + inp.value;
         xmlhttp.onreadystatechange = function()
         {
           if (this.readyState == 4 && this.status == 200)
           {
            var myArr = JSON.parse(this.responseText);
            myFunction(myArr);
           }
         };
         xmlhttp.open("GET", url, true);
         xmlhttp.send();
        }
        
        </script>


{{-- <script>
    $(document).ready(function(){
        $('.dynamic').change(function(){
            if($(this).val() != '')
            {
                var select=$(this).attr("id");
                var value=$(this).val();
                var dependent=$(this).data('dependent');
                var _token=$('input[name="_token"]').val();
                $.ajax({
                    url:"{{route('dependent.fetch',$user->id)}}",
                    method:"POST",
                    data:{select:select,value:value,_token:_token,dependent:dependent},
                    success:function(result){
                        $('#'+dependent).Innerhtml(result);
                    }
                })
            }
        })
    });
</script> --}}



<script>
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

</script>

@include('frontend.includes.scriptf')

@include('frontend.includes.footer')