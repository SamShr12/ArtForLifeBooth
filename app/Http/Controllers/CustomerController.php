<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Models\menu;
use App\Models\Order;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Session;
use Dompdf\Dompdf;
use Intervention\Image\Facades\Image;
use PDF;
use File;

class CustomerController extends Controller
{
    public static function orderCount()
    {
        $customer = Session::get('customer');
        $email = null;
        foreach ($customer as $c) {
            $email = $c->email;
        }
        $orders = DB::select('select * from orders where customer_email=?', [$email]);
        return $orders;
    }

    public function customerregister(Request $request)
    {
        $data = Customer::all();
        foreach ($data as $d) {
            if ($d->email == $request->input('inputEmail')) {
                return view('myViews.customer.signup')->with('status', 'Email already Registered!');
            }
        }
        $customer = new Customer();
        $file = $request->file('inputImage');
        $ext = $file->extension();
        $filename = $request->input('inputEmail') . '.' . $ext;
        $image_resize = Image::make($file->getRealPath());
        $image_resize->save(public_path('/assets/upload/customer/' . $filename));
        $image_resize->resize(60, 60);
        $image_resize->save(public_path('/assets/upload/customer/small/' . $filename));
        $customer->image = $filename;
        $customer->name = $request->input('inputName');
        $customer->email = $request->input('inputEmail');
        $customer->password = $request->input('inputPassword');
        $customer->save();
        $welcome = 'Welcome ' . $request->input('inputName');
        return redirect('/loadmenu')->with('status', $welcome);
    }


    public function customerlogin()
    {
        return view('myViews.customer.login');
    }

    public static function customer()
    {
        return Session::get('customer');
    }

    public static function cartCount()
    {
        $customer = Session::get('customer');
        $email = null;
        foreach ($customer as $c) {
            $email = $c->email;
        }
        $cart = $data = DB::select('select * from carts where user_id=?', [$email]);
        return $cart;
    }

    public function customerDashboard(Request $request)
    {
            $status = 'Available';
            $category = Category::all();
            $work = DB::select('select * from menus where status=? order by rand() limit 8', [$status],);
        if ($request->session()->has('customer')) {
            $customer = $request->session()->get('customer');
            return view('myViews.customer.dashboard', ['customer' => $customer, 'category' => $category, 'work' => $work]);
        } else {
            return view('myViews.customer.login');
        }
    }

    public function loadmenu(Request $request)
    {
        if ($request->session()->has('customer')) {
            $status = 'Available';
            $category = Category::all();
            $data = DB::select('select * from menus where status=?', [$status]);
            return view('myViews.customer.menu.menu', ['data' => $data, 'category' => $category]);
        } else {
            return view('myViews.customer.login');
        }
    }

    public function logout(Request $request)
    {
        $request->session()->forget('customer');
        return redirect('/');
    }

    public function detail(Request $request, $id)
    {
        if ($request->session()->has('customer')) {
            $data = DB::select('select * from menus where id=?', [$id]);
            return view('myViews.customer.menu.productDetail', ['data' => $data]);
        } else {
            return view('myViews.customer.login');
        }
    }

    public function addsingleitem(Request $request, $id)
    {
        if ($request->session()->has('customer')) {
            $customer = $request->session()->get('customer');
            $customer_email = null;
            foreach ($customer as $c) {
                $customer_email = $c->email;
            }
            $cart_get = DB::select('select * from carts where user_id=?', [$customer_email]);
            $product = DB::select('select * from menus where id=?', [$id]);
            $exist = false;
            $product_name = null;
            $product_image = null;
            $product_price = 0;
            $quantity = 0;
            foreach ($product as $p) {
                $product_name = $p->itemname;
                $product_image = $p->image;
                $product_price = $p->itemprice;
            }
            foreach ($cart_get as $ca) {
                if ($ca->product_id == $id) {
                    $quantity = $ca->product_quantity;
                    $exist = true;
                    DB::update('update carts set product_quantity=?,price=? where product_id=?', [$quantity + 1, $product_price * ($quantity + 1), $id]);
                }
            }

            if ($exist == false) {
                $cart = new Cart();
                $cart->user_id = $customer_email;
                $cart->product_id = $id;
                $cart->product_quantity = 1;
                $cart->product_name = $product_name;
                $cart->product_image = $product_image;
                $cart->price = $product_price;
                $cart->save();
                return redirect('loadmenu')->with('status', 'Added to Cart');
            } else {
                return redirect('loadmenu')->with('status', 'Product Added again');
            }
        } else {
            return view('myViews.customer.login');
        }
    }

