<?php

namespace App\Http\Controllers;

use App\Employee;
use Illuminate\Http\Request;
use App\User;
use App\Roles;
use App\UserRoles;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Hash;


class UsersManagementController extends Controller
{
    //

    public function index()
    {

        $users = User::with('employee', 'user_roles.roles')->get();
        $roles = Roles::all();

        return view('usermanagement.index', array(
            'users' => $users,
            'roles' => $roles
        ));
    }
    public function disable($id)
    {
        User::Where('id', $id)->update(['status' => 0]);
        return back();
    }
    public function activate($id)
    {
        User::Where('id', $id)->update(['status' => 1]);
        return back();
    }
    public function update(Request $request, $id)
    {

        $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required',
            'marital_status' => 'required',
            'present_address' => 'required',
            'permanent_address' => 'required',
            'email' => 'unique:users,email,' . $id . '|required',
            'name' => 'required',
        ]);
        if ($request->role) {
            $userRoleDel = UserRoles::where('user_id', $id)->delete();
            foreach ($request->role as $key => $role) {
                $userRole = new UserRoles;
                $userRole->user_id = $id;
                $userRole->role_id = $role;
                $userRole->save();
            }
        }

        $user =  User::findOrFail($id);
        $user->email = $request->input('email');
        $user->name = $request->input('name');
        $user->save();

        $employee = Employee::where('user_id', $id)->first();
        $employee->first_name = $request->input('first_name');
        $employee->last_name = $request->input('last_name');
        $employee->marital_status = $request->input('marital_status');
        $employee->present_address = $request->input('present_address');
        $employee->permanent_address = $request->input('permanent_address');
        $employee->save();



        Alert::success('Updated', 'Successfully Updated')->persistent('Dismiss');;
        return redirect('user');
    }
    public function changePassword(Request $request, $id)
    {
        $this->validate($request, [
            'password' => 'required|confirmed|min:6',
        ]);

        $user =  User::findOrFail($id);
        $user->password = bcrypt($request->password);
        $user->save();
        Alert::success('Changed', 'Change Successfully')->persistent('Dismiss');;
        return redirect('user');
    }
}
