<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function paymentMethod()
    {
        return view('customer.payment.payment_method');
    }

    public function paymentConfirm(Request $request)
    {
        $type = $request->payment_type;
        if($type==='cash'){
            return  route('customer.orderConfirmation');
        }
        else{
            return 'he';
        }
    }

    public function orderConfirmation()
    {
        return view('customer.order.order_confirmation');
    }
}
