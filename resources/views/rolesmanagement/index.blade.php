@extends('layouts.app')

@section('content')
    <div class="wrapper">
        @include('layouts.nav')
        <div class="content-wrapper">
            <div class="content-header">
                <div class="container">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h3>Manage Roles</h3>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                                <li class="breadcrumb-item active">Roles</li>
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
                                    <h3 class="">Roles
                                        <button class="btn btn-success" type="button" title="Add Roles" data-toggle="modal" data-target="#roles">
                                            <span class="fa-solid fa-plus"></span></button>
                                    </h3>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table-striped table" id="roleTable">
                                    <thead>
                                        <tr>
                                            <th scope="col">Role</th>
                                            <th scope="col">Date Created</th>
                                            <th scope="col">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($roles as $role)
                                            <tr id="user{{ $role->id }}">
                                                <td>{{ $role->name }}</td>
                                                <td>{{ $role->created_at }}</td>
                                                <td></td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                            {{-- <div class="input-group">
                                <select class="custom-select" id="inputGroupSelect04">
                                    <option value="">-Select Role-</option>
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->id }}" {{ old('role') == $role->id ? 'selected' : '' }}>
                                            {{ $role->name }}</option>
                                    @endforeach
                                </select>
                                <div class="input-group-append">
                                    <button class="btn btn-outline-success" type="button" title="Add Roles" data-toggle="modal" data-target="#roles">
                                        <span class="fa-solid fa-plus"></span></button>
                                </div>
                            </div> --}}
                            {{-- Add Roles Modal --}}
                            <!-- Modal -->
                            <div class="modal fade" id="roles" tabindex="-1" role="dialog" aria-labelledby="rolesLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">
                                                <i class="fa-solid fa-user-gear"></i>
                                                New Role
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form method='post' action='new-role' onsubmit="show()" enctype="multipart/form-data">
                                            {{ csrf_field() }}
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <input class="form-control" type="text" placeholder="Role Name" name="role_name">
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-primary">Save changes</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('roleScript')
    <script type='text/javascript'>
        $(function() {
            $("#roleTable").DataTable({
                "responsive": true,
                "lengthChange": true,
                "autoWidth": false,
                "searching": true,
                "paging": true,
                "ordering": true,
                "info": true
            });
        });
    </script>
@endsection
