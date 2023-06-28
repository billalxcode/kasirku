<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    function __construct()
    {
        $this->middleware('role:owner');
    }

    public function index() {
        $user = auth()->user();
        $users = User::whereNot('email', $user->email)->get();

        return view('user.home', [
            'title' => 'Manage users',
            'users' => $users
        ]);
    }

    public function create() {
        $roles = Role::all();

        return view('user.create', [
            'title' => 'Create user',
            'roles' => $roles
        ]);
    }

    public function store(StoreUserRequest $request) {
        $validated = $request->validated();

        $role = Role::findById($validated['role']);

        $user = User::create([
            'username' => $validated['username'],
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => bcrypt($validated['password'])
        ]);
        $user->assignRole($role);

        return redirect()->back()->with('success', 'User has been saved.');
    }

    public function destroy($id) {
        $user = User::find($id);

        if ($user->exists) {
            $user->delete();

            return redirect()->back()->with('success', 'User ' . $user->name . ' has been deleted');
        } else {
            return redirect()->back()->with('error', 'User ' . $user->name . ' cannot delete :(');
        }
    }
}
