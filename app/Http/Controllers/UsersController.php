<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UsersController extends Controller
{

    public function index()
    {
        $admin = User::where('role_id' , '1')->get();
        return view('Users.admin' , ['admin' => $admin]);
    }

    public function teacher()
    {
        $teachers = User::where('role_id' , '2')->get();
        return view('Users.teacher' , ['teachers' => $teachers]);
    }

    public function student()
    {
        $students = User::where('role_id' , '3')->get();
        return view('Users.student' , ['students' => $students]);
    }

    public function userRegister()
    {
        return view('Users.register');
    }

    public function store(Request $request)
    {

        Validator::make($request->all(), [

            'name'                  =>  ['required'],
            'email'                 =>  ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password'              =>  ['required', 'string', 'max:255'],
            'role'                  =>  ['required'],
        ], [
            'name.required'         => 'Name is Required',
            'email.required'        => 'Email is Required',
            'password.required'     => 'Password is Required',
            'role.required'         => 'Role is Required',

        ])->validate();

        $userData = [

            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => Hash::make($request['password']),
            'role_id' => $request->get('role'),

        ];

        $store =  User::storeUser($userData);

        if(!empty($store))
        {
            return redirect()->back()->with('success' , 'User Has Been Created Successfully!');
        }
    }

    public function edit($id)
    {
        $editAdmin = User::find($id);
        return view('Users.edit' , ['editAdmin' => $editAdmin]);
    }

    public function update(Request $request , $id)
    {
        Validator::make($request->all(), [

            'name'                  =>  ['required'],
            'email'                 =>  ['required', 'string', 'email', 'max:255'],
            'role'                  =>  ['required'],
        ], [
            'name.required'         => 'Name is Required',
            'email.required'        => 'Email is Required',
            'role.required'         => 'Role is Required',

        ])->validate();

        $userupdate = [

            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'role_id' => $request->get('role'),

        ];

        $update =  User::updateUser($userupdate , $id);

        if(!empty($update))
        {
            return redirect()->back()->with('success' , 'User Has Been Updated Successfully!');
        }

    }

    public function destroy($id)
    {
        $delele_user_admin_record = User::where('id' , $id)
                                    ->delete();

        return redirect()->back()->with('success' , 'Record Has Been Deleted Successfully!');
    }
}
