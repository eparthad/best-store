<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shippings extends Model
{
    protected $fillable=['first_name','last_name','email','company_name','mobile','city','zip_code','country'];
}
