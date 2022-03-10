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
              <div class="card-header">
                <h5 class="card-title">PORTALS</h5>
              </div>
              <div class="card-body">
                <div class="container">
                  <div class="row">
                    <div class='col-md-12'>
                        <input class="form-control" id="Search" onkeyup="myFunction()" width='100%;' type="text" placeholder="Search" aria-label="Search">
                    </div>
                  </div>
                  <br>
                  <div class="row">
                    @foreach($portals as $portal)
                    <div class="col-sm-3 col-sm text-center target">
                      <a href="{{$portal->link_portal}}" class="" target='_blank'>
                        <img src="{{ asset($portal->image_icon)}}" alt="icon" class=" img-fluid img-bordered-sm mb-2">
                      </a>
                      <span>{{$portal->title_portal}}</span>
                    </div>
                    @endforeach
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- /.col-md-6 -->
          <div class="col-lg-4">
            <div class="card">
              <div class="card-body">
                <div class="row">
                  <div class="col-lg-4 text-center">
                    <img src="{{ asset('images/no_image.png') }}" alt="User Avatar" class="img-fluid img-thumbnail ">
                    <a href="{{ route('logout') }}"  onclick="logout(); show();">
                      <i class="fa fa-sign-out"></i> Log out
                    </a>
                  </div>
                  <div class="col-lg-8">
                    <h5 class="mt-4 ">{{auth()->user()->name}}</h5>
                    <h6 class="mt-2 ">Application Support</h6>
                  </div>
                </div>
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
  <form id="logout-form"  action="{{ route('logout') }}"  method="POST" style="display: none;">
    {{ csrf_field() }}
  </form>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
  <script>
    
     function myFunction() {
        var input = document.getElementById("Search");
        var filter = input.value.toLowerCase();
        var nodes = document.getElementsByClassName('target');
        
        for (i = 0; i < nodes.length; i++) {
            if (nodes[i].innerText.toLowerCase().includes(filter)) {
                nodes[i].style.display = "";
            } else {
                nodes[i].style.display = "none";
            }
        }
    }
  </script>

  @include('layouts.footer')
</div>
<!-- ./wrapper -->
@endsection

