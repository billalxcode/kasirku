<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRoleStoreRequest;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Str;

class UserRoleController extends Controller
{
    public function index() {
        $roles = Role::all();

        return view('user.role.home', [
            'title' => 'Manage role',
            'roles' => $roles
        ]);
    }

    public function store(UserRoleStoreRequest $request) {
        $data = $request->validated();
        $name = Str::lower($data['name']);
        Role::create(['name' => $name]);

        return redirect()->back()->with('success', 'Role has been saved.');
    }

    public function destroy($id) {
        $role = Role::findById($id);
        if ($role->exists) {
            $role->delete();

            return redirect()->back()->with('success', 'Role has been deleted.');
        } else {
            return redirect()->back()->with('error', 'Failed delete role.');
        }
    }
}
