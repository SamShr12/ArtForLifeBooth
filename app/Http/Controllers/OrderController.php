<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class OrderController extends Controller
{


    public function viewCustomerOrders(Request $request)
    {
        if ($request->session()->has('customer')) {
            $customer = $request->session()->get('customer');
            foreach ($customer as $c) {
                $c_email = $c->email;
            }
            $data = DB::select('select * from orders where customer_email=?', [$c_email]);
            return view('myViews.customer.orders.viewOrders', ['data' => $data]);
        } else {
            return view('myViews.customer.login');
        }
    }

    public function vieworders(Request $request)
    {
        if ($request->session()->has('admin')) {
            $data = Order::all();
            return view('myViews.admin.orders.allOrders', ['data' => $data]);
        } else {
            return redirect('myViews.admin.login');
        }
    }

    public function searchbyemail(Request $request)
    {
        if ($request->session()->has('admin')) {
            $search = $request->input('search');
            if ($search) {
                $data = DB::select('select * from orders where customer_email=?', [$search]);
                if ($data) {
                    return view('myViews.admin.orders.allOrders', ['data' => $data]);
                } else {
                    return redirect('viewallorders')->with('status', 'No data found');
                }
            }
        } else {
            return redirect('myViews.admin.login');
        }
    }
}
