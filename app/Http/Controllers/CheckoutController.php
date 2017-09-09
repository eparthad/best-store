<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customers;
use App\Shippings;
use Illuminate\Support\Facades\Redirect;
use Session;
use DB;

class CheckoutController extends Controller
{
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
        $customer = new Customers();
        $customer->first_name = $request->first_name;
        $customer->last_name = $request->last_name;
        $customer->email = $request->email;
        $customer->password = $request->password;
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
        $shippingAddress = Customers::where('id',$customerID)->first();
        return view('frontEnd.cart.shipping',['shippingAddress'=>$shippingAddress]);

    }

    public function saveShipping(Request $request)
    {
        $shipping = new shippings();
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
        echo 'ok';
    }

}
