<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CartController;
use App\Models\Customer;
use App\Models\Order;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('myViews.admin.login');
});

Route::get('/customerlogin', function () {
    return view('myViews.customer.login');
});

Route::get('customersignup', function () {
    return view('myViews.customer.signUp');
});

Route::post('updatecustomerpofile', [CustomerController::class, 'updateProfile']);

Route::post('customerregister', [CustomerController::class, 'customerregister']);

Route::post('/adminsignin', [LoginController::class, 'adminSignin']);

Route::post('customersignin', [LoginController::class, 'customerSignin']);

Route::get('admindashboard', [AdminController::class, 'loadDashboard']);

Route::get('/menu', [MenuController::class, 'menu']);

Route::post('insertitem', [MenuController::class, 'insertitem']);

Route::get('/insertitemview', [MenuController::class, 'insertitemview']);

Route::get('updateitem/{id}', [MenuController::class, 'getDatatoUpdate']);

Route::post('updateitem/updateitemdata/{id}', [MenuController::class, 'updateitemdata']);

Route::get('delitem/{id}', [MenuController::class, 'deleteitem']);

Route::get('/category', [CategoryController::class, 'category']);

Route::get('insertcategoryview', [CategoryController::class, 'insertcategoryview']);

Route::post('insertcategory', [CategoryController::class, 'insertcategory']);

Route::get('delcategory/{id}', [CategoryController::class, 'delcategory']);

Route::get('staff', [StaffController::class, 'staff']);

Route::get('addstaff', [StaffController::class, 'loadaddstaff']);

Route::post('insertstaff', [StaffController::class, 'insertstaff']);

Route::get('delstaff/{id}', [StaffController::class, 'deletestaff']);

Route::get('updatestaff/{id}', [StaffController::class, 'getDatatoUpdate']);

Route::post('updatestaff/updatestaffdata/{id}', [StaffController::class, 'updatestaffdata']);

Route::get('customerlogin', [CustomerController::class, 'customerlogin']);

Route::get('customerdashboard', [CustomerController::class, 'customerDashboard']);

//here
Route::get('detail/customerdashboard', [CustomerController::class, 'customerDashboard']);
//here end

Route::get('loadmenu', [CustomerController::class, 'loadmenu']);

//here
Route::get('detail/loadmenu', [CustomerController::class, 'loadmenu']);
//here end

Route::get('detail/{id}', [CustomerController::class, 'detail']);

Route::get('addsingleitem/{id}', [CustomerController::class, 'addsingleitem']);

// mine start
Route::get('detail/addsingleitem/{id}', [CustomerController::class, 'addsingleitem']);
// mine end

Route::get('showcart', [CustomerController::class, 'showcart']);


Route::get('deletefromcart/{id}', [CartController::class, 'deletefromcart']);

Route::get('checkout', [CustomerController::class, 'checkout']);

Route::post('ordercomplete', [CustomerController::class, 'ordercomplete']);

Route::get('/adminlogout', [AdminController::class, 'logout']);

Route::get('viewcustomerorders', [OrderController::class, 'viewCustomerOrders']);

Route::get('viewallorders', [OrderController::class, 'vieworders']);

Route::get('/customerlogout', [CustomerController::class, 'logout']);

Route::post('searchbyemail', [OrderController::class, 'searchbyemail']);

Route::post('insertadmindata', [AdminController::class, 'insertadmindata']);

Route::get('/insertadmin', [AdminController::class, 'insertAdmin']);

Route::post('searchbyname', [CustomerController::class, 'searchbyname']);

Route::post('searchbycategory', [CustomerController::class, 'searchbycategory']);

Route::post('adminsearchbyname', [AdminController::class, 'adminsearchbyname']);

Route::post('adminsearchbycategory', [AdminController::class, 'adminsearchbycategory']);
