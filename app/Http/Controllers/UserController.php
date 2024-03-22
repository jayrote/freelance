<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $allUser = User::all();
        return view('admin.user.index', compact('allUser'));
    }


    public function editProfile()
    {
        return view('admin.profileEdit');
    }


    public function updateProfile(Request $request)
    {
        $user = auth()->user();

        $user->name = $request['name'];
        $user->email = $request['email'];

        if ($request->hasFile('image')) {
            // dd('image');
            $file = $request->file('image');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('uploads', $fileName, ['disk' => 'public']);
            $user->image = $fileName;
        }
        // dd('no image');

        $user->save();
        return redirect('/dashboard');
    }

    public function changePassword(Request $request)
    {
        $ans = $request->validate(
            [
                'password' => 'required',
                'new_password' => 'required',
                'confirm_password' => 'required|same:new_password'
            ]
        );
        // dd($ans);

        $user = auth()->user();
        if (!Hash::check($request['password'], $user->password)) {
            throw ValidationException::withMessages(['password' => 'Old Password is incorrect!!']);
        }
        if ($request['new_password'] !== $request['confirm_password']) {
            throw ValidationException::withMessages(['confirm_password' => 'Password is not matched!!']);
        }

        $user->update(['password' => Hash::make($request['new_password'])]);

        return response()->json(['msg' => 'password change sucessfully']);
    }

    public function checkEmail()
    {
        return view('admin.checkEmail');
    }

    public function authenticateUserbyEmail(Request $request)
    {
        $email = $request->email;

        $user = User::where('email', $email)->first();

        if ($user) {
            session(['reset_email' => $user->email]);
            return view('admin.forgotPassword');
        } else {
            return response()->json(['msg' => 'User is not available']);
        }
    }

    public function forgotPassword(Request $request)
    {
        // Get the user's email from the session or request
        $email = session('reset_email') ?? $request->email;

        // Retrieve the user based on the email
        $user = User::where('email', $email)->first();

        if (!$user) {
            return response()->json(['msg' => 'User not found']);
        }

        // Now you have the user, proceed with password reset logic
        $password = $request->password;
        $newPassword = $request->confirm_password;

        if ($password == $newPassword) {

            $user->password = bcrypt($password);
            $user->save();

            // Optionally, log in the user after password reset 
            // Auth::login($user);

            return redirect('/');
        } else {
            return response()->json(['msg' => 'Passwords do not match']);
        }
    }
}
