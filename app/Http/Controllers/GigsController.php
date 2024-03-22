<?php

namespace App\Http\Controllers;

use App\Models\Gigs;
use Illuminate\Http\Request;

class GigsController extends Controller
{
    public function index()
        {
            $allGigs = Gigs::all();
            return view('admin.gigs',compact('allGigs'));
        }
}
