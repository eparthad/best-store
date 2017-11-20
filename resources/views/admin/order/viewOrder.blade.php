@extends('admin.master')

@section('content')

    <div class="row">
        <div class="col-lg-12">

            <header>
                <h1>Invoice</h1>
                <address contenteditable>
                    <h4>Customer Information</h4>
                    <p>{{ $order_info->first_name.' '.$order_info->last_name }}</p>
                    <p>{{ $order_info->company_name }}</p>
                    <p>{{ $order_info->address }}<br>{{ $order_info->city }}- {{ $order_info->zip_code }}, {{ $order_info->country }}</p>
                    <p>{{ $order_info->mobile }}</p>
                    <p>{{ $order_info->email }}</p>
                </address>
                <span><img alt="" src="http://www.jonathantneal.com/examples/invoice/logo.png"><input type="file" accept="image/*"></span>
            </header>
            <article>
                    <h4>Shipping Information</h4>
                    <p>{{ $shipping_info->first_name.' '.$shipping_info->last_name }}</p>
                    <p>{{ $shipping_info->company_name }}</p>
                    <p>{{ $shipping_info->address }}<br>{{ $shipping_info->city }}- {{ $shipping_info->zip_code }}, {{ $shipping_info->country }}</p>
                    <p>{{ $shipping_info->mobile }}</p>
                    <p>{{ $shipping_info->email }}</p>
                <table class="meta">
                    <tr>
                        <th><span contenteditable>Invoice #</span></th>
                        <td><span contenteditable>101138</span></td>
                    </tr>
                    <tr>
                        <th><span contenteditable>Date</span></th>
                        <td><span contenteditable>{{ $order_info->created_at }}</span></td>
                    </tr>
                    <tr>
                        <th><span contenteditable>Payment Type</span></th>
                        <td><span contenteditable>{{ $order_info->payment_type }}</span></td>
                    </tr>
                    <tr>
                        <?php $total= 0; ?>
                        @foreach($order_details as $order)
                            {{ $item_total = $order['product_price'] * $order['product_sales_quantity'] }}
                            <?php $total = $total + $item_total; ?>
                        @endforeach
                        <th><span contenteditable>Amount Due</span></th>
                        <td><span id="prefix" contenteditable></span><span>{{ $total }}</span></td>
                    </tr>
                </table>
                <table class="inventory">
                    <thead>
                    <tr>
                        <th><span contenteditable>Item</span></th>
                        <th><span contenteditable>Description</span></th>
                        <th><span contenteditable>Rate</span></th>
                        <th><span contenteditable>Quantity</span></th>
                        <th><span contenteditable>Price</span></th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($order_details as $order)
                    <tr>
                        <td><a class="cut">-</a><span contenteditable>{{ $order['product_name']  }}</span></td>
                        <td><span contenteditable>{{ $order['product_description']  }}</span></td>
                        <td><span data-prefix></span><span contenteditable>{{ $order['product_price']  }}</span></td>
                        <td><span contenteditable>{{ $order['product_sales_quantity']  }}</span></td>
                        <td><span data-prefix></span><span>{{ $order['product_price'] * $order['product_sales_quantity']  }}</span></td>
                    </tr>
                    @endforeach

                    </tbody>
                </table>
                <table class="balance">
                    <tr>
                        <th><span contenteditable>Total</span></th>
                        <td><span data-prefix></span><span>{{ $total }}</span></td>
                    </tr>
                    <tr>
                        <th><span contenteditable>Amount Paid</span></th>
                        <td><span data-prefix></span><span contenteditable>0.00</span></td>
                    </tr>
                    <tr>
                        <th><span contenteditable>Balance Due</span></th>
                        <td><span data-prefix></span><span>{{ $total }}</span></td>
                    </tr>
                </table>
            </article>
            <aside>
                <h1><span contenteditable>Additional Notes</span></h1>
                <div contenteditable>
                    {{--<p>A finance charge of 1.5% will be made on unpaid balances after 30 days.</p>--}}
                </div>
            </aside>
        </div>
    </div>

@endsection