<?php

namespace App\Http\Controllers;

use GuzzleHttp\Exception\GuzzleException;
use Validator;
use GuzzleHttp\Client;
use App\Employee;
use App\User;
use App\Company;
use App\Department;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;

class RegisterController extends Controller
{
    //
    public function register()
    {

        $companies = Company::all();
        $departments = Department::all();

        // dd($departments);
        return view('auth.register', array(
            'companies' => $companies,
            'departments' => $departments,
        ));
    }
    public function saveEmployee(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'employee_code' => 'unique:employees|required',
            'first_name' => 'required',
            'last_name' => 'required',
            'company' => 'required',
            'department' => 'required',
            'date_hired' => 'required',
            'date_regularized' => 'required',
            'birth_date' => 'required',
            'birth_place' => 'required',
            'gender' => 'required',
            'marital_status' => 'required',
            'position' => 'required',
            'classification' => 'required',
            'present_address' => 'required',
            'permanent_address' => 'required',
            'mobile_number' => 'required',
            'personal_email' => 'email|unique:employees',
            'company_email' => 'email|unique:employees',
            'upload_image' => 'required|mimes:jpeg,jpg,bmp,png',
            'password' =>  'required|min:6|confirmed',
            'password_confirmation' =>  'same:password'
        ]);
        if ($validator->fails()) {
            return redirect('/signup')
                ->withErrors($validator)
                ->withInput();
        }

        $employee = new Employee;
        $employee->employee_code = $request->employee_code;
        $employee->first_name = $request->first_name;
        $employee->middle_name = $request->middle_name;
        $employee->middle_initial = $request->middle_initial;
        $employee->last_name = $request->last_name;
        $employee->suffix = $request->suffix;
        $employee->nickname = $request->nickname;
        $employee->company = $request->company;
        $employee->department = $request->department;
        $employee->date_hired = $request->date_hired;
        $employee->date_regularized = $request->date_regularized;
        $employee->birth_date = $request->birth_date;
        $employee->birth_place = $request->birth_place;
        $employee->gender = $request->gender;
        $employee->marital_status = $request->marital_status;
        $employee->position = $request->position;
        $employee->classification = $request->classification;
        $employee->present_address = $request->present_address;
        $employee->permanent_address = $request->permanent_address;
        $employee->mobile_number = $request->mobile_number;
        $employee->personal_email = $request->personal_email;
        $employee->company_email = $request->company_email;


        $attachment = $request->file('upload_image');
        $original_name = $attachment->getClientOriginalName();
        $name = time() . '_' . $attachment->getClientOriginalName();
        $attachment->move(public_path() . '/users/', $name);
        $file_name = '/users/' . $name;

        $employee->upload_image = $file_name;

        $employee->save();

        $user = new User;
        $user->email = $employee->company_email;
        $user->name = $employee->first_name . " " . $employee->last_name;
        $user->password = Hash::make($request->password);
        $user->role_id = 2;
        $user->save();


        Alert::success('Successfully Register', 'Email:' . $user->email)->persistent('Dismiss');
        return redirect('/login');
    }
}
