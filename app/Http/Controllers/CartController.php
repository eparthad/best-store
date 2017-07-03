<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Customers;
use Cart;
use DB;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add_to_cart($productId,Request $request)
    {
//        $productId = $request->productId;

        if($request->quantity == NULL)
        {
            $qty = 1;

        }else{
            $qty = $request->quantity;
        }

        $productInfo=DB::table('products')
                                ->where('id',$productId)
                                ->first();

        Cart::add(['id' => $productInfo->id, 'name' => $productInfo->productName, 'qty' =>$qty, 'price' =>$productInfo->productPrice, 'options' => ['image' => $productInfo->productImage,'totalQty'=>$productInfo->productQuantity]]);

        return redirect('/cart/show');
    }


    /**
     * Display a cart.
     *
     *
     */

    public function showCart()
    {
        return view('frontend.cart.cart');
    }



    /**
     * Update the cart.
     *
     *
     */

    public function update_cart(Request $request)
    {
        $row_id = $request->rowId;
        $qty = $request->quantity;

        Cart::update($row_id, $qty);
        return redirect('/cart/show')->with('message','Item Updated Successfully.');
    }


    /**
     * Delete a item from cart.
     *
     *
     */

    public function delete_to_cart($rowId)
    {
        Cart::remove($rowId);
        return redirect('/cart/show')->with('message','Item Deleted Successfully.');
    }

    /**
     * Check Out With Customer Information
     *
     *
     */

    public function checkOut()
    {
        return view('frontEnd.cart.checkout');
    }


    /**
     * Check Email Address Exit Or Not
     *
     *
     */

    public function ajaxEmailCheck($email)
    {
        $checkEmail = DB::table('Customers')
                            ->where('email', $email)
                            ->first();
//        var_dump($checkEmail);

        if($checkEmail == NULL){
            echo "Email Address Is Available";
        }else{
            echo $email." already exit.";
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
