<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\menu;
use App\Models\Category;
use App\Models\Customer;
use App\Models\Order;
use App\Models\Staff;
use Illuminate\Contracts\Session\Session as SessionSession;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public function insertAdmin()
    {
        return view('admin.adminlogin');
    }

    public function insertadmindata(Request $request)
    {
        if ($request->session()->has('admin')) {
            $admin = new Admin();
            $admin->name = $request->input('inputName');
            $admin->email = $request->input('inputEmail');
            $admin->password = $request->input('inputPassword');
            $admin->save();
            return redirect('adminpanel');
        } else {
            return redirect('/');
        }
    }

    public static function admin()
    {
        return Session::get('admin');
    }


    public function loadDashboard(Request $request)
    {
        if ($request->session()->has('admin')) {
            $admin = $request->session()->get('admin');
            $orders = Order::all();
            $customers = Customer::all();
            $menus = menu::all();
            $staff = Staff::all();
            $pendingOrders = DB::table('carts')
                ->select('user_id')
                ->groupBy('user_id')
                ->get();
            return view('myViews.admin.dashboard', ['pendingOrders' => $pendingOrders, 'staff' => $staff, 'menu' => $menus, 'admin' => $admin, 'orders' => $orders, 'customers' => $customers]);
        } else {
            return view('myViews.admin.login');
        }
    }

    public static function totalItems()
    {
        $menu = menu::all();
        return count($menu);
    }


    public function logout(Request $request)
    {
        $request->session()->forget('admin');
        return redirect('/');
    }


    public function adminsearchbyname(Request $request)
    {
        $category = Category::all();
        $name = $request->input('name_search');
        if ($name) {
            $data = DB::select('select * from menus where itemname=?', [$name]);
            if ($data)
                return view('myViews.admin.menu.menu', ['data' => $data, 'category' => $category]);
            else
                return redirect('menu')->with('status', 'No item found');
        }
    }

    public function adminsearchbycategory(Request $request)
    {
        $category = Category::all();
        $name = $request->input('category_search');
        if ($name) {
            $data = DB::select('select * from menus where category=?', [$name]);
            if ($data)
                return view('myViews.admin.menu.menu', ['data' => $data, 'category' => $category]);
            else
                return redirect('menu')->with('status', 'No item found with this category');
        }
    }
}
