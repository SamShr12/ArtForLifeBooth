<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function category(Request $request)
    {
        if ($request->session()->has('admin')) {
            $category = new Category();
            $category = $category::all();
            return view('myViews.admin.category.category', ['category' => $category]);
        } else {
            return view('myViews.admin.login');
        }
    }

    public function insertcategoryview()
    {
        return view('myViews.admin.category.insertCategory');
    }

    public function insertcategory(Request $request)
    {
        if ($request->session()->has('admin')) {
            $category = new Category();
            $category->name = $request->input('inputName');
            $category->save();
            return redirect('/category')->with('status', 'Category added!');
        } else {
            return view('adminlogin');
        }
    }

    public function delcategory(Request $request, $id)
    {
        if ($request->session()->has('admin')) {
            Category::destroy($id);
            return redirect('/category')->with('status', 'Category Deleted');
        } else {
            return view('adminlogin');
        }
    }
}
