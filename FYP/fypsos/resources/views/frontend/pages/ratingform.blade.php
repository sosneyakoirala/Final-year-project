

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
      <div id="content" class="my-account">
         <div class="container">
            <div class="row">
               <div class="col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-6 cd-user-modal">
                  <div class="my-account-form">
                     <div class="container">
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
                              <button type="submit" class="btn btn-common log-btn" id="btnSubmit">Login</button>
                           </div>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      @include('frontend.includes.footer')
      @include('frontend.includes.scriptf')
   </body>
</html>

