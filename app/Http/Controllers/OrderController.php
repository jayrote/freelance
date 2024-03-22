<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
        {
            $allOrders = Order::all();
            return view('admin.orders',compact('allOrders'));
        }
}
