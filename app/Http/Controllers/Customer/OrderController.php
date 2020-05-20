<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Shipping;
use App\Model\Order;
use App\Model\OrderDetail;

class OrderController extends Controller
{
    public function orderStore(Request $request)
    {
        # code...
    }

    public function shipping()
    {
        return view('customer.order.shipping');
    }

    public function shippingStore(Request $request)
    {
         //Store Shipping Address
         $shipping = new Shipping;
         $shipping->order_number = null;
         $shipping->name = $request->name;
         $shipping->phone = $request->phone;
         $shipping->email = $request->email;
         $shipping->division = $request->division;
         $shipping->city = $request->district;
         $shipping->upazila = $request->upazila;
         $shipping->address = $request->address;
         $shipping->address2 = $request->address2;
         $shipping->save();

    }
}
