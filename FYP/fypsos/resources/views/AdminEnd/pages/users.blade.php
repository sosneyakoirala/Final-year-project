
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
              <h6 class="h2 text-white d-inline-block mb-0">Users</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="#">Users</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Users</li>
                </ol>
              </nav>
            </div>
            <div class="col-lg-6 col-5 text-right">
              {{-- <button type="button" class="btn btn-sm btn-neutral" data-toggle="modal" data-target="#insertimage">
                Update User
            </button> --}}
              {{-- <a href="#" class="btn btn-sm btn-neutral">Filters</a> --}}
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="insertimage" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Profile Update</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body">
                  <form method="POST" action="" enctype="multipart/form-data">
                      {{csrf_field()}}
                      <div class="form-group">
                          <label for="name" class="col-form-label">Name:</label>
                          <select class="wide form-control" name="role">
                            <option value="admin">Admin</option>
                            <option value="vendor">Vendor</option>
                            <option value="user">User</option>
                         </select>
                      </div>
                      
                      <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          <button type="submit" class="btn btn-primary">Update</button>
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
              <h3 class="mb-0">All Users</h3>
            </div>
            <!-- Light table -->
            <div class="table-responsive">
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col" class="sort" data-sort="name">Name</th>
                    <th scope="col" class="sort" data-sort="budget">Phone</th>
                    <th scope="col">Email</th>
                    <th scope="col" class="sort" data-sort="completion">Role</th>
                    <th scope="col" class="sort" data-sort="completion">Action</th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody class="list">
                    @foreach ($users as $item)
                    {{-- ->where('role','!=','admin') --}}
                    
                  <tr>
                    <th scope="row">
                      <div class="media align-items-center">
                        <div class="media-body">
                          <span class="name mb-0 text-sm">{{$item->name}}</span>
                        </div>
                      </div>
                    </th>
                    <td class="budget">
                      {{$item->phone}}
                    </td>
                    
                    <td>
                      <span class="badge badge-dot mr-4">
                        <i class="bg-warning"></i>
                        <span class="status">{{$item->email}}</span>
                      </span>
                    </td>
                    <td>
                      <div class="d-flex align-items-center">
                        <span class="badge badge-dot mr-4">
                          <i class="bg-warning"></i>
                          <span class="status">{{$item->role}}</span>
                        </span>
                      </div>
                    </td>
                    <td class="text-right">
                      <form id="delete-form-{{$item->id}}" action=" {{route('delete.users', $item->id)}} " method="POST" style="display: none">
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