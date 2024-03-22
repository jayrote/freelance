<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class UserApiController extends Controller
{
    public function createUser(Request $request)
    {
        try {
            // Start a database transaction
            DB::beginTransaction();

            // Validate the request data
            $validationData = $request->validate([
                'name' => 'required',
                'email' => 'required|unique:users',
                'phone_number' => 'required',
                'password' => 'required',
                'gender' => 'required',
                'status' => 'integer',
                'dob' => 'required',
                'type' => 'required',
                'skills' => 'required',
                'image' => 'required',
            ]);

            // Create a new User instance
            $user = new User();

            // Populate user data
            $user->name = $validationData['name'];
            $user->email = $validationData['email'];
            $user->phone_number = $validationData['phone_number'];
            $user->password = Hash::make($validationData['password']);
            $user->gender = $validationData['gender'];
            $user->dob = $validationData['dob'];
            $user->type = $validationData['type'];
            $user->status = $validationData['status'];
            $user->skills = $validationData['skills'];

            // Save image
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $fileName = time() . '_' . $file->getClientOriginalName();
                $file->storeAs('uploads', $fileName, ['disk' => 'public']);
                $user->image = $fileName;
            }

            // Save the user
            $user->save();

            // Get the role ID for the 'User' role (replace 'User' with your desired role name)
            $roleId = Role::where('name', 'User')->first()->id;

            // Sync the user's roles in the pivot table
            $user->roles()->sync($roleId);

            // Commit the transaction if everything is successful
            DB::commit();

            return response()->json(['message' => 'User created successfully']);
        } catch (\Exception $e) {
            // Rollback the transaction if an error occurs
            DB::rollback();

            // Handle the exception (log it, return an error response, etc.)
            return response()->json(['error' => 'Error creating user: ' . $e->getMessage()], 500);
        }
    }

    public function getSingleUSer()
    {
        $user = auth()->user();
        // dd($user);
        return response()->json($user);
    }

    public function login(Request $request)
    {
        $credentials = $request->only(['email', 'password']);

        $user = User::where('email', $credentials['email'])->first();

        if ($user && Hash::check($credentials['password'], $user->password)) {
            $token = $user->createToken('API Token')->plainTextToken;
            return response()->json(['message' => 'Login successful', 'token' => $token]);
        }

        return response()->json(['message' => 'Login failed'], 401);
    }

    public function deleteUser()
    {
        $user = auth()->user();

        // dd($user);

        $user->delete();
        return response()->json(['message' => 'User Deleted!!']);
    }

    public function switchUser()
    {

        $user = auth()->user();

        if ($user->type === 'Buyer') {
            $user->type = 'Seller';
        } elseif ($user->type === 'Seller') {
            $user->type = 'Buyer';
        }

        $user->save();

        // Create the API token
        $res = $user->createToken('API Token')->plainTextToken;
        return response()->json(['message' => 'User switched sucessfully!!', 'token' => $res, 'user_type' => $user->type]);
    }


    public function updateUser(Request $request)
    {
        $user = auth()->user();
        //dd($user);

        // Check if the user is authenticated
        $user->name = $request['name'];
        $user->email = $request['email'];
        $user->phone_number = $request['phone_number'];
        $user->password = $request['password'];
        $user->gender = $request['gender'];
        $user->dob = $request['dob'];
        $user->status = $request['status'];
        $user->skills = $request['skills'];

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('uploads', $fileName, ['disk' => 'public']);
            $user->image = $fileName;
        }
        $user->save();

        return response()->json(['message' => 'User Updated!!']);
    }
}
