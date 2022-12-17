<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate(10);
        return view('pages.user',[
            'users' => $users
        ]);
    }

    public function post(Request $request)
    {
        $request->validate([
            'username' => ['required', 'string', 'min:3', 'alpha_num', 'max:25'],
            'email' => ['required', 'email'],
            'password' => ['required', 'min:8'],
            'confpass' => ['min:8'],
        ]);
        // dd($request->all());
        User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        return redirect('/user');
    }
}
