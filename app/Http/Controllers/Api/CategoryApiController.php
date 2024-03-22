<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryApiController extends Controller
{
    public function index()
    {
        $allCategories = Category::all();
        // dd($allCategories);
        // return response()->json($allCategories);
        return CategoryResource::collection($allCategories);
    }
}
