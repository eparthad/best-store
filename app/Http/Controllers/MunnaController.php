<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MunnaController extends Controller
{
    public function createMunna()
    {
        return view('admin.category.createMunnaView');
    }
}
