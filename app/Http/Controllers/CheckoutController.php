<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use App\Shipping;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Session;
use DB;
use Cart;

class CheckoutController extends Controller
{

    /*
        Login proccess. This is use only when customer is not register.
    */

    public function loginCustomer(Request $request)
    {
        $customerEmail = $request->email;
        $customerPassword = $request->password;

        $query = DB::table('Customers')
                    ->where('email', $customerEmail)
                    ->first();
        if($query && Hash::check($customerPassword, $query->password)){
            $lastCustomerId = $query->id;
            Session::put('lastCustomerId',$lastCustomerId);
            return Redirect::to('/shipping-address');
        }else{
            return redirect('/check-out')->with('message', 'Wrong Password. Try again.');
        }
    }


    /*
        This is use in user registration for checking user's email exit or not.

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

    public function ajaxPassCheck($pass, $passAgain)
    {
        if($pass === $passAgain){
            echo "Password Match";
        }elseif($pass !== $passAgain){
            echo "Password Does not Match";
        }
    }




    public function saveCustomer(Request $request)
    {
        $customer = new Customer();
        $customer->first_name = $request->first_name;
        $customer->last_name = $request->last_name;
        $customer->email = $request->email;
        $customer->password = Hash::make($request->password);
        $customer->company_name = $request->company_name;
        $customer->address = $request->address;
        $customer->mobile = $request->mobile;
        $customer->city = $request->city;
        $customer->zip_code = $request->zip_code;
        $customer->country = $request->country;
        $customer->save();

        $lastCustomerId = $customer->id;
//        echo $lastCustomerId;
        Session::put('lastCustomerId',$lastCustomerId);
        return Redirect::to('/shipping-address');
    }

    public function shippingAddress()
    {
        $customerID = Session::get('lastCustomerId');
        if($customerID == false){
            return redirect('/cart/show')->with('message','No Product In Cart.');
        }else{
            $shippingAddress = Customer::where('id',$customerID)->first();
            return view('frontEnd.cart.shipping',['shippingAddress'=>$shippingAddress]);
        }


    }

    public function saveShipping(Request $request)
    {
        $shipping = new shipping();
        $shipping->first_name = $request->first_name;
        $shipping->last_name = $request->last_name;
        $shipping->email = $request->email;
        $shipping->company_name = $request->company_name;
        $shipping->address = $request->address;
        $shipping->mobile = $request->mobile;
        $shipping->city = $request->city;
        $shipping->zip_code = $request->zip_code;
        $shipping->country = $request->country;
        $shipping->save();

        $shippingId = $shipping->id;
//        echo $lastCustomerId;
        Session::put('shippingId',$shippingId);
        return Redirect::to('/payment');
    }

    public function payment()
    {
        return view('frontEnd.cart.payment');
    }

    public function placeOrder(Request $request)
    {
        $payment_type = $request->payment_type;

        $data['payment_type'] = $payment_type;
        $data['created_at'] = Carbon::now('Asia/Dhaka');
        $payment_id = DB::table('payments')->insertGetId($data);


        /*
         * Save Order
         * */
        $contents = Cart::content();
        $total = 0;
        $num_item = count($contents);
        foreach($contents as $content){
            $item_total = $content->price * $content->qty; $total = $total + $item_total;
        }


        $odata = array();
        $odata['customer_id']=Session::get('lastCustomerId');
        $odata['shipping_id']=Session::get('shippingId');
        $odata['payment_id']=$payment_id;
        $odata['order_total']=$total;
        $odata['created_at'] = Carbon::now('Asia/Dhaka');
        $order_id = DB::table('orders')->insertGetId($odata);

        /*
         * End of save Order
         * */

        /*
         * Start Order Details
         * */
        $oddata = array();
        $contents = Cart::content();

        foreach($contents as $content)
        {
            $oddata['order_id'] = $order_id;
            $oddata['product_id'] = $content->id;
            $oddata['product_name'] = $content->name;
            $oddata['product_price'] = $content->price;
            $oddata['product_sales_quantity'] = $content->qty;
            $oddata['created_at'] = Carbon::now('Asia/Dhaka');

            DB::table('order_details')->insert($oddata);


        }



        /*
         * End Order Details
         * */

        if($payment_type == "cash_on_delivery")
        {
            Cart::destroy();
            return redirect::to('/order-successfull');
        }elseif($payment_type == "paypal")
        {
            return view('frontEnd.cart.htmlWebsiteStandardPayment');
        }
    }

    public function order_successfull()
    {
        return view('frontEnd.cart.successfull');
    }


    public function logout(){
        Session::forget('lastCustomerId');

        return redirect::to('/');
    }

}
