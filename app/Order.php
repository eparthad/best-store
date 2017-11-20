<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable=['customers_id','shipping_id','payment_id','order_status','order_total'];
}
