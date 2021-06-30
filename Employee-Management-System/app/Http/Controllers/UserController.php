<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\User;
class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('Users.index', ['users' => $users]);
    }
    public function create()
    {
        return view('Users.create');
    }

    public function store(Request $request)
    {
        $user = new User();
        $this->validate($request, [
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
        $user -> name = $request -> name;
        $user -> email = $request -> email;
        $user -> password = bcrypt($request -> password);

        $user -> save();

        return redirect()->intended('/users')->with('success','User Added Successfully!');
    }

    public function delete($id)
    {
        User::find($id) -> delete();
        return redirect()->intended('/users')->with('success','User Deleted Successfully!');
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('Users.edit', ['user' => $user]);
    }

    public function update($id, Request $request)
    {
        $user = User::find($id);
        $this->validate($request, [
            'password' => 'required|min:6|confirmed',
        ]);
        $user -> name = $request -> name;
        $user -> email = $request -> email;
        $user -> password = bcrypt($request -> password);
        $user -> save();
        return redirect()->intended('/users')->with('success','User Updated Successfully!');
    }

    public function search(Request $request)
    {
        $results = DB::select('select * from users where  name = :username', ['username' => $request->username]);

        return view('Users.results', compact('results'));
    }


}
