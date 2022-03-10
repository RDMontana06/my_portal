@extends('layouts.app')

@section('content')
<div class="wrapper">

  @include('layouts.nav')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-8">
            <!-- SEARCH FORM -->
            
          </div><!-- /.col -->
          
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container">
        <div class="row">
          <div class="col-lg-8">
            <div class="card">
              <div class="card-body">
                <div class="row">
                  <div class="col-sm-9">
                    <h1>Wednesday, March 9th</h1>
                    <h2>Good afternoon, <br> Reymart Montana</h2>
                  </div>
                  <div class="col-sm-3">
                  </div>
                </div>
              </div>
            </div>
            <form class="ml-0">
              <div class="input-group mb-3 flex-nowrap">
                <input type="text" class="form-control" placeholder="Search" aria-label="Recipient's username" aria-describedby="button-addon2">
                <button class="btn btn-outline-secondary" type="button" id="button-addon2">
                  <i class="fas fa-search"></i>
                </button>
              </div>
            </form>
            
            <div class="card">
              <div class="card-header">
                <h5 class="card-title">PORTALS</h5>
              </div>
              <div class="card-body">
                <div class="container">
                  <div class="row">
                    <div class="col-sm-4 col-sm">
                      <a href="/" class="">
                        <img src="{{ asset('dist/img/logo/HRIS-LOGO.png') }}" alt="pmi-logo" class=" img-fluid img-bordered-sm mb-2">
                      </a>
                    </div>
                    <div class="col-sm-4 col-sm">
                      <a href="/" class="">
                        <img src="{{ asset('dist/img/logo/EDMS-LOGO.png') }}" alt="pmi-logo" class=" img-fluid img-bordered-sm mb-2">
                      </a>
                    </div>
                    <div class="col-sm-4 col-sm">
                      <a href="/" class="">
                        <img src="{{ asset('dist/img/logo/MMS-LOGO.png') }}" alt="pmi-logo" class=" img-fluid img-bordered-sm mb-2">
                      </a>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-4 col-sm">
                      <a href="/" class="">
                        <img src="{{ asset('dist/img/logo/pmi-acu.png') }}" alt="pmi-logo" class=" img-fluid img-bordered-sm mb-2">
                      </a>
                    </div>
                    <div class="col-sm-4 col-sm">
                      <a href="/" class="">
                        <img src="{{ asset('dist/img/logo/mac-acu.png') }}" alt="pmi-logo" class=" img-fluid img-bordered-sm mb-2">
                      </a>
                    </div>
                    <div class="col-sm-4 col-sm">
                      <a href="/" class="">
                        <img src="{{ asset('dist/img/logo/ocs-acu.png') }}" alt="pmi-logo" class=" img-fluid img-bordered-sm mb-2">
                      </a>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-4 col-sm">
                      <a href="/" class="">
                        <img src="{{ asset('dist/img/logo/plc-acu.png') }}" alt="pmi-logo" class=" img-fluid img-bordered-sm mb-2">
                      </a>
                    </div>
                    <div class="col-sm-4 col-sm">
                      <a href="/" class="">
                        <img src="{{ asset('dist/img/logo/obanana-acu.png') }}" alt="pmi-logo" class=" img-fluid img-bordered-sm mb-2">
                      </a>
                    </div>
                    <div class="col-sm-4 col-sm">
                      <a href="/" class="">
                        <img src="{{ asset('dist/img/logo/ocs-acu.png') }}" alt="pmi-logo" class=" img-fluid img-bordered-sm mb-2">
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            
          </div>
          <!-- /.col-md-6 -->
          <div class="col-lg-4">
            <div class="card">
              <div class="card-body">
                <img src="{{ asset('dist/img/user8-128x128.jpg') }}" alt="User Avatar" class="img-size-70 img-circle mx-auto d-block ">
                <h5 class="mt-4 text-center">Reymart Montana</h5>
                <h6 class="mt-2 text-center">Application Support</h6>
              </div>
            </div>

            <div class="card card-success card-outline">
              <div class="card-header">
                <h5 class="card-title m-0">Bulletins</h5>
              </div>
              <div class="card-body">
              <div class="row">
                  <div class="col-sm-2 col-xl-2 col-lg-2 col-md-2 mx-auto px-auto">
                   <i class="fas fa-calendar-week fa-lg"></i>
                  </div>
                  <div class="col-sm-10 col-xl-10 col-lg-10 col-md-10 mx-auto px-auto">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="card card-success card-outline">
              <div class="card-header">
                <h5 class="card-title m-0">Events</h5>
              </div>
              <div class="card-body">
              </div>
            </div>
          </div>
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  @include('layouts.footer')
</div>
<!-- ./wrapper -->
@endsection

