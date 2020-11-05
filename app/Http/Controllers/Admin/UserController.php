<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{

    public function index()
    {
        $users = User::orderBy('id', 'desc')->get();
        return view('backend.users.index')->with('users', $users);
    }

    public function create()
    {

    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'phone' => ['required', 'max:12'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $password = Hash::make($request->password);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->password = $password;
        $user->avatar = $request->avatar;
        $user->role_id = $request->role_id;
        $user->save();
        return Redirect::back()->with('success', 'A user has been created.');

    }

    public function show($id)
    {
        $user = User::find($id);
        return view('backend.users.view')->with('user', $user);
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('backend.users.edit')->with('user', $user);
    }

    public function update(Request $request, $id)
    {

        $emiail = User::where('email', $request->email)->first();

        $user = User::find($id);
        $user->name = $request->name;
        if ($emiail == null) {
            $user->email = $request->email;
        }
        if ($request->password != null Or $request->confirm_password != null) {
            $password = Hash::make($request->password);
            $user->password = $password;
        }
        $user->phone = $request->phone;
        $user->role_id = $request->role_id;
        if ($request->avatar != null) {
            $user->avatar = $request->avatar;
        }
        $user->save();
        return Redirect::back()->with('user', $user)->with('success', 'A user has been updated.');
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return Redirect::back()->with('success', 'A user has been deleted.');
    }
}
