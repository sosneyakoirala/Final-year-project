

<!DOCTYPE html>
<html lang="en">
   <head>
      @include('frontend.includes.head')
   </head>
   <body>
      <div class="header">
         <section id="intro" class="section-intro">
            @include('frontend.includes.nav')
            <div class="search-container">
               <div class="container">
                  <div class="row">
                     <div class="col-md-12">
                        <h1>Find the worker</h1>
                        <br>
                        <h2>More than <strong>{{ \App\Models\User::all()->where('role','worker')->count() }}</strong> Workers are waiting for solving your problems!</h2>
                        <div class="content">
                           <form method="POST" action="{{route('worker.search')}}">
                              {{csrf_field()}}
                              <div class="row">
                                 <div class="col-md-2"></div>

                                 <div class="col-md-6 col-sm-6">
                                    <div class="form-group">
                                       <input class="form-control" name="profession" type="text" placeholder="Worker Type">
                                       <i class="ti-time"></i>
                                    </div>
                                 </div>
                                 
                                 <div class="col-md-2 col-sm-6">
                                    <button type="submit" class="btn btn-search-icon"><i class="ti-search"></i></button>
                                 </div>
                              </div>
                           </form>
                        </div>
                        <div class="popular-jobs">
                           <b>Popular Profession: </b>
                           @foreach ($profession as $item)
                           <a href="{{route('byprofession',$item->profession)}}">{{$item->profession}}</a>
                           @endforeach
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </section>
      </div>
      <div class="about section">
         <div class="container">
            <div class="row">
               <div class="col-md-6 col-sm-12">
                  <img src="{{asset('frontasset/assets/img/about/img1.jpg')}}" alt="">
               </div>
               <div class="col-md-6 col-sm-12">
                  <div class="about-content">
                     <h2 class="medium-title">About Job Career</h2>
                     <p class="desc">Consectuture adipiscing elit sed diam nonummy nibh euismod tincidunt laoreet dolore magna aliquam erat volutpat utwisi veniam.</p>
                     <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est modi, saepe hic esse maxime quasi, sapiente ex debitis quis dolorum unde, neque quibusdam eveniet nobis enim porro repudiandae nesciunt quidem.</p>
                     <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magni delectus soluta adipisci beatae ullam quisquam, quia recusandae rem assumenda, praesentium porro sequi eaque doloremque tenetur incidunt officiis explicabo optio perferendis.</p>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <section class="category section">
         <div class="container">
            <h2 class="section-title">Browse Professions</h2>
            <div class="row">
               <div class="col-md-12">
                  @foreach ($profession as $item)
                  <div class="col-md-3 col-sm-3 col-xs-12 f-category">
                     <a href="{{route('byprofession',$item->profession)}}">
                        <div class="icon">
                           <i class="ti-home"></i>
                        </div>
                        <h3>{{$item->profession}}</h3>
                        <p>{{$item->total}} Workers</p>
                     </a>
                  </div>
                  @endforeach
               </div>
            </div>
         </div>
      </section>
      <section class="featured-jobs section">
         <div class="container">
            <h2 class="section-title">
               Featured Locations
            </h2>
            <div class="row">
               @foreach ($location as $item)
               <div class="col-md-4 col-sm-6 col-xs-12">
                  <div class="featured-item">
                     <div class="featured-wrap">
                        <div class="featured-inner">
                           {{-- 
                           <figure class="item-thumb">
                              <a class="hover-effect" href="job-page.html">
                              <img src="{{asset('frontasset/assets/img/features/img-1.jpg')}}" alt="">
                              </a>
                           </figure>
                           --}}
                           <div class="item-body">
                              <h1><i class="ti-location-pin"></i></h1>
                              <h2 class="job-title"><a href="{{route('bylocation',$item->id)}}">{{$item->name}}</a></h2>
                           </div>
                        </div>
                     </div>
                     <div class="item-foot">
                        <span>
                           <h3><i class="ti-map-alt"></i> {{$item->total}}</h3>
                        </span>
                        {{-- <span><i class="ti-time"></i> Part Time</span> --}}
                        <div class="view-iocn">
                           <a href="{{route('bylocation',$item->id)}}"><i class="ti-arrow-right"></i></a>
                        </div>
                     </div>
                  </div>
               </div>
               @endforeach
            </div>
         </div>
      </section>
      <a href="#" onclick="event.preventDefault();
         document.getElementById('back-to-top').submit();" class="back-to-top">
      <i class="ti-arrow-up"></i>
      </a>
      @include('frontend.includes.scriptf')
      @include('frontend.includes.footer')
   </body>
</html>

