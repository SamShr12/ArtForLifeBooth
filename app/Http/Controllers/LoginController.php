<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Order;
use Illuminate\Support\Facades\DB;
use App\Models\menu;
use App\Models\Staff;
use App\Models\Customer;
use ErrorException;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use Exception;
use Mockery\Undefined;

class LoginController extends Controller
{
    public function adminSignin(Request  $request)
    {
        $email = $request->input('inputEmail');
        $password = $request->input('inputPassword');
        $data = DB::select('select * from admins where email=? and password=?', [$email, $password]);
        if ($data != null) {
            $request->session()->put('admin', $data);
            $orders = Order::all();
            $customers = Customer::all();
            $menus = menu::all();
            $staff = Staff::all();
            $pendingOrders = DB::table('carts')
                ->select('user_id')
                ->groupBy('user_id')
                ->get();
            return view('myViews.admin.dashboard', ['pendingOrders' => $pendingOrders, 'staff' => $staff, 'menu' => $menus, 'admin' => $data, 'orders' => $orders, 'customers' => $customers]);
        } else {
            return redirect('/login')->with('status', 'Invalid email and password');
        }
    }

    public function customerSignin(Request  $request, Exception $exception)
    {
        $email = $request->input('inputEmail');
        $password = $request->input('inputPassword');
        $data = DB::select('select * from customers where email=? and password=?', [$email, $password]);
        if ($data != null) {
            $request->session()->put('customer', $data);
            return view('myViews.customer.index', ['customer' => $data]);
        } else {
            return redirect('/customerlogin')->with('status', 'Invalid email and password');
        }

        
    }
}
