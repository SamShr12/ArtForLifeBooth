<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\menu;
use App\Models\Category;
use DB;
use Image;
use File;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use function Symfony\Component\String\s;

class MenuController extends Controller
{
    public function menu(Request $request)
    {
        if ($request->session()->has('admin')) {
            $menu = new menu();
            $category = Category::all();
            $data = $menu::all();
            return view('myViews.admin.menu.menu', ['data' => $data, 'category' => $category]);
        } else {
            return view('myViews.admin.login');
        }
    }

    public function insertitemview(Request $request)
    {
        if ($request->session()->has('admin')) {
            $category = new Category();
            $category = $category::all();
            if (count($category) > 0) {
                return view('myViews.admin.menu.insertItem', ['category' => $category]);
            } else {
                return redirect('insertcategoryview')->with('status', 'Add Category First');
            }
        } else {
            return view('myViews.admin.login');
        }
    }

    public function insertitem(Request $request)
    {
        if ($request->session()->has('admin')) {
            $menu = new menu();
            $file = $request->file('inputImage');
            $ext = $file->extension();
            $filename = time() . '.' . $ext;
            $image_resize = Image::make($file->getRealPath());
            $image_resize->save(public_path('/assets/upload/menu/' . $filename));
            $menu->image = $filename;
            $menu->itemname = $request->input('inputName');
            $menu->itemprice = $request->input('inputPrice');
            $menu->status = $request->input('inputStatus');
            $menu->category = $request->input('inputCategory');
            $menu->description = $request->input('inputDescription');
            $menu->save();
            return redirect('/menu')->with('status', 'Item added!');
        } else {
            return view('myViews.admin.login');
        }
    }

    public function getDatatoUpdate($id, Request $request)
    {
        if ($request->session()->has('admin')) {
            $data = menu::where('id', $id)->get();
            $category = new Category();
            $category = $category::all();
            return view('myViews.admin.menu.updateItem', ['data' => $data, 'category' => $category]);
        } else {
            return view('myViews.admin.login');
        }
    }

    public function updateitemdata(Request $request, $id)
    {
        if ($request->session()->has('admin')) {
            $menu = menu::find($id);
            $path = 'assets/upload/menu/' . $menu['image'];
            if (File::exists($path)) {
                File::delete($path);
            }
            $file = $request->file('inputImage');
            $ext = $file->extension();
            $filename = time() . '.' . $ext;
            $image_resize = Image::make($file->getRealPath());
            $image_resize->save(public_path('/assets/upload/menu/' . $filename));
            $image = $filename;
            $itemname = $request->input('inputName');
            $itemprice = $request->input('inputPrice');
            $category = $request->input('inputCategory');
            $status = $request->input('inputStatus');
            $description = $request->input('inputDescription');
            DB::update('update menus set itemname=?,itemprice=?,category=?,status=?,image=?,description=? where id=?', [$itemname, $itemprice, $category, $status, $image, $description, $id]);
            return redirect('menu')->with('status', 'Item updated!');
        } else {
            return view('myViews.admin.login');
        }
    }

    public function deleteitem($id, Request $request)
    {
        if ($request->session()->has('admin')) {
            $menu = menu::find($id);
            $path = 'assets/upload/menu/' . $menu->image;
            if (File::exists($path)) {
                File::delete($path);
            }
            menu::destroy($id);
            DB::table('carts')->where('product_id', $id)->delete();
            return redirect('/menu')->with('status', 'Item deleted!');
        } else {
            return view('myViews.admin.login');
        }
    }
}
