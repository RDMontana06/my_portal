@extends('layouts.app')

@section('content')
    <div class="wrapper">
        @include('layouts.nav')
        <div class="content-wrapper">
            <div class="content-header">
                <div class="container">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h3>Manage Users</h3>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                                <li class="breadcrumb-item active">Users</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content">
                <div class="container">
                    <div class="card card-success card-outline">
                        <div class="card-header container">
                            <div class="d-flex flex-row">
                                <div class="p-2">
                                    <h3 class="">Users</h3>
                                </div>
                                <div class="p-2">
                                    <div id="export"></div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            @if ($errors->any())
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li><strong>Error!</strong> {{ $error }}</li>
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <div class="table-responsive">
                                <table class="table-striped table" id="userTable">
                                    <thead>
                                        <tr>
                                            <th scope="col">Name</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Present Address</th>
                                            <th scope="col">Permanent Address</th>
                                            <th scope="col">Date Created</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $user)
                                            <tr id="user{{ $user->id }}">
                                                <td width="20%">{{ $user->name }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>{{ $user->employee->present_address }}</td>
                                                <td>{{ $user->employee->permanent_address }}</td>
                                                <td>{{ date_format($user->created_at, 'Y/m/d') }}</td>
                                                <td id="tdId{{ $user->id }}">
                                                    @if ($user->status == 1)
                                                        <span class="badge bg-success" id="status{{ $user->id }}">Enable</span>
                                                    @else
                                                        <span class="badge bg-danger" id="status{{ $user->id }}">Disabled</span>
                                                    @endif
                                                </td>
                                                <td width="20%" id="btnTd{{ $user->id }}" data-id="{{ $user->id }}">
                                                    @if ($user->status == 1)
                                                        @if (!in_array(1, $user->user_roles->pluck('role_id')->toArray()))
                                                            <button type="button" id="{{ $user->id }}" onclick="disableUser({{ $user->id }})"
                                                                class="disableBTn btn btn-danger" title="Disable">
                                                                <span class="fa fa-ban"></span>
                                                            </button>
                                                        @endif

                                                        <button type="button" id="{{ $user->id }}" data-toggle="modal"
                                                            data-target="#editModal{{ $user->id }}" class="editBtn btn btn-primary" title="Edit">
                                                            <span class="fa fa-pencil"></span>
                                                        </button>
                                                        @if (!in_array(1, $user->user_roles->pluck('role_id')->toArray()))
                                                            <button type="button" id="{{ $user->id }}" data-toggle="modal"
                                                                data-target="#change_pass{{ $user->id }}" class="resetBtn btn btn-secondary"
                                                                title="Reset Password">
                                                                <span class="fa fa-arrow-rotate-left"></span>
                                                            </button>
                                                        @endif
                                                    @else
                                                        <button type="button" id="{{ $user->id }}" onclick="activateUser(this.id)"
                                                            class="activateBTn btn btn-success" title="Enable">
                                                            <span class="fa fa-check"></span>
                                                        </button>
                                                    @endif
                                                </td>
                                            </tr>
                                            @include('usermanagement.edit_user')
                                            @include('usermanagement.change_pass')
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('userScript')
    <script type='text/javascript'>
        console.log('test script');
        $(function() {
            $("#userTable").DataTable({
                "responsive": true,
                "lengthChange": true,
                "autoWidth": false,
                "searching": true,
                "paging": true,
                "ordering": true,
                "info": true,
                "buttons": [{
                    extend: 'collection',
                    className: 'btn btn-success',
                    text: 'Export',
                    buttons: [
                        'copy',
                        'excel',
                        'csv',
                        'pdf',
                        'print'
                    ]
                }]
            }).buttons().container().appendTo('#export');
        });

        function disableUser(id) {
            console.log(id);
            var element = document.getElementById('btnTd' + id);
            var dataID = element.getAttribute('data-id');
            console.log(dataID);
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
                confirmButtonText: 'Yes, disable it!',
                cancelButtonText: 'No, cancel!',
                reverseButtons: false,
                confirmButtonColor: '#218838',
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "disableUser/" + id,
                        method: "POST",
                        data: {
                            id: id
                        },
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        success: function(data) {
                            swalWithBootstrapButtons.fire(
                                'Disabled!',
                                'User has been disabled.',
                                'success'
                            ).then(function() {
                                document.getElementById("tdId" + id).innerHTML =
                                    "<span class='badge bg-danger'>Disabled</span>";
                                document.getElementById("btnTd" + dataID).innerHTML = "<button type='button' id='action" +
                                    id + "' onclick='activateUser(" + id +
                                    ")' class='activateBTn btn btn-success' title='Enable'><span class='fa fa-check'></span></button>";

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

        function activateUser(id) {
            console.log("act" + id);
            var element = document.getElementById('btnTd' + id);
            var dataID = element.getAttribute('data-id');
            console.log("data" + dataID);
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
                icon: 'success',
                showCancelButton: true,
                confirmButtonText: 'Yes, enable it!',
                cancelButtonText: 'No, cancel!',
                reverseButtons: false,
                confirmButtonColor: '#218838',
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "activateUser/" + id,
                        method: "POST",
                        data: {
                            id: id
                        },
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        success: function(data) {
                            swalWithBootstrapButtons.fire(
                                'Enabled!',
                                'User has been Enabled.',
                                'success'
                            ).then(function() {
                                document.getElementById("tdId" + id).innerHTML =
                                    "<span class='badge bg-success'>Enable</span>";
                                document.getElementById("btnTd" + dataID).innerHTML = "<button type='button' id='action" +
                                    id + "' onclick='disableUser(" + id +
                                    ")' class='disableBTn btn btn-danger' title='Disable'><span class='fa fa-ban'></span></button> <button type='button' id='edit(" +
                                    id + ")' data-toggle='modal' data-target='#editModal" + id +
                                    "' class='editBtn btn btn-primary' title='Edit'><span class='fa fa-pencil'></span></button> <button type='button' id='reset" +
                                    id + "' data-toggle='modal' data-target='#change_pass" + id +
                                    "' class='resetBtn btn btn-secondary' title='Reset Password'><span class='fa fa-arrow-rotate-left'></span></button>";


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

        var loadFile = function(event) {
            console.log('load');
            var reader = new FileReader();
            reader.onload = function() {
                console.log('load');
                var output = document.getElementById('userImg');
                output.src = reader.result;
                console.log(output.src);
            };
            reader.readAsDataURL(event.target.files[0]);
        };

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    //$(input).next('img').attr('src', e.target.result);
                    var output = document.getElementById('userImg');
                    output.src = e.target.result;
                    console.log(output.src);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $(".upld").change(function() {
            readURL(this);
        });
    </script>
@endsection
