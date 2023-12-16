@extends('backend.uddoktas.layout.master')
  @section('body')
      @php
        if(strlen($fileData->apid) == 1){
            $apId = "000".$fileData->apid;
        }elseif(strlen($fileData->apid) == 2){
            $apId = "00".$fileData->apid;
        }elseif(strlen($fileData->apid) == 3){
            $apId = "0".$fileData->apid;
        }else{
            $apId = $fileData->apid;
        }
      @endphp
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
            <div class="col-md-12">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title mb-0">File Details</h5>
                </div>
                <table class="table">
                  <tbody>
                    <tr>
                      <th>ID NO</th>
                      <td>{{$apId}}</td>
                    </tr>
                    <tr>
                      <th>Name</th>
                      <td>{{$fileData->name}}</td>
                    </tr>
                    <tr>
                      <th>Father's Name</th>
                      <td>{{$fileData->fname}}</td>
                    </tr>
                    <tr>
                      <th>Date Of Birth</th>
                      <td>{{$fileData->dob}}</td>
                    </tr>
                    <tr>
                      <th>Village</th>
                      <td>{{$fileData->vill}}</td>
                    </tr>
                    <tr>
                      <th>Area Name</th>
                      <td>{{$fileData->area_name}}</td>
                    </tr>
                    <tr>
                      <th>Passport Type</th>
                      <td>{{$fileData->ptype}}</td>
                    </tr>
                    <tr>
                      <th>Passport Year</th>
                      <td>{{$fileData->pyear}}</td>
                    </tr>
                    <tr>
                      <th>Mobile Number</th>
                      <td>{{$fileData->mobile}}</td>
                    </tr>
                    <tr>
                      <th>Alter Native</th>
                      <td>{{$fileData->alterNative}}</td>
                    </tr>
                    <tr>
                      <th>Agreement Type</th>
                      <td>
                        @if($fileData->agreementType == "all")
                          {{$fileData->agreementType." (Passport+Ploice Verify)"}}
                        @else
                          {{$fileData->agreementType}}
                        @endif
                      </td>
                    </tr>
                    <tr>
                      <th>Agent By</th>
                      <td>{{$fileData->agentBy}}</td>
                    </tr>

                    <tr>
                      <th>Uddokta By</th>
                      <td>{{$fileData->user_id}}</td>
                    </tr>
                    <tr>
                      <th>Channel Fee</th>
                      <td>{{$fileData->total_price}}</td>
                    </tr>
                    <tr>
                      <th>Paid</th>
                      <td>{{$fileData->pay_1st+$fileData->pay_2nd+$fileData->pay_3rd}}</td>
                    </tr>
                    <tr>
                      <th>Due</th>
                      <td>{{$fileData->total_price-($fileData->pay_1st+$fileData->pay_2nd+$fileData->pay_3rd)}}</td>
                    </tr>
                    <tr>
                      <th>Status</th>
                      <td class="text-warning">Pending</td>
                    </tr>
                  </tbody>
                </table>
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