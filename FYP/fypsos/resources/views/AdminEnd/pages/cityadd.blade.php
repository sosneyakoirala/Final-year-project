
<!DOCTYPE html>
<html>

    @include('AdminEnd.includes.head')


    <body>
      <!-- Sidenav -->
      @include('AdminEnd.includes.sidenav')
    
      <!-- Main content -->
      <div class="main-content" id="panel">
        <!-- Topnav -->
        @include('AdminEnd.includes.topnav')
    <!-- Header -->
    <!-- Header -->
    <div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">Addresses</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="#">City</a></li>
                  <li class="breadcrumb-item active" aria-current="page">City</li>
                </ol>
              </nav>
            </div>
            <div class="col-lg-6 col-5 text-right">
              <button type="button" class="btn btn-sm btn-neutral" data-toggle="modal" data-target="#insertimage">
                Add City
            </button>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="insertimage" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Add City</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body">
                  <form method="POST" action="{{route('city.store')}}" enctype="multipart/form-data">
                      {{csrf_field()}}
                      <div class="form-group">
                          <label for="name" class="col-form-label">State:</label>
                          <select class="wide form-control" name="state_id">
                              @foreach ($city as $item)
                            <option value="{{$item->id}}">{{$item->name}}</option>
                              @endforeach
                         </select>
                      </div>

                       <div class="form-group">
                        <label for="city" class="col-form-label">City:</label>
                        <input type="text" name="name" class="wide form-control">
                    </div>


                      
                      <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          <button type="submit" class="btn btn-primary">Submit</button>
                      </div>
                  </form>
              </div>
          </div>
      </div>
  </div>
    <!-- Page content -->
    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col-md-12">
               @include('AdminEnd.pages.notification')
            </div>
        </div>
      <div class="row">
        <div class="col">
          <div class="card">
            <!-- Card header -->
            <div class="card-header border-0">
              <h3 class="mb-0">All Address</h3>
            </div>
            <!-- Light table -->
            <div class="table-responsive">
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col" class="sort" data-sort="name">City</th>
                    {{-- <th scope="col">City</th> --}}
                    <th scope="col" class="sort" data-sort="completion">Action</th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody class="list">
                    @foreach ($citys as $item)
                    
                  <tr>
                    <td class="budget">
                        {{$item->name}}
                      </td>

                    <td>
                        <form id="delete-form-{{$item->id}}" action=" {{route('delete.city', $item->id)}} " method="POST" style="display: none">
                           @csrf
                           @method('DELETE')
                        </form>
                        <a href="" onclick=
                           "if(confirm('Are you sure, you want to delete this Address?'))
                           {
                           event.preventDefault();
                           document.getElementById('delete-form-{{$item->id}}').submit();
                           }
                           else{
                           event.preventDefault();
                           }">
                           <i class="ni ni-basket text-danger"></i>
                        </a>
                     </td>
                   
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            <!-- Card footer -->
            
          </div>
        </div>
      </div>
      <!-- Dark table -->
      
      <!-- Footer -->
      @include('AdminEnd.includes.footer')

</body>

</html>