    public function showcart(Request $request)
    {
        if ($request->session()->has('customer')) {
            $customer = $request->session()->get('customer');
            $customer_email = null;
            foreach ($customer as $c) {
                $customer_email = $c->email;
            }
            $cart = DB::select('select * from carts where user_id=?', [$customer_email]);
            $sum = 0;
            foreach ($cart as $c) {
                $sum = $sum + $c->price;
            }
            return view('myViews.customer.cart.cart', ['cart' => $cart, 'amount' => $sum]);
        } else {
            return view('myViews.customer.login');
        }
    }

    public function checkout(Request $request)
    {
        if ($request->session()->has('customer')) {
            $customer = $request->session()->get('customer');
            $customer_email = null;
            foreach ($customer as $c) {
                $customer_email = $c->email;
            }
            $sum = 0;
            $cart = DB::select('select * from carts where user_id=?', [$customer_email]);

            foreach ($cart as $c) {
                $sum = $sum + $c->price;
            }
            return view('myViews.customer.checkout.checkout', ['cart' => $cart, 'amount' => $sum]);
        } else {
            return view('myViews.customer.login');
        }
    }

    public function ordercomplete(Request $request)
    {
        if ($request->session()->has('customer')) {
            $customer = $request->session()->get('customer');
            $customer_email = null;
            $customer_name = null;
            foreach ($customer as $c) {
                $customer_name = $c->name;
                $customer_email = $c->email;
            }
            $cart = DB::select('select * from carts where user_id=?', [$customer_email]);
            $total = 0;
            foreach ($cart as $c) {
                $total = $total + $c->price;
            }
            $orders = DB::select('select * from orders');
            $order_id = 0;
            foreach ($orders as $o) {
                $order_id = $o->id;
            }
            $order_id = $order_id + 1;
            $address = $request->inputAddress;
            $date = Carbon::now();
            $data = [
                'cart' => $cart,
                'date' => $date,
                'name' => $customer_name,
                'email' => $customer_email,
                'address' => $address,
                'amount' => $total,
                'invoice' => $order_id,
            ];
            $filename = $customer_email . $order_id . '.' . 'pdf';
            $order = new Order();
            $order->customer_email = $customer_email;
            $order->pdf = $filename;
            $order->save();
            DB::table('carts')->where('user_id', $customer_email)->delete();
            $pdf = PDF::loadView('myViews.customer.invoice.invoice', $data);
            $pdf->save(public_path('/assets/upload/orders/' . $filename));
            return redirect('/loadmenu')->with('status', 'Order Completed');
        } else {
            return view('myViews.customer.login');
        }
    }

    public function searchbyname(Request $request)
    {
        $status = 'Available';
        $category = Category::all();
        $name = $request->input('name_search');
        if ($name) {
            $data = DB::select('select * from menus where itemname=? and status=?', [$name, $status]);
            if ($data)
                return view('myViews.customer.menu.menu', ['data' => $data, 'category' => $category]);
            else
                return redirect('loadmenu')->with('status', 'No item found');
        }
    }

    public function searchbycategory(Request $request)
    {
        $status = 'Available';
        $category = Category::all();
        $name = $request->input('category_search');
        if ($name) {
            $data = DB::select('select * from menus where category=? and status=?', [$name, $status]);
            if ($data)
                return view('myViews.customer.menu.menu', ['data' => $data, 'category' => $category]);
            else
                return redirect('loadmenu')->with('status', 'No item found with this category');
        }
    }
}
