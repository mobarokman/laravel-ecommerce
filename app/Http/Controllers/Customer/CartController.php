<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Model\Cart;
use DB;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function viewCart()
    {
        $userId = Auth::id();
        $carts = Cart::with('products:product_id,product_name')
            ->where('user_id', '=', $userId)
            ->get();
       // return $carts[0]->products->product_name;            
        return view('customer.cart.cart', ['carts' => $carts]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
        // array:5 [
    //     "_token" => "K0gWr73INN5L2POfCpHdL9TcQyic7UWIdqKHWEmX"
    //     "productid" => "1"
    //     "userid" => "1"
    //     "price" => "66"
    //     "quantity" => "1"
    //   ]
    public function storeCart(Request $request)
    {
        $cart = new Cart;
        $cart->user_id = $request->userid;
        $cart->product_id = $request->productid;
        $cart->quantity = $request->quantity;
        $cart->price = $request->price;
        $cart->save();
    }
}
