<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Role;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{

    public function getRegister()
    {
        return view('signup');
    }

    public function Register(Request $request)
    {
        $validationData = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required',
        ]);

        // Create a new User instance
        $user = new User();

        // Populate user data
        $user->name = $validationData['name'];
        $user->email = $validationData['email'];
        $user->password = Hash::make($validationData['password']);

        // Save the user
        $user->save();

        // Get the role ID for the 'User' role (replace 'User' with your desired role name)
        $roleId = Role::where('name', 'Admin')->first()->id;

        // Sync the user's roles in the pivot table
        $user->roles()->sync($roleId);

        return redirect('/');
    }

    public function logIn(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            $user = User::where('email', $credentials['email'])->first();

            if ($user->hasRole('Admin')) {
                if ($user && Hash::check($credentials['password'], $user->password)) {
                    return redirect('/dashboard');
                } else {
                    return response()->json(['message' => 'LogIn Failed!!', 401]);
                }
            } else {
                return response()->json(['message' => 'You are not Admin!!', 401]);
            }
        } else {
            return redirect('/');
        }
    }
}
