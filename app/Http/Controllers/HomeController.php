<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\Order;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = count(Category::where('publicationStatus',1)->get());
        $product = count(Product::where('publicationStatus',1)->get());
        $orderPending = count(Order::where('order_status','pending')->get());
        $orderDeliver = count(Order::where('order_status','delivered')->get());
        $orderProcessing = count(Order::where('order_status','processing')->get());
        return view('admin.home.homeContent',['category'=>$category,'product'=>$product,'orderPending'=>$orderPending,'orderProcessing'=>$orderProcessing,'orderDeliver'=>$orderDeliver]);
    }
}
