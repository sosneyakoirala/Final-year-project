
    @include('frontend.includes.head')

    @include('frontend.includes.nav')
    <style>
       #map { width:100%;height:50%;padding:0;margin:0; }
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.1/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.3.1/dist/leaflet.js"></script>
    <body>
       <div id="content">
          <div class="container">
             <div class="row">
                <div class="col-md-4 col-sm-4 col-xs-12">
                   <div class="right-sideabr">
                      <div class="inner-box">
                         <h4>Worker Location</h4>
                         <input type="hidden" name="lat" class="form-control" id="lat" size=12 value="{{$worker->lat}}">
                         {{-- {{Auth::user()->latitude}} --}}
                         <input type="hidden" name="lon" class="form-control" id="lon" size=12 value="{{$worker->lon}}">
                         {{-- 
                         <ul class="lest item">
                            <li><a href="{{route('user.profile',$user->id)}}">My Profile</a></li>
                            <li><a href="{{url('profile-update',Auth::user()->id)}}">Update Profile</a></li>
                            <li><a class="active" href="{{route('user.location',$user->id)}}">Update Location</a></li>
                            <li><a href="bookmarked.html">Sign Out</a></li>
                         </ul>
                         --}}
                         <div id="map"></div>
                      </div>
                   </div>
                </div>
                <div class="col-md-8 col-sm-8 col-xs-12">
                   <div class="job-alerts-item">
                      <h3 class="alerts-title">Worker Detail</h3>
                      <div class="alerts-list">
                         <div class="row">
                            <div class="col-md-12">
                               <img src="{{asset('uploads/userprofiles/')}}/{{$worker->image}}" id="previewImg"   style="border-radius: 50%; width:155px; height:155px;">
                            </div>
                         </div>
                         <div class="row mt-2">
                            <div class="col-md-3">
                               <p>Name</p>
                               {{-- 
                               <div id="map"></div>
                               --}}
                            </div>
                            <div class="col-md-3">
                               <p>Phone</p>
                            </div>
                            <div class="col-md-3">
                               <p>Profession</p>
                            </div>
                            <div class="col-md-3">
                               <p>Email</p>
                            </div>
                         </div>
                      </div>
                      <div class="alerts-content">
                         <div class="row">
                            <div class="col-md-3">
                               <h3>{{$worker->name}}</h3>
                               <span class="location"><i class="ti-location-pin"></i>
                               @foreach ($countries->where('id','=',$worker->country) as $country)
                               {{$country->name}}
                               @endforeach
                               @foreach ($states->where('id','=',$worker->state) as $state)
                               {{$state->name}}
                               @endforeach
                               @foreach ($cities->where('id','=',$worker->city) as $city)
                               {{$city->name}}
                               {{-- <a href="{{route('bylocation',$city->name)}}">Link</a> --}}
                               @endforeach
                               {{-- @if($worker->city == $cities->id)
                               {{$cities->name}}
                               @endif --}}
                               </span>
                            </div>
                            <div class="col-md-3">
                               <p>{{$worker->phone}}</p>
                            </div>
                            <div class="col-md-3">
                               <p><span class="full-time">{{$worker->profession}}</span></p>
                            </div>
                            <div class="col-md-3">
                               <p>{{$worker->email}}</p>
                            </div>
                         </div>
                      </div>
                      <div class="alerts-content">
                         <form action="{{route('rating.store')}}" method="POST">
                            {{csrf_field()}}
                            <div class="row">
                               <div class="col-md-6">
                                  <input type="hidden" name="worker_id" value="{{$worker->id}}" >
                                  <div class="rating m-auto">
                                     <!--elements are in reversed order, to allow "previous sibling selectors" in CSS-->
                                     <input type="radio" name="score" value="5" id="1"><label for="1">☆</label>
                                     <input type="radio" name="score" value="4" id="2"><label for="2">☆</label>
                                     <input type="radio" name="score" value="3" id="3"><label for="3">☆</label>
                                     <input type="radio" name="score" value="2" id="4"><label for="4">☆</label>
                                     <input type="radio" name="score" value="1" id="5"><label for="5">☆</label>
                                  </div>
                               </div>
                               <div class="col-md-3">
                                  <button type="submit" class="btn btn-common log-btn" id="btnSubmit">Rate</button>
                               </div>
                            </div>
                         </form>
                      </div>
                   </div>
                </div>
             </div>
          </div>
       </div>
       <script type="text/javascript">
          // New York
          var startlat = {{$worker->lat}};
          // {{Auth::user()->latitude}}
          var startlon = {{$worker->lon}};
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

