@extends('layouts.app_register')

@section('content')
    @include('messages.errorMessages')
    <div class="container">
        <form method="POST" action="saveEmployee" onsubmit="show()" enctype="multipart/form-data">
            {{ csrf_field() }}
            <h1 class="text-center">Registration Form</h1>
            <h4 class="text-center">Already have an Account ? <a class="badge badge-secondary" href="{{ url('/login') }}">Login</a></h4>
            <!-- Progress bar -->
            <div class="progressbar">
                <div class="progress" id="progress"></div>

                <div class="progress-step progress-step-active" data-title="Personal Details"></div>
                <div class="progress-step" data-title="Employee Details"></div>
                <div class="progress-step" data-title="Profile Picture"></div>
                <div class="progress-step" data-title="User Credentials"></div>
            </div>

            <!-- Steps -->
            <div class="form-step form-step-active">
                <h4>Personal Information</h4>
                <div class="row">
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label class="" for="first_name">First name</label>
                            <input value='{{ old('first_name') }}' type="text" name="first_name" class="form-control" id="f1-first-name">
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label class="" for="middle_name">Middle name</label>
                            <input value='{{ old('middle_name') }}' type="text" name="middle_name" class="form-control" id="middle_name">
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label class="" for="middle_initial">Middle Initial</label>
                            <input value='{{ old('middle_initial') }}' type="text" name="middle_initial" class="form-control" id="middle_initial">
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label class="" for="last_name">Last name</label>
                            <input value='{{ old('last_name') }}' type="text" name="last_name" class="form-control" id="last_name">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label class="" for="suffix">Suffix</label>
                            <input value='{{ old('suffix') }}' type="text" name="suffix" class="form-control" id="suffix">
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label class="" for="nickname">Nickname</label>
                            <input value='{{ old('nickname') }}' type="text" name="nickname" class="form-control" id="nickname">
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label class="" for="gender">Gender</label>
                            <select class="form-control" name="gender" id="gender">
                                <option value="">-Select Gender</option>
                                <option value="Male" {{ old('gender') == 'Male' ? 'selected' : '' }}>Male</option>
                                <option value="Female" {{ old('gender') == 'Female' ? 'selected' : '' }}>Female</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label class="" for="gender">Marital Status</label>
                            <select class="form-control" name="marital_status" id="marital_status">
                                <option value="">-Select Marital Status-</option>
                                <option value="Single" {{ old('marital_status') == 'Single' ? 'selected' : '' }}>Single
                                </option>
                                <option value="Married" {{ old('marital_status') == 'Married' ? 'selected' : '' }}>
                                    Married
                                </option>
                                <option value="Widowed" {{ old('marital_status') == 'Widowed' ? 'selected' : '' }}>
                                    Widowed
                                </option>
                                <option value="Separated" {{ old('marital_status') == 'Separated' ? 'selected' : '' }}>
                                    Separated</option>
                                <option value="Divorced" {{ old('marital_status') == 'Divorced' ? 'selected' : '' }}>
                                    Divorced</option>
                            </select>
                        </div>
                    </div>
                </div>
                <hr>
                <h4>Birth Information</h4>
                <div class="row">
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label class="" for="birth_date">Birth Date</label>
                            <input value='{{ old('birth_date', date('Y-m-d')) }}' type="date" name="birth_date" class="form-control"
                                max='<?php echo date('Y-m-d'); ?>' id="birth_date">
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label class="" for="birth_place">Birth Place</label>
                            <input value='{{ old('birth_place') }}' type="text" name="birth_place" placeholder="City. ." class="form-control"
                                id="birth_place">
                        </div>
                    </div>
                </div>
                <hr>
                <h4>Address</h4>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="sr-only" for="present_address">Present Address</label>
                            <textarea value='' name="present_address" placeholder="Present address..." class="form-control"
                                id="present_address">{{ old('present_address') }}</textarea>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="sr-only" for="permanent_address">Permanent Address</label>
                            <textarea value='{{ old('permanent_address') }}' name="permanent_address" placeholder="Permanent address..." class="form-control"
                                id="permanent_address"></textarea>
                        </div>
                    </div>
                </div>
                <hr>
                <h4>Contact Information</h4>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label class="sr-only" for="mobile_number">Mobile Number</label>
                            <input value='{{ old('mobile_number') }}' type="text" name="mobile_number" placeholder="Mobile Number..."
                                class="mobile_number form-control" id="mobile_number">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label class="sr-only" for="personal_email">Personal Email</label>
                            <input value='{{ old('personal_email') }}' type="email" name="personal_email" placeholder="Personal Email..."
                                class="form-control" id="personal_email">
                        </div>
                    </div>
                </div>
                <div class="">
                    <a href="#" class="btn btn-next width-50 ml-auto">Next</a>
                </div>
            </div>
            <div class="form-step">
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="" for="company_email">Company Email</label>
                            <input value='{{ old('company_email') }}' type="email" name="company_email" placeholder="Company Email..."
                                class="form-control" id="company_email">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="" for="company">Company</label>
                            <select class="form-control" name="company" id="company">
                                <option value="">-Select Company-</option>
                                @foreach ($companies as $company)
                                    <option value="{{ $company->company_code }}" {{ old('company') == $company->company_code ? 'selected' : '' }}>
                                        {{ $company->company_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="" for="department">Department</label>
                            <select class="form-control" value='{{ old('department') }}' name="department" id="department">
                                <option value="">-Select Department-</option>
                                @foreach ($departments as $department)
                                    <option value="{{ $department->department_code }}"
                                        {{ old('department') == $department->department_code ? 'selected' : '' }}>
                                        {{ $department->department_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="" for="position">Position</label>
                            <input value='{{ old('position') }}' type="text" name="position" placeholder="Position..." class="form-control"
                                id="position">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="" for="employee_code">Employee Code</label>
                            <input value='{{ old('employee_code') }}' type="text" name="employee_code" placeholder="Employee Code. ."
                                class="form-control" id="employee_code">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="" for="classification">Classification</label>
                            <select value='{{ old('classification') }}' class="form-control" name="classification" id="classification">
                                <option value="">-Select Classification-</option>
                                <option value="Probitionary" {{ old('classification') == 'Probitionary' ? 'selected' : '' }}>Probitionary</option>
                                <option value="Regular" {{ old('classification') == 'Regular' ? 'selected' : '' }}>
                                    Regular
                                </option>
                                <option value="Project Based" {{ old('classification') == 'Project Based' ? 'selected' : '' }}>Project Based
                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="" for="date_hired">Date Hired</label>
                            <input value='{{ old('date_hired', date('Y-m-d')) }}' type="date" name="date_hired" class="date_hired"
                                id="date_hired">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="" for="date_regularized">Date Regularized</label>
                            <input value='{{ old('date_regularized', date('Y-m-d')) }}' type="date" name="date_regularized" class="form-control"
                                id="date_regularized">
                        </div>
                    </div>
                </div>
                <div class="btns-group">
                    <a href="#" class="btn btn-prev">Previous</a>
                    <a href="#" class="btn btn-next">Next</a>
                </div>
            </div>
            <div class="form-step">
                <h4>Profile:</h4>
                <div class="form-group">
                    <label for="exampleInputFile">Profile Picture</label>
                    <div class="input-group">
                        <div class="">
                            <input value='{{ old('upload_image') }}' type="file" class="" id="upload_image" name="upload_image">
                        </div>
                    </div>
                </div>
                <div class="btns-group">
                    <a href="#" class="btn btn-prev">Previous</a>
                    <a href="#" class="btn btn-next">Next</a>
                </div>
            </div>
            <div class="form-step">
                <div class="row">
                    <div class="col-md-6">
                        <div class="input-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" id="password" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="input-group">
                            <label for="password_confirmation">Confirm Password</label>
                            <input type="password" name="password_confirmation" id="password_confirmation" />
                        </div>
                    </div>
                </div>
                <div class="btns-group">
                    <a href="#" class="btn btn-prev">Previous</a>
                    <button type="submit" value="Submit" class="btn">Submit</button>
                </div>
            </div>
        </form>
    </div>
@endsection
