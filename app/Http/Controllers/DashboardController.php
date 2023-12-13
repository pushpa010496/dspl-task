<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $products = Product::orderby('id','desc')->get();
        $product = Product::withCount('sales')->get();
        $lables = [];
        $sales = [];
        foreach($product as $val){
            $lables [] = $val->product_name;
            $sales [] = $val->sales_count;
        }
        return view('dashboard',compact('products','lables','sales'));
    }
}
