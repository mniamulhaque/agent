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
               @if($errors->has('agentId'))
                    <div class="alert text-danger" style="background:#F8D7DA" role="alert">
                      {{$errors->first('agentId')}}
                    </div>
                @elseif($errors->has('name'))
                    <div class="alert text-danger" style="background:#F8D7DA" role="alert">
                      {{$errors->first('name')}}
                    </div>
                @elseif($errors->has('area_name'))
                    <div class="alert text-danger" style="background:#F8D7DA" role="alert">
                      {{$errors->first('area_name')}}
                    </div>
                @elseif($errors->has('mobile'))
                    <div class="alert text-danger" style="background:#F8D7DA" role="alert">
                      {{$errors->first('mobile')}}
                    </div>
                @endif
             </p>
          <div class="row">
            <div class="col-12">
              <div class="card">
                <form class="form-horizontal" action="{{url('/agent-list') }}" method="POST">
                  @csrf
                  <div class="card-body">
                    <h4 class="card-title">Passport Recipt </h4>
                    
                    <div class="form-group row">
                      <label
                        for="lname"
                        class="col-sm-3 text-end control-label col-form-label"
                        >Upload Recipt</label
                      >
                      <div class="col-sm-9">
                        <input
                          type="file"
                          class="form-control"
                          id="file_recipt"
                          name="file_recipt"
                        />
                        <input type="hidden" name="filId" value="{{$filId}}">
                      </div>
                    </div>
                  </div>
                  <div class="border-top">
                    <div class="card-body">
                      <button type="submit" class="btn btn-primary">
                        Submit
                      </button>
                    </div>
                  </div>
                </form>
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