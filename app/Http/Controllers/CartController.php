<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;

class CartController extends Controller
{
    public function deletefromcart(Request $request, $id)
    {
        if($request->session()->has('customer'))
        {
            Cart::destroy($id);
            return redirect('showcart')->with('status','Item removed from cart.');
        }
        else
        {
            return redirect('customerlogin')->with('status','Login');
        }
    }
}
