@extends('backend.uddoktas.layout.master')
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
               @if($errors->has('apid'))
                    <div class="alert text-danger" style="background:#F8D7DA" role="alert">
                      {{$errors->first('apid')}}
                    </div>
                @elseif($errors->has('name'))
                    <div class="alert text-danger" style="background:#F8D7DA" role="alert">
                      {{$errors->first('name')}}
                    </div>
                @elseif($errors->has('fname'))
                    <div class="alert text-danger" style="background:#F8D7DA" role="alert">
                      {{$errors->first('fname')}}
                    </div>
                @elseif($errors->has('area_name'))
                    <div class="alert text-danger" style="background:#F8D7DA" role="alert">
                      {{$errors->first('area_name')}}
                    </div>
                @elseif($errors->has('mobile'))
                    <div class="alert text-danger" style="background:#F8D7DA" role="alert">
                      {{$errors->first('mobile')}}
                    </div>
                @elseif($errors->has('dob'))
                    <div class="alert text-danger" style="background:#F8D7DA" role="alert">
                      {{$errors->first('dob')}}
                    </div>
                @elseif($errors->has('vill'))
                    <div class="alert text-danger" style="background:#F8D7DA" role="alert">
                      {{$errors->first('vill')}}
                    </div>
                @elseif($errors->has('ptype'))
                    <div class="alert text-danger" style="background:#F8D7DA" role="alert">
                      {{$errors->first('ptype')}}
                    </div>
                @elseif($errors->has('pyear'))
                    <div class="alert text-danger" style="background:#F8D7DA" role="alert">
                      {{$errors->first('pyear')}}
                    </div>
                @elseif($errors->has('alterNative'))
                    <div class="alert text-danger" style="background:#F8D7DA" role="alert">
                      {{$errors->first('alterNative')}}
                    </div>
                @elseif($errors->has('agreementType'))
                    <div class="alert text-danger" style="background:#F8D7DA" role="alert">
                      {{$errors->first('agreementType')}}
                    </div>
                @elseif($errors->has('total_price'))
                    <div class="alert text-danger" style="background:#F8D7DA" role="alert">
                      {{$errors->first('total_price')}}
                    </div>
                @elseif($errors->has('file_documet'))
                    <div class="alert text-danger" style="background:#F8D7DA" role="alert">
                      {{$errors->first('file_documet')}}
                    </div>
                @endif
             </p>
          <div class="row">
            <div class="col-12">
              <div class="card">
                <form class="form-horizontal" action="{{url('/file-list/'.$apId->id) }}" method="POST">
                  @csrf
                  @method('PUT')
                  <div class="card-body">
                    <h4 class="card-title">Edite File Information</h4>
                    <div class="form-group row">
                      <label
                        for="fname"
                        class="col-sm-3 text-end control-label col-form-label"
                        >Application ID</label
                      >
                      <div class="col-sm-9">
                        <input
                          type="number"
                          class="form-control"
                          id="apid"
                          name="apid"
                          value="000{{$apId->id}}"
                          readonly
                        />
                      </div>
                    </div>
                    <div class="form-group row">
                      <label
                        for="lname"
                        class="col-sm-3 text-end control-label col-form-label"
                        >File Type</label
                      >
                      <div class="col-sm-9">
                        <select
                            class="select2 form-select shadow-none"
                            style="width: 100%; height: 36px"
                            name="fileType"
                          >
                            <option value="{{$apId->fileType}}">{{$apId->fileType}}</option>
                            <option value="new">New</option>
                            <option value="renew">Re-New</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label
                        for="lname"
                        class="col-sm-3 text-end control-label col-form-label"
                        >Full Name</label
                      >
                      <div class="col-sm-9">
                        <input
                          type="text"
                          class="form-control"
                          id="name"
                          name="name"
                          value="{{$apId->name}}"
                          placeholder="Full Name Here"
                        />
                      </div>
                    </div>

                    <div class="form-group row">
                      <label
                        for="lname"
                        class="col-sm-3 text-end control-label col-form-label"
                        >Father's Name</label
                      >
                      <div class="col-sm-9">
                        <input
                          type="text"
                          class="form-control"
                          id="fname"
                          name="fname"
                          value="{{$apId->fname}}"
                          placeholder="Father's Name Here"
                        />
                      </div>
                    </div>

                    <div class="form-group row">
                      <label
                        for="lname"
                        class="col-sm-3 text-end control-label col-form-label"
                        >Date Of Birth</label
                      >
                      <div class="col-sm-9">
                        <input
                          type="date"
                          class="form-control"
                          id="dob"
                          name="dob"
                          value="{{$apId->dob}}"
                        />
                      </div>
                    </div>
                    <div class="form-group row">
                      <label
                        for="lname"
                        class="col-sm-3 text-end control-label col-form-label"
                        >Vill</label
                      >
                      <div class="col-sm-9">
                        <input
                          type="text"
                          class="form-control"
                          id="vill"
                          name="vill"
                          value="{{$apId->vill}}"
                          placeholder="Village Name Here"
                        />
                      </div>
                    </div>
                    <div class="form-group row">
                      <label
                        for="lname"
                        class="col-sm-3 text-end control-label col-form-label"
                        >Passport Type</label
                      >
                      <div class="col-sm-9">
                        <select
                            class="select2 form-select shadow-none"
                            style="width: 100%; height: 36px"
                            name="ptype"
                          >
                            <option value="{{$apId->ptype}}">{{$apId->ptype}}</option>
                            <option value="regular">Regular</option>
                            <option value="express">Express</option>
                            <option value="superexpress">Super Express</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label
                        for="lname"
                        class="col-sm-3 text-end control-label col-form-label"
                        >Pasport Year</label
                      >
                      <div class="col-sm-9">
                        <select
                            class="select2 form-select shadow-none"
                            style="width: 100%; height: 36px"
                            name="pyear"
                          >
                            <option value="{{$apId->pyear}}">{{$apId->pyear}}</option>
                            <option value="10">10 Year</option>
                            <option value="5">5 Year</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label
                        for="lname"
                        class="col-sm-3 text-end control-label col-form-label"
                        >Mobile Number</label
                      >
                      <div class="col-sm-9">
                        <input
                          type="number"
                          class="form-control"
                          id="number"
                          name="mobile"
                          value="{{$apId->mobile}}"
                          placeholder="Mobile Number Here"
                        />
                      </div>
                    </div>


                    <div class="form-group row">
                      <label
                        for="lname"
                        class="col-sm-3 text-end control-label col-form-label"
                        >Alter Native <br> Number</label
                      >
                      <div class="col-sm-9">
                        <input
                          type="number"
                          class="form-control"
                          id="number"
                          name="alterNative"
                          value="{{$apId->alterNative}}"
                          placeholder="Mobile Number Here"
                        />
                      </div>
                    </div>

                    <div class="form-group row">
                      <label
                        for="lname"
                        class="col-sm-3 text-end control-label col-form-label"
                        >Agreement Type</label
                      >
                      <div class="col-sm-9">
                        <select
                            class="select2 form-select shadow-none"
                            style="width: 100%; height: 36px"
                            name="agreementType"
                          value="{{$apId->agreementType}}"
                          >
                            <option value="{{$apId->agreementType}}">{{$apId->agreementType}}</option>
                            <option value="all">All</option>
                            <option value="passport">Passport</option>
                            <option value="policeverify">Police Verify</option>
                        </select>
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