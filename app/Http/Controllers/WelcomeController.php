<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Session;

class WelcomeController extends Controller
{
    public function index(){
        $products = Product::where('publicationStatus',1)->get();
        return view('frontEnd.home.homeContent',['products'=>$products]);
    }

    public function category($id){
        $publishCategoryProduct = Product::where('categoryId',$id)
                                        ->where('publicationStatus',1)
                                        ->get();

        Session::flash('message','No Product found.');
        return view('frontEnd.category.categoryContent', ['publishCategoryProduct' => $publishCategoryProduct]);
    }


    public function productDetails($id)
    {
        $productDetails = Product::where('id',$id)
                                    ->where('publicationStatus',1)
                                    ->first();
        return view('frontEnd.product.productContent',['productDetails'=>$productDetails]);
    }


}
