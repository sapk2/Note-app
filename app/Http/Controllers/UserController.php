<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function index()
    {
        $user = User::all();
        return view('admin.users.index', compact('user'));
    }

    /* public function create()
    {
        return view('users.create');

    }*/

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
        ]);
        user::create($request->all());
        return redirect()->route('admin.users.index')->with('sucessfully stored!!');
    }

    public function edit(string $id)
    {
        $user = User::findorfail($id);
        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'role' => 'required',

        ]);
        $user = User::findorfail($id);
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
        ]);
        return redirect()->route('admin.users.index')->with('sucsessfully updated');
    }

    public function delete(string $id)
    {

        $user = User::findorfail($id);
        $user->delete();
        return redirect()->route('admin.users.index')->with('sucsessfully updated');
    }
}
