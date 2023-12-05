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
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">File Datatable</h5>
                  <div class="table-responsive">
                    <table
                      id="zero_config"
                      class="table table-striped table-bordered h-100"
                    >
                      <thead>
                         <tr>
                          <th>Si No</th>
                          <th>Name </th>
                          <th>Agreement Type</th>
                          <th>Passport Type</th>
                          <th>Aria Name</th>
                          <th>Uddokta By</th>
                          <th>Mobile No</th>
                          <th>Channel Fee</th>
                          <th>Due</th>
                          <th>Status</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($fileData as $key => $frow)
                        <tr>
                          <td>{{++$key}}</td>
                          <td>{{$frow->name}}</td>
                          <td>{{$frow->agreementType}}</td>
                          <td>{{$frow->ptype}}</td>
                          <td>{{$frow->area_name}}</td>
                          <td>{{$frow->user_id}}</td>
                          <td>{{$frow->mobile}}</td>
                          <td>{{$frow->total_price}}</td>
                          <td>{{$frow->total_price-($frow->pay_1st+$frow->pay_2nd+$frow->pay_3rd)}}</td>
                          <td class="text-warning">Pending</td>
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
                                <a class="dropdown-item" href="{{url('/fileView/'.$frow->id)}}">View</a>
                                <a class="dropdown-item" href="{{url('/fileEdite/'.$frow->id)}}">Edite</a>
                                <a class="dropdown-item" href="{{url('/fileRecipt/'.$frow->id)}}">Add Recipt</a>
                                <a class="dropdown-item" href="{{url('/statusUpdate/'.$frow->id)}}">Status Update</a>
                                <a class="dropdown-item" href="{{url('/fileDelete/'.$frow->id)}}">Delete</a>
                              </div>
                            </div>
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
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