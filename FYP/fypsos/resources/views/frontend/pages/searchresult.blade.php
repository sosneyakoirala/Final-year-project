

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
                     <h2 class="product-title">Browse Job</h2>
                     <ol class="breadcrumb">
                        <li><a href="#"><i class="ti-home"></i> Home</a></li>
                        <li class="current">Browse Job</li>
                     </ol>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <section class="job-browse section">
         <div class="container">
            <div class="row">
               <div class="col-md-9 col-sm-8">
                  @if(Auth::Check())
                  @foreach($worker as $w)
                  <div class="job-list">
                     <div class="thumb">
                        <a href=""><img src="{{asset('uploads/userprofiles/')}}/{{$w->image}}" alt="" style="width: 100px;height:auto;"></a>
                     </div>
                     <div class="job-list-content">
                        <h4><a href="">{{$w->name}}</a><span class="full-time">{{$w->profession}}</span></h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illum quaerat aut veniam molestiae atque dolorum omnis temporibus consequuntur saepe. Nemo atque consectetur saepe corporis odit in dicta reprehenderit, officiis, praesentium?</p>
                        <div class="job-tag">
                           <div class="pull-left">
                              <div class="meta-tag">
                                 <span><a href=""><i class="ti-headphone-alt"></i>{{$w->phone}}</a></span>
                                 <span><i class="ti-location-pin"></i>@foreach ($countries->where('id','=',$w->country) as $item)
                                 {{$item->name}}
                                 @endforeach
                                 @foreach ($states->where('id','=',$w->state) as $state)
                                 {{$state->name}}
                                 @endforeach
                                 @foreach ($cities->where('id','=',$w->city) as $city)
                                 {{$city->name}}
                                 @endforeach
                                 </span>
                                 {{-- <span><i class="ti-time"></i>60/Hour</span> --}}
                              </div>
                           </div>
                           <form action="{{route('addcontact')}}" method="POST">
                              {{csrf_field()}}
                              <div class="pull-right">
                                 <a href="{{route('workerdetail',$w->id)}}" type="submit" class="btn btn-common btn-rm">View Details</a>
                                 <input type="hidden" value="{{$w->id}}" name="worker_id">
                                 <button type="submit" class="btn btn-common btn-rm">Add To Contact</button>
                              </div>
                           </form>
                        </div>
                     </div>
                  </div>
                  @endforeach
                  @endauth
                  @guest
                  @foreach($worker2 as $w2)
                  <div class="job-list">
                     <div class="thumb">
                        <a href=""><img src="{{asset('uploads/userprofiles/')}}/{{$w2->image}}" alt="" style="width: 100px;height:auto;"></a>
                     </div>
                     <div class="job-list-content">
                        <h4><a href="">{{$w2->name}}</a><span class="full-time">{{$w2->profession}}</span></h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illum quaerat aut veniam molestiae atque dolorum omnis temporibus consequuntur saepe. Nemo atque consectetur saepe corporis odit in dicta reprehenderit, officiis, praesentium?</p>
                        <div class="job-tag">
                           <div class="pull-left">
                              <div class="meta-tag">
                                 <span><a href=""><i class="ti-headphone-alt"></i>{{$w2->phone}}</a></span>
                                 <span><i class="ti-location-pin"></i>@foreach ($countries2->where('id','=',$w2->country) as $item)
                                 {{$item->name}}
                                 @endforeach
                                 @foreach ($states2->where('id','=',$w2->state) as $state)
                                 {{$state->name}}
                                 @endforeach
                                 @foreach ($cities2->where('id','=',$w2->city) as $city)
                                 {{$city->name}}
                                 @endforeach
                                 </span>
                                 {{-- <span><i class="ti-time"></i>60/Hour</span> --}}
                              </div>
                           </div>
                           <form action="{{route('addcontact')}}" method="POST">
                              {{csrf_field()}}
                              <div class="pull-right">
                                 {{-- 
                                 <div class="icon">
                                    <i class="ti-heart"></i>
                                 </div>
                                 --}}
                                 <input type="hidden" value="{{$w2->id}}" name="worker_id">
                                 <a href="/login" class="btn btn-common btn-rm">Login First</a>
                              </div>
                           </form>
                        </div>
                     </div>
                  </div>
                  @endforeach
                  @endauth
                  @if(Auth::Check())
                  <ul class="pagination">
                     {{$worker->links("pagination::bootstrap-4")}}
                  </ul>
                  @endauth
                  @guest
                  <ul class="pagination">
                     {{$worker2->links("pagination::bootstrap-4")}}
                  </ul>
                  @endauth
               </div>
               <div class="col-md-3 col-sm-4">
                  <aside>
                     <div class="sidebar">
                        <div class="inner-box">
                           <h3>Profession</h3>
                           @if(Auth::Check())
                           @foreach ($category->slice(0,8) as $item)
                           <ul class="cat-list">
                              <li>
                                 <a href="{{route('byprofession',$item->profession)}}">{{$item->profession}} <span class="num-posts">{{$item->total}}</span></a>
                              </li>
                           </ul>
                           @endforeach
                           @endauth
                           @guest
                           @foreach ($category2->slice(0,8) as $item)
                           <ul class="cat-list">
                              <li>
                                 <a href="{{route('byprofession',$item->profession)}}">{{$item->profession}} <span class="num-posts">{{$item->total}}</span></a>
                              </li>
                           </ul>
                           @endforeach
                           @endauth
                        </div>
                        <div class="inner-box">
                           <h3>Location</h3>
                           @if(Auth::Check())
                           @foreach ($cities->slice(0,8) as $item)
                           <ul class="cat-list">
                              <li>
                                 <a href="{{route('bylocation',$item->id)}}">{{$item->name}} <span class="num-posts"></span></a>
                              </li>
                           </ul>
                           @endforeach
                           @endauth
                           @guest
                           @foreach ($cities2->slice(0,8) as $item)
                           <ul class="cat-list">
                              <li>
                                 <a href="{{route('bylocation',$item->id)}}">{{$item->name}} <span class="num-posts"></span></a>
                              </li>
                           </ul>
                           @endforeach
                           @endauth
                        </div>
                     </div>
                  </aside>
               </div>
            </div>
         </div>
      </section>
      @include('frontend.includes.scriptf')
      @include('frontend.includes.footer')
   </body>
</html>

