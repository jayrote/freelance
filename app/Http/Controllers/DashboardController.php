<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
        {
            $allCategories = Category::count();
            $ParentCategories = Category::whereNull('category_parent_id')->count();
            $SubCategories = Category::whereNotNull('category_parent_id')->count();
            $allUsers = User::count();
            $authenticateUsers = User::whereNotNull('phone_number')->count();

            return view('admin.index',compact('allCategories','ParentCategories','SubCategories','allUsers','authenticateUsers'));
        }

    public function showProfile()
        {
            $user = auth()->user();
            // dd($user);
            return view('layouts.nav',['user' => $user]);
        }

}
