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
      <div class="container-fluid">
        <div class="row">
        <div class="col-lg-2">
          <div class="card card-success card-outline">
              <div class="card-header">
                <h5 class="card-title m-0"><i class="fa-solid fa-party-horn"></i> Birthday Celebrants </h5>
                
              </div>
              <div class="card-body">
              <h4>{{ (date('F d')) }}</h4>
              <div class="row">
                  <div class="col-sm-12 col-xl-12 col-lg-12 col-md-12 mb-2">
                    <span class="mr-2"><img src="{{ asset('images/no_image.png') }}" alt="User Avatar" class="img-fluid img-thumbnail img-sm"></span> <small>Reymart Montana</small>
                  </div>
                  <div class="col-sm-12 col-xl-12 col-lg-12 col-md-12 mb-2">
                    <span class="mr-2"><img src="{{ asset('images/no_image.png') }}" alt="User Avatar" class="img-fluid img-thumbnail img-sm"></span> <small>Jeff Cefiro Jurolan</small>
                  </div>
                  <div class="col-sm-12 col-xl-12 col-lg-12 col-md-12 mb-2">
                    <span class="mr-2"><img src="{{ asset('images/no_image.png') }}" alt="User Avatar" class="img-fluid img-thumbnail img-sm"></span> <small>Renz Cabato</small>
                  </div>
                  <div class="col-sm-12 col-xl-12 col-lg-12 col-md-12 mb-2">
                    <span class="mr-2"><img src="{{ asset('images/no_image.png') }}" alt="User Avatar" class="img-fluid img-thumbnail img-sm"></span> <small>Ric Ric Mendoza</small>
                  </div>
                </div>
              </div>
            </div>

            <div class="card card-success card-outline">
              <div class="card-header">
                <h5 class="card-title m-0"><i class="fa-solid fa-users"></i> New Employees </h5>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-sm-12 col-xl-12 col-lg-12 col-md-12 mb-2">
                      <span class="mr-2"><img src="{{ asset('images/no_image.png') }}" alt="User Avatar" class="img-fluid img-thumbnail img-sm"></span> <small>Lorem Ipsum - PMI</small>
                  </div>
                  <div class="col-sm-12 col-xl-12 col-lg-12 col-md-12 mb-2">
                      <span class="mr-2"><img src="{{ asset('images/no_image.png') }}" alt="User Avatar" class="img-fluid img-thumbnail img-sm"></span> <small>Lorem Ipsum - CSC</small>
                  </div>
                  <div class="col-sm-12 col-xl-12 col-lg-12 col-md-12 mb-2">
                      <span class="mr-2"><img src="{{ asset('images/no_image.png') }}" alt="User Avatar" class="img-fluid img-thumbnail img-sm"></span> <small>Lorem Ipsum - MBI</small>
                  </div>
                  <div class="col-sm-12 col-xl-12 col-lg-12 col-md-12 mb-2">
                      <span class="mr-2"><img src="{{ asset('images/no_image.png') }}" alt="User Avatar" class="img-fluid img-thumbnail img-sm"></span> <small>Lorem Ipsum - IMC</small>
                  </div>
                </div>
              </div>
            </div>
        </div>
          <div class="col-lg-8">
            <div class="card card-success card-outline">
              <div class="card-header">
                  <h5 class="card-title">PORTALS <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#new_portal"><i class="fa-solid fa-plus" ></i></button>
                  </h5>
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
                     @if($portal->status == 1)
                    <div class="col-sm-2 col-sm text-center target" id='portal{{$portal->id}}'>
                      <div class="card">
                        <div class="card-header">
                          <div class="row">
                            <div class="col">
                            </div>
                            <div class="col">
                              <button type="button" id="{{$portal->id}}" onclick="getPortalId(this.id)"  class="close btn-delete-portal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                          </div>
                        </div>
                        <div class="card-body mx-auto p-0">
                        
                          <a href="{{$portal->link_portal}}" class="" target='_blank'>
                            <img src="{{ asset($portal->image_icon)}}" alt="icon" class=" img-fluid img-bordered-sm mb-2">
                          </a>
                        </div>
                        <div class="card-footer">
                          <small class="text-bold text-wrap">{{$portal->title_portal}} </small>
                        </div>
                      </div>
                    </div>
                     @endif
                    @endforeach
                  </div>
                </div>
              </div>
            </div>
            @include('layouts.new_portal')
          </div>
          <div class="col-lg-2">
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
                    <h6 class="mt-2 ">{{$user->employee->position}}</h6>
                  </div>
                </div>
              </div>
            </div>

            <div class="card card-success card-outline">
              <div class="card-header">
                <h5 class="card-title m-0">Bulletins <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#new_bulletin"><i class="fa-solid fa-plus" ></i>
                </button></h5>
              </div>
              <div class="card-body">
                @foreach($bulletins as $bulletin)
                <div class="col-sm-12 col-xl-12 col-lg-12 col-md-12 mb-2 " id='bulletin{{$bulletin->id}}' >
                  
                  <button type="button" id="{{$bulletin->id}}" onclick="getBulletinId(this.id)"  class="close btn-delete-portal"><span class="fa-solid fa-trash text-red"></span></button>
                    <a href="{{ $bulletin->file_path }}" target='_blank'>
                      <i class="fa-solid fa-file-pdf mr-2"> </i> 
                        <small>{{$bulletin->file_name}}</small>
                    </a>
                  
                </div>
                @endforeach
              </div>
              @include('layouts.new_bulletin')
            </div>
            <div class="card card-success card-outline">
              <div class="card-header">
                <h5 class="card-title m-0">Promotions</h5>
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
    //Get ID of Portal
    function getPortalId(id){
      
      const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
          confirmButton: 'btn btn-success',
          cancelButton: 'btn btn-danger'
        },
        buttonsStyling: true
      })

      swalWithBootstrapButtons.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, delete it!',
        cancelButtonText: 'No, cancel!',
        reverseButtons: false
      }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
            
              url:"updatePortalStatus/"+id, 
              method: "POST",  
              data:{id:id},  
              headers: {
                'X-CSRF-TOKEN': '{{csrf_token()}}'
              },
              success:function(data){
                swalWithBootstrapButtons.fire(
                  'Deleted!',
                  'Your file has been deleted.',
                  'success'
                ).then(function() {
                  // $('#'+id).remove();
                  document.querySelector('#portal'+id).remove();
                });
              }  
          });
        } else if (
          /* Read more about handling dismissals below */
          result.dismiss === Swal.DismissReason.cancel
        ) {
          swalWithBootstrapButtons.fire(
            'Cancelled',
            'Your file is safe',
            'error'
          )
        }
      })
    }
    function getBulletinId(id){
    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
          confirmButton: 'btn btn-success',
          cancelButton: 'btn btn-danger'
        },
        buttonsStyling: true
      })

      swalWithBootstrapButtons.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, delete it!',
        cancelButtonText: 'No, cancel!',
        reverseButtons: false
      }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
            
              url:"deleteBulletin", 
              method: "POST",  
              data:{id:id},  
              headers: {
                'X-CSRF-TOKEN': '{{csrf_token()}}'
              },
              success:function(data){
                swalWithBootstrapButtons.fire(
                  'Deleted!',
                  'Your file has been deleted.',
                  'success'
                ).then(function() {
                  // $('#'+id).remove();
                  document.querySelector('#bulletin'+id).remove();
                });
              }  
          });
        } else if (
          /* Read more about handling dismissals below */
          result.dismiss === Swal.DismissReason.cancel
        ) {
          swalWithBootstrapButtons.fire(
            'Cancelled',
            'Your file is safe',
            'error'
          )
        }
      })
    }
    
  </script>

  @include('layouts.footer')
  @include('sweetalert::alert')
</div>
<!-- ./wrapper -->
@endsection

