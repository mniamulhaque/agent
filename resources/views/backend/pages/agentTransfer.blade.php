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
                @endif
             </p>
          <div class="row">
            <div class="col-12">
              <div class="card">
                <form class="form-horizontal" action="{{url('/fileAgentSend/'.$filId) }}" method="POST">
                  @csrf
                  <div class="card-body">
                    <h4 class="card-title">Transfer to agent </h4>
                    
                    <div class="form-group row">
                      <label
                        for="fname"
                        class="col-sm-3 text-end control-label col-form-label"
                        >Agent Name </label
                      >
                      <div class="col-sm-9">
                        <select
                            class="select2 form-select shadow-none"
                            style="width: 100%; height: 36px"
                            name="agentId"
                          >
                            <option>Select Agent</option>
                            @foreach($agentData as $arow)
                              <option value="{{$arow->id}}">{{$arow->name}}</option>
                            @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label
                        for="fname"
                        class="col-sm-3 text-end control-label col-form-label"
                        >Time to finish work</label
                      >
                      <div class="col-sm-9">
                        <input
                          type="date"
                          class="form-control"
                          id="name"
                          name="finishTime"
                        />
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