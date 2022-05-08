<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StaffController extends Controller
{
    public function staff(Request $request)
    {
        if ($request->session()->has('admin')) {
            $staff = new Staff();
            $data = $staff::all();
            return view('myViews.admin.staff.staff', ['data' => $data]);
        } else {
            return view('myViews.admin.login');
        }
    }

    public function loadaddstaff(Request $request)
    {
        if ($request->session()->has('admin')) {
            return view('myViews.admin.staff.insertStaff');
        } else {
            return view('myViews.admin.login')->with('status', 'Signin First');
        }
    }

    public function insertstaff(Request $request)
    {
        if ($request->session()->has('admin')) {
            $staff = new Staff();
            $staff->name = $request->input('inputName');
            $staff->role = $request->input('role');
            $staff->save();
            return redirect('staff')->with('status', 'Staff added!');
        } else {
            return view('myViews.admin.login');
        }
    }

    public function deletestaff(Request $request, $id)
    {
        if ($request->session()->has('admin')) {
            Staff::destroy($id);
            return redirect('staff')->with('status', 'Staff deleted!');
        } else {
            return view('myViews.admin.login');
        }
    }

    public function updatestaffdata(Request $request, $id)
    {
        if ($request->session()->has('admin')) {
            $name = $request->input('inputName');
            $role = $request->input('inputRole');
            DB::update('update staff set name=?,role=? where id=?', [$name, $role, $id]);
            return redirect('staff')->with('status', 'Staff Updated!');
        } else {
            return view('myViews.admin.login');
        }
    }

    public function getDatatoUpdate(Request $request, $id)
    {
        if ($request->session()->has('admin')) {
            $data = Staff::where('id', $id)->get();
            return view('myViews.admin.staff.updateStaff', ['data' => $data]);
        } else {
            return view('myViews.admin.login');
        }
    }
}
