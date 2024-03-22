<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BillController extends Controller
{
    public function index()
    {
        $allBills = Bill::all();
        // dd($allBills);
        return view('admin.bill', compact('allBills'));
    }

}
