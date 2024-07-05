

<!DOCTYPE html>
<html lang="en">
   <head>
      @include('frontend.includes.head')
   </head>
   <body>
      @include('frontend.includes.nav')
      <div class="page-header" style="background: url(frontasset/assets/img/banner1.jpg);">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="breadcrumb-wrapper">
                     <h2 class="product-title">Browse Categories</h2>
                     <ol class="breadcrumb">
                        <li><a href="/"><i class="ti-home"></i> Home</a></li>
                        <li class="current">Browse Categories</li>
                     </ol>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <section class="featured-jobs section">
         <div class="container">
            <h2 class="section-title">
               Featured Cities
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
      <section class="category section">
         <div class="container">
            <h2 class="section-title">Features Professions</h2>
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
      <a href="#" onclick="event.preventDefault();
         document.getElementById('back-to-top').submit();" class="back-to-top">
      <i class="ti-arrow-up"></i>
      </a>
      @include('frontend.includes.scriptf')
      @include('frontend.includes.footer')
   </body>
</html>

