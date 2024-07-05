
@include('frontend.includes.head')

@include('frontend.includes.nav')


    
    
    <div id="content">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
           @include('AdminEnd.pages.notification')
        </div>
    </div>
    <div class="row">
    <div class="col-md-4 col-sm-4 col-xs-12">
    <div class="right-sideabr">
    <div class="inner-box">
    <h4>Manage Profile</h4>
    <ul class="lest item">
      <li><a class="active" href="{{route('client.profile',Auth::user()->id)}}">My Profile</a></li>
      <li><a href="{{route('client.location',Auth::user()->id)}}">Update Location</a></li>
      <li><a href="{{route('contactlist')}}">Contact List</a></li>
      <li><a href="/user/logout">Sign Out</a></li>
    </ul>
    </div>
    </div>
    </div>
    <div class="col-md-8 col-sm-8 col-xs-12">
    <div class="job-alerts-item">
    <h3 class="alerts-title" style="text-transform: capitalize;">My Detail</h3>
    <div class="alerts-list">
    <div class="row">
    <div class="col-md-3">
    <p>Name</p>
    </div>
    <div class="col-md-3">
    <p>Phone</p>
    </div>
    <div class="col-md-3">
    <p>Location</p>
    </div>
    <div class="col-md-3">
    <p>Email</p>
    </div>
    </div>
    </div>
    <div class="alerts-content">
    <div class="row">
    <div class="col-md-3">
    <h3>{{Auth::user()->name}}</h3>
    </div>
    <div class="col-md-3">
    <p>{{Auth::user()->phone}}</p>
    </div>
    <div class="col-md-3">
    <p><span >
       @foreach ($countries->where('id','=',Auth::user()->country) as $country)
      {{$country->name}}
  @endforeach
  @foreach ($states->where('id','=',Auth::user()->state) as $state)
      {{$state->name}}
  @endforeach
      @foreach ($cities->where('id','=',Auth::user()->city) as $city)
      {{$city->name}}
  @endforeach  
    </span></p>
    </div>
    <div class="col-md-3">
    <p>{{Auth::user()->email}}</p>
    </div>
    </div>
    </div>
  

    <input type="hidden" name="lat" class="form-control" id="lat" size=12 value="{{Auth::user()->lat}}">
    {{-- {{Auth::user()->latitude}} --}}
    <input type="hidden" name="lon" class="form-control" id="lon" size=12 value="{{Auth::user()->lon}}">
    <div class="alerts-content">
        <h3>Location</h3>
        <div id="map"></div>
    </div>
    
    </div>
    </div>
    </div>
    </div>
    </div>	

	  
    <script type="text/javascript">

      // New York
      var startlat = {{Auth::user()->lat}};
      // {{Auth::user()->latitude}}
      var startlon = {{Auth::user()->lon}};
      // {{Auth::user()->longitude}}
      
      var options = {
       center: [startlat, startlon],
       zoom: 9
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


    @include('frontend.includes.scriptf')
    @include('frontend.includes.footer')
 