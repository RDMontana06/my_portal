<div class="modal fade" id="editModal{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="editModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLongTitle">Update User Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="editUser/{{ $user->id }}" method="post" onsubmit='show();'>
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label class="" for="first_name">First name</label>
                                <input value='{{ $user->employee->first_name }}' type="text" name="first_name" class="form-control"
                                    id="f1-first-name">
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label class="" for="middle_name">Middle name</label>
                                <input value='{{ $user->employee->middle_name }}' type="text" name="middle_name" class="form-control"
                                    id="middle_name">
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label class="" for="last_name">Last name</label>
                                <input value='{{ $user->employee->last_name }}' type="text" name="last_name" class="form-control" id="last_name">
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label class="" for="gender">Marital Status</label>
                                <select class="form-control" name="marital_status" id="marital_status">
                                    <option value="">-Select Marital Status-</option>
                                    <option value="Single" {{ $user->employee->marital_status == 'Single' ? 'selected' : '' }}>
                                        Single
                                    </option>
                                    <option value="Married" {{ $user->employee->marital_status == 'Married' ? 'selected' : '' }}>
                                        Married
                                    </option>
                                    <option value="Widowed" {{ $user->employee->marital_status == 'Widowed' ? 'selected' : '' }}>
                                        Widowed
                                    </option>
                                    <option value="Separated" {{ $user->employee->marital_status == 'Separated' ? 'selected' : '' }}>
                                        Separated</option>
                                    <option value="Divorced" {{ $user->employee->marital_status == 'Divorced' ? 'selected' : '' }}>
                                        Divorced</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="" for="present_address">Present Address</label>
                                <textarea value='' name="present_address" placeholder="Present address..." class="form-control" id="present_address">{{ $user->employee->present_address }}</textarea>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="" for="permanent_address">Permanent Address</label>
                                <textarea value='{{ old('permanent_address') }}' name="permanent_address" placeholder="Permanent address..." class="form-control"
                                    id="permanent_address">{{ $user->employee->permanent_address }}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="position">Name</label>
                                <input type="text" class="form-control" id="name" placeholder="name" name="name"
                                    value="{{ $user->name }}">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="position">Email</label>
                                <input type="email" class="form-control" id="email" placeholder="email" name="email"
                                    value="{{ $user->email }}">
                            </div>
                        </div>
                        {{-- <div class="col-md-3 align-middle">
                            <img src="{{ asset($user->employee->upload_image) }}" id="userImg" alt="User Avatar"
                                class="img-thumbnail img-circle d-block m-auto" width="200px" height="200px">
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="form-control upld" accept="image/*" id="exampleInputFile">
                                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                </div>
                            </div>
                        </div> --}}


                    </div>
                    <hr>
                    <h5>Roles</h5>
                    <div class="form-group">
                        <select class="select2bs4" name="role[]" multiple="multiple" data-placeholder="Select Roles" style="width: 100%;">
                            @foreach ($roles as $role)
                                <option value="{{ $role->id }}"
                                    {{ in_array($role->id, $user->user_roles->pluck('role_id')->toArray()) ? 'selected' : '' }}>
                                    {{ $role->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
            </form>
        </div>
    </div>
</div>
