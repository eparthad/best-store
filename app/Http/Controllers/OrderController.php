<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\Customer;
use App\Shipping;
use App\Payment;
use DB;

class OrderController extends Controller
{
    public function manage_order()
    {
        $order_info = DB::table('orders')
                        ->join('customers','customers.id','=','orders.customer_id')
                        ->select('orders.*','customers.first_name','customers.last_name')
                        ->get();
        $order_info = json_decode($order_info, true);
//        var_dump($order_info);

        return view('admin.order.manageOrder',['order_info'=>$order_info]);
    }

    public function view_invoice($id)
    {
        $order_info = DB::table('orders')
                        ->join('customers','customers.id','=','orders.customer_id')
                        ->join('payments','payments.payment_id','=','orders.payment_id')
                        ->where('orders.id',$id)
                        ->select('orders.*','payments.payment_type','customers.first_name','customers.last_name','customers.email',                                   'customers.company_name','customers.address','customers.mobile','customers.city','customers.zip_code',
                            'customers.country')
                        ->first();
//        $order_info = json_decode($order_info, true);

        $shipping_info = DB::table('orders')

                            ->join('shippings','orders.shipping_id','=','shippings.shipping_id')
                            ->where('orders.id',$id)
                            ->select('orders.id','shippings.*')
                            ->first();


        $order_details = DB::table('order_details')
                        ->where('order_id',$id)
                        ->get();
        $order_details = json_decode($order_details, true);

        return view('admin.order.viewOrder',['order_info'=>$order_info,'shipping_info'=>$shipping_info,'order_details'=>$order_details]);

    }

    public function editOrder($id)
    {

        $order_info = DB::table('orders')
            ->join('customers','customers.id','=','orders.customer_id')
            ->join('payments','payments.payment_id','=','orders.payment_id')
            ->where('orders.id',$id)
            ->select('orders.*','payments.payment_type','customers.first_name','customers.last_name','customers.email',                                   'customers.company_name','customers.address','customers.mobile','customers.city','customers.zip_code',
                'customers.country')
            ->first();
//        $order_info = json_decode($order_info, true);


        $order_details = DB::table('order_details')
            ->where('order_id',$id)
            ->get();
        $order_details = json_decode($order_details, true);

        return view('admin.order.editOrder',['order_info'=>$order_info,'order_details'=>$order_details]);

    }

    public function updateOrder(Request $request)
    {
        $this->validate($request,[
            'orderStatus'=>'required',
        ]);

        $orders = Order::find($request->order_id);
        $orders->order_status = $request->orderStatus;
        $orders->save();

        return redirect('/manage-order')->with('message','Order Updated Successfully');

    }


    public function deleteOrder($id)
    {
        $deleteOrder = Order::find($id);
        $deleteOrder->delete();

        $deleteOrderdetails = DB::table('order_details')->where('order_id',$id)->delete();

        return redirect('/manage-order')->with('message','Order Deleted Successfully');
    }
}
