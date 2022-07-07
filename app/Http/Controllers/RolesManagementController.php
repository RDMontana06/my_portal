<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Roles;

class RolesManagementController extends Controller
{
    //
    public function index()
    {
        $roles = Roles::All();
        return view('rolesmanagement.index', array(
            'roles' => $roles
        ));
    }
    public function new_role(Request $request)
    {
        // dd($request);
        $this->validate($request, [
            'role_name' => 'required',
        ]);

        $roles = new Roles;
        $roles->name = $request->role_name;
        $roles->save();
        Alert::success('Successfully Created', 'Role Name ' . $roles->name)->persistent('Dismiss');
        return back();
    }
}
