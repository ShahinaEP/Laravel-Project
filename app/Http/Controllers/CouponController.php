<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CouponController extends Controller
{
    public function Coupon(){
        return view('coupon.coupon');
    }
}
