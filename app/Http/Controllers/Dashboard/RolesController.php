<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\RolesRequest;
use App\Models\Role;
use Illuminate\Http\Request;

class RolesController extends Controller
{
    //    public function __construct()
    //    {
    //        $this->middleware('can:groups_dashboard', ['only' => ['index']]);
    //        $this->middleware('can:groups_dashboard_create', ['only' => ['create', 'saveRole']]);
    //        $this->middleware('can:groups_dashboard_edit', ['only' => ['edit', 'update']]);
    //
    //    }

    public function index()
    {
        $roles = Role::get(); // use pagination and  add custom pagination on index.blade

        return view('dashboard.roles.index', compact('roles'));
    }

    public function create()
    {
        return view('dashboard.roles.create');
    }

    public function saveRole(RolesRequest $request)
    {

        try {

            $role = $this->process(new Role, $request);
            if ($role) {
                return redirect()->route('roles.index')->with(['success' => 'Create Successful']);
            } else {
                return redirect()->route('roles.index')->with(['error' => 'There is a problem, try later']);
            }
        } catch (\Exception $ex) {
            return $ex;

            // return message for unhandled exception
            return redirect()->route('roles.index')->with(['error' => 'There is a problem, try later']);
        }
    }

    public function edit($id)
    {
        $role = Role::findOrFail($id);

        return view('dashboard.roles.edit', compact('role'));
    }

    public function update($id, RolesRequest $request)
    {
        try {

            $role = Role::findOrFail($id);
            $role = $this->process($role, $request);
            if ($role) {

                return redirect()->route('roles.index')->with(['success' => 'Update Successful']);

            } else {
                return redirect()->route('roles.index')->with(['error' => 'There is a problem, try later']);
            }
        } catch (\Exception $ex) {
            // return message for unhandled exception
            return redirect()->route('roles.index')->with(['error' => 'There is a problem, try later']);
        }
    }

    public function destroy($id)
    {
        $role = Role::find($id);
        if ($role->admins() != null) {
            $role->admins()->delete();
        }
        $role->delete();

        return redirect()->back()->with(['success' => 'Delete Successful']);
    }

    protected function process(Role $role, Request $r)
    {

        $role->name = $r->name;
        $role->permissions = json_encode($r->permissions);
        $role->save();

        return $role;
    }
}
