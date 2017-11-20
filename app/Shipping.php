<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{
    protected $fillable=['first_name','last_name','email','company_name','mobile','city','zip_code','country'];
}
