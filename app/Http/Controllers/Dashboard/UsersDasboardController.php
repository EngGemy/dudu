<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\User_DashboardRequest;
use App\Models\Admin;
use App\Models\Role;
use Illuminate\Http\Request;

class UsersDasboardController extends Controller
{
    //    public function __construct()
    //    {
    //        $this->middleware('can:users_dashboard', ['only' => ['index']]);
    //        $this->middleware('can:users_dashboard_create', ['only' => ['create', 'store']]);
    //        $this->middleware('can:users_dashboard_edit', ['only' => ['edit', 'update']]);
    //        $this->middleware('can:categories_delete', ['only' => ['destroy']]);
    //    }

    public function index()
    {

        $users = Admin::with('role')->latest()->where('id', '<>', auth()->id())->get(); //use pagination here

        return view('dashboard.users.index', compact('users'));
    }

    public function create()
    {
        $roles = Role::get();

        return view('dashboard.users.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $validator = \Illuminate\Support\Facades\Validator::make($request->all(), [
            'username' => 'required|min:2|unique:admins,username,',
            'role_id' => 'required|exists:roles,id',
            'email' => 'required|email|unique:admins,email,',
            'password' => 'required|confirmed|min:8',

        ], [
            'username.required' => 'ادخل اسم المستخدم',
            'username.unique' => 'اسم المستخدم موجود من قبل ',
            'email.required' => 'ادخل البريد الالكتروني',
            'email.email' => 'ادخل البريد الالكتروني بشكل صحيح',
            'email.unique' => 'البريد الالكتروني موجود من قبل ',
            'password.required' => 'ادخل كلمه المرور',
            'password.confirmed' => 'كلمه المرور غير متشابهه',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->with(['username' => $request->username, 'fullName' => $request->fullName, 'email' => $request->email, 'role_id' => $request->role_id])->withInputs($request->all());
        }
        $user = new Admin();
        $user->username = $request->username;

        $user->email = $request->email;
        $user->password = bcrypt($request->password);   // the best place on model
        $user->role_id = $request->role_id;

        // save the new user data
        if ($user->save()) {

            return redirect()->route('users.Dashboard.index')->with(['success' => 'Create Successful']);
        } else {
            return redirect()->route('users.Dashboard.index')->with(['error' => 'There is a problem, try later']);
        }

    }

    public function edit($id)
    {

        $user = Admin::find($id);
        $roles = Role::get();

        return view('dashboard.users.edit', compact('user', 'roles'));

    }

    public function update(User_DashboardRequest $request, $id)
    {
        //validate
        // db

        try {

            $user = Admin::find($id);

            if ($request->has('password')) {
                $request->merge(['password' => bcrypt($request->password)]);
                unset($request['id']);
                unset($request['password_confirmation']);
            }

            $user->update($request->except('token', 'id'));

            return redirect()->route('users.Dashboard.index')->with(['success' => 'Update Successful']);

        } catch (\Exception $ex) {
            return redirect()->back()->with(['error' => 'There is a problem, try later']);

        }

    }

    public function destroy(Request $request, $id)
    {

        $user = Admin::find($id);

        if (! $user) {
            return redirect()->route('users.Dashboard.index')->with(['error' => 'This User Not Found']);
        }

        $user->delete();

        return redirect()->back()->with(['success' => 'Delete Successful']);

    }
}
