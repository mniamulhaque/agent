@extends('backend.layout.master')
  @section('body')
      <!-- ============================================================== -->
      <!-- Page wrapper  -->
      <!-- ============================================================== -->
      <div class="page-wrapper">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="page-breadcrumb">
          <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
              <h4 class="page-title">Dashboard</h4>
              <div class="ms-auto text-end">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                      Library
                    </li>
                  </ol>
                </nav>
              </div>
            </div>
          </div>
        </div>
        <!-- ============================================================== -->
        <!-- End Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Container fluid  -->
        <!-- ============================================================== -->
        <div class="container-fluid">
         <!-- ============================================================== -->
          <!-- Start Page Content -->
          <!-- ============================================================== -->
          <p class="">
            @if(Session::has('message'))
            <div class="alert text-success" style="background:#D4EDDA;" role="alert">
              {{Session::get('message')}}
            </div>
            @endif
        </p>
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Basic Datatable</h5>
                  <div class="table-responsive">
                    <table
                      id="zero_config"
                      class="table table-striped table-bordered"
                    >
                      <thead>
                        <tr>
                          <th>Si No</th>
                          <th>Name </th>
                          <th>Aria Name</th>
                          <th>Mobile No</th>
                          <th>Alter Native</th>
                          <th>Total File</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($uddoktaData as $key => $urow)
                        <tr>
                          <td>{{++$key}}</td>
                          <td>{{$urow->name}}</td>
                          <td>{{$urow->area_name}}</td>
                          <td>{{$urow->mobile}}</td>
                          <td>{{$urow->alterNative}}</td>
                          <td>{{count(App\filemanage::where('user_id',$urow->id)->get())}}</td>
                          <td>
                            <div class="btn-group">
                              <button
                                type="button"
                                class="btn btn-info dropdown-toggle text-white w-100"
                                data-bs-toggle="dropdown"
                                aria-haspopup="true"
                                aria-expanded="false"
                              >
                                Action
                              </button>
                              <div class="dropdown-menu">
                                <a class="dropdown-item" href="{{url('/entrView/'.$urow->id)}}">View</a>
                                <a class="dropdown-item" href="{{url('/entrDelete/'.$urow->id)}}">Delete</a>
                                <a class="dropdown-item" href="{{url('/entrDeactive/'.$urow->id)}}">Deactive</a>
                              </div>
                            </div>
                          </td>
                        </tr>
                        @endforeach
                      </tfoot>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- ============================================================== -->
          <!-- End PAge Content -->
          <!-- ============================================================== -->
          <!-- ============================================================== -->
          <!-- Recent comment and chats -->
          <!-- ============================================================== -->
          
          <!-- ============================================================== -->
          <!-- Recent comment and chats -->
          <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Container fluid  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- footer -->
        <!-- ============================================================== -->
  @endsection