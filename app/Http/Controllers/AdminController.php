<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Product;
use App\Sellers;
use App\Orders;

class AdminController extends Controller
{
    public function index()
    {
        $product = Product::all()->count();
        $sellers = Sellers::all()->count();
        $users = User::all()->count();
        $order = 10348;
        return view('admin.index', compact('product','sellers','users','order'));
    }
}
