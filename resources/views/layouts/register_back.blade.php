 <!-- Top content -->
        <div class="top-content">
            <div class="container">
                
                <div class="row">
                    <div class="col-sm-8 col-sm-offset-2">
                       <img src="{{URL::asset('/images/myPortal-logo.png')}}" alt="AVATAR" width="400">
                    </div>
                </div>
                @include('error')
                <div class="row">
                    <div class="col-sm-12 form-box">
                    	<form method="post" action='saveEmployee' onsubmit="show();return false;" enctype="multipart/form-data" class="f1">
                            {{ csrf_field() }}
                    		<h3>Register To My Portal</h3>
                    		<p>Fill in the form to get instant access</p>
                    		<div class="f1-steps">
                    			<div class="f1-progress">
                    			    <div class="f1-progress-line" data-now-value="16.66" data-number-of-steps="3" style="width: .6166%;"></div>
                    			</div>
                    			<div class="f1-step active">
                    				<div class="f1-step-icon"><i class="fa fa-user"></i></div>
                    				<p>Personal Information</p>
                    			</div>
                    			<div class="f1-step">
                    				<div class="f1-step-icon"><i class="fa fa-building"></i></div>
                    				<p>Company Information</p>
                    			</div>
                    		    <div class="f1-step">
                    				<div class="f1-step-icon"><i class="fa fa-twitter"></i></div>
                    				<p>Data Privacy</p>
                    			</div>
                    		</div>
                    		
                    		<fieldset>
                    		    <h4>Tell us who you are:</h4>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label class="" for="first_name">First name</label>
                                            <input value='{{old('first_name')}}' type="text" name="first_name" class="f1-first-name form-control" id="f1-first-name">
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label class="" for="middle_name">Middle name</label>
                                            <input value='{{old('middle_name')}}' type="text" name="middle_name" class="f1-last-name form-control" id="middle_name">
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label class="" for="middle_initial">Middle Initial</label>
                                            <input value='{{old('middle_initial')}}' type="text" name="middle_initial"class="f1-last-name form-control" id="middle_initial">
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label class="" for="last_name">Last name</label>
                                            <input value='{{old('last_name')}}' type="text" name="last_name" class="f1-last-name form-control" id="last_name">
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
                                            <select value='{{old('gender')}}' class="form-control gender" name="gender" id="gender">
                                                <option value="">-Select Gender</option>
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label class="" for="gender">Marital Status</label>
                                            <select value='{{old('marital_status')}}' class="form-control gender" name="marital_status" id="marital_status">
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
                                <h4>Birth Information</h4>
                                <Br>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label class="" for="birth_date">Birth Date</label>
                                            <input value='{{old('birth_date')}}' type="date" name="birth_date"  class="f1-birth-date form-control" max='<?php echo date('Y-m-d')?>' id="birth_date">
                                        </div>
                                    </div>
                                      <div class="col-sm-3">
                                        <div class="form-group">
                                            <label class="" for="birth_place">Birth Place</label>
                                            <input value='{{old('birth_place')}}' type="text" name="birth_place"  placeholder="City. ." class="f1-birth-place form-control" id="birth_place">
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <h4>Address</h4>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="sr-only" for="present_address">Present Address</label>
                                            <textarea value='{{old('present_address')}}' name="present_address" placeholder="Present address..." class="present_address form-control" id="present_address"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="sr-only" for="permanent_address">Permanent Address</label>
                                            <textarea value='{{old('permanent_address')}}' name="permanent_address" placeholder="Permanent address..." class="permanent_address form-control" id="permanent_address"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <h4>Contact Information</h4>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class="sr-only" for="mobile_number">Mobile Number</label>
                                            <input value='{{old('mobile_number')}}' type="text" name="mobile_number" placeholder="Mobile Number..." class="mobile_number form-control" id="mobile_number">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class="sr-only" for="personal_email">Personal Email</label>
                                            <input value='{{old('personal_email')}}' type="email" name="personal_email" placeholder="Personal Email..." class="personal_email form-control f1-email" id="personal_email">
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="f1-buttons">
                                    <button type="button" class="btn btn-next">Next</button>
                                </div>
                            </fieldset>

                            <fieldset>
                                <h4>Details:</h4>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label class="" for="company_email">Company Email</label>
                                            <input value='{{old('company_email')}}' type="email" name="company_email" placeholder="Company Email..." class="email form-control" id="company_email">
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label class="" for="company">Company</label>
                                            <select value='{{old('company')}}' class="form-control company" name="company" id="company">
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
                                            <select class="form-control department" value='{{old('department')}}' name="department" id="department">
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
                                            <input value='{{old('position')}}' type="text" name="position" placeholder="Position..." class="position form-control" id="position">
                                        </div>
                                    </div>
                                </div>
                                
                                
                               <div class="row">
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label class="" for="employee_code">Employee Code</label>
                                            <input value='{{old('employee_code')}}' type="text" name="employee_code" placeholder="Employee Code. ." class="employee_code form-control" id="employee_code">
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label class="" for="classification">Classification</label>
                                                <select value='{{old('classification')}}' class="form-control classification" name="classification" id="classification">
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
                                            <input value='{{old('date_hired')}}' type="date" name="date_hired" class="date_hired form-control" id="date_hired">
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label class="" for="date_regularized">Date Regularized</label>
                                            <input value='{{old('date_regularized')}}' type="date" name="date_regularized"  class="date_regularized form-control" id="date_regularized">
                                        </div>
                                    </div>
                               </div>
                                <div class="f1-buttons">
                                    <button type="button" class="btn btn-previous">Previous</button>
                                    <button type="button" class="btn btn-next">Next</button>
                                </div>
                            </fieldset>

                            <fieldset>
                                <h4>Profile:</h4>
                                <div class="form-group">
                                    <label for="exampleInputFile">Profile Picture</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input  value='{{old('upload_image')}}' type="file" class="custom-file-input" id="upload_image" name="upload_image">
                                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="f1-buttons">
                                    <button type="button" class="btn btn-previous">Previous</button>
                                    <button type="submit" class="btn btn-success">Save</button>
                                </div>
                            </fieldset>
                    	</form>
                    </div>
                </div>
                    
            </div>
        </div>