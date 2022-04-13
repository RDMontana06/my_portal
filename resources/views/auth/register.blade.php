@extends('layouts.app_register')

@section('content')

<main class="container mt-3 pt-5">
        

        <form class="wizard" method="post" action='saveEmployee' onsubmit="show();return false;" enctype="multipart/form-data">
        {{ csrf_field() }}
            
            <aside class="wizard-content container">
                <div class="wizard-step">
                <h1 class="lead">Tell us who you are:</h1>
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label class="" for="first_name">First name</label>
                                <input value='{{old('first_name')}}' type="text" name="first_name" class="f1-first-name form-control required" id="f1-first-name">
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label class="" for="middle_name">Middle name</label>
                                <input value='{{old('middle_name')}}' type="text" name="middle_name" class="f1-last-name form-control required" id="middle_name">
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label class="" for="middle_initial">Middle Initial</label>
                                <input value='{{old('middle_initial')}}' type="text" name="middle_initial"class="f1-last-name form-control required" id="middle_initial">
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label class="" for="last_name">Last name</label>
                                <input value='{{old('last_name')}}' type="text" name="last_name" class="f1-last-name form-control required" id="last_name">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label class="" for="suffix">Suffix</label>
                                <input value='{{old('suffix')}}' type="text" name="suffix"  class="f1-suffix form-control" id="suffix">
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label class="" for="nickname">Nickname</label>
                                <input value='{{old('nickname')}}' type="text" name="nickname"  class="f1-nick-name form-control" id="nickname">
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label class="" for="gender">Gender</label>
                                <select value='{{old('gender')}}' class="form-control gender required" name="gender" id="gender">
                                    <option value="">-Select Gender</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label class="" for="gender">Marital Status</label>
                                <select value='{{old('marital_status')}}' class="form-control gender required" name="marital_status" id="marital_status">
                                    <option value="">-Select Marital Status-</option>
                                    <option value="Single">Single</option>
                                    <option value="Married">Married</option>
                                    <option value="Widowed">Widowed</option>
                                    <option value="Separated">Separated</option>
                                    <option value="Divorced">Divorced</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <h1 class="lead">Birth Information:</h1>
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label class="" for="birth_date">Birth Date</label>
                                <input value='{{old('birth_date')}}' type="date" name="birth_date"  class="f1-birth-date form-control required" max='<?php echo date('Y-m-d')?>' id="birth_date">
                            </div>
                        </div>
                            <div class="col-sm-3">
                            <div class="form-group">
                                <label class="" for="birth_place">Birth Place</label>
                                <input value='{{old('birth_place')}}' type="text" name="birth_place"  placeholder="City. ." class="f1-birth-place form-control required" id="birth_place">
                            </div>
                        </div>
                    </div>
                    <hr>
                    <h1 class="lead">Address:</h1>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="sr-only" for="present_address">Present Address</label>
                                <textarea value='{{old('present_address')}}' name="present_address" placeholder="Present address..." class="present_address form-control required" id="present_address"></textarea>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="sr-only" for="permanent_address">Permanent Address</label>
                                <textarea value='{{old('permanent_address')}}' name="permanent_address" placeholder="Permanent address..." class="permanent_address required form-control" id="permanent_address"></textarea>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <h1 class="lead">Contact Information:</h1>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="sr-only" for="mobile_number">Mobile Number</label>
                                <input value='{{old('mobile_number')}}' type="text" name="mobile_number" placeholder="Mobile Number..." class="mobile_number required form-control" id="mobile_number">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="sr-only" for="personal_email">Personal Email</label>
                                <input value='{{old('personal_email')}}' type="email" name="personal_email" placeholder="Personal Email..." class="personal_email required form-control" id="personal_email">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="wizard-step">
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label class="" for="company_email">Company Email</label>
                                <input value='{{old('company_email')}}' type="email" name="company_email" placeholder="Company Email..." class="email form-control required" id="company_email">
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label class="" for="company">Company</label>
                                <select value='{{old('company')}}' class="form-control required company" name="company" id="company">
                                    <option value="">-Select Company-</option>
                                    @foreach($companies as $company)
                                        @if($company->status == 'Active')
                                            <option value="{{ $company->code}}">{{ $company->descs}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label class="" for="department">Department</label>
                                <select class="form-control required department" value='{{old('department')}}' name="department" id="department">
                                    <option value="">-Select Department-</option>
                                    @foreach($departments as $department)
                                        @if($department->status == 'Active')
                                            <option value="{{ $department->code}}">{{ $department->descs}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label class="" for="position">Position</label>
                                <input value='{{old('position')}}' type="text" name="position" placeholder="Position..." class="position form-control required" id="position">
                            </div>
                        </div>
                    </div>
                    
                    
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label class="" for="employee_code">Employee Code</label>
                                <input value='{{old('employee_code')}}' type="text" name="employee_code" placeholder="Employee Code. ." class="employee_code form-control required" id="employee_code">
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label class="" for="classification">Classification</label>
                                    <select value='{{old('classification')}}' class="form-control required classification" name="classification" id="classification">
                                        <option value="">-Select Classification-</option>
                                        <option value="Single">Probitionary</option>
                                        <option value="Married">Regular</option>
                                        <option value="Widowed">Project Based</option>
                                    </select>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label class="" for="date_hired">Date Hired</label>
                                <input value='{{old('date_hired')}}' type="date" name="date_hired" class="date_hired form-control required" id="date_hired">
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label class="" for="date_regularized">Date Regularized</label>
                                <input value='{{old('date_regularized')}}' type="date" name="date_regularized"  class="date_regularized form-control" id="date_regularized">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="wizard-step">
                    <h4>Profile:</h4>
                    <div class="form-group">
                        <label for="exampleInputFile">Profile Picture</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input  value='{{old('upload_image')}}' type="file" class="custom-file-input" id="upload_image" name="upload_image">
                            </div>
                        </div>
                    </div>
                </div>

                {{-- <div class="wizard-step">
                    <div class="form-group">
                        <label for="titleNoti">Action</label>
                        <textarea class="form-control required fetch-info">🍍</textarea>
                        
                    </div>
                </div> --}}
                {{-- <button type="submit" class="btn btn-success">Save</button> --}}
            </aside>
        </form>
    </main>
@endsection
