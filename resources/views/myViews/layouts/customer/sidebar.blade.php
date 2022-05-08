<?php

use App\Http\Controllers\CustomerController;

$customer = CustomerController::customer();
$cart = CustomerController::cartCount();
?>

<aside class="main-sidebar elevation-4" style="width: 70px">
  <!-- Brand Logo -->
  <a href="#" class="brand-link">
    <span class="brand-text font-weight-light" style="font-family: 'Times New Roman', Times, serif,Arial, sans-serif; margin-left: 20px; color: #000; font-weight: 700;"></span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        @foreach ($customer as $c)
        <img src="{{asset('assets/upload/customer/small/'.$c->image)}}" class="img-circle elevation-2" width="60" height="60" alt="User Image">
        @endforeach
      </div>
      <div class="info">
        @foreach ($customer as $c)
        <?php
        $firstname = explode(" ", $c->name);
        ?>
        <a href="#" style="font-family: sans-serif; text-transform: capitalize;" class="d-block">{{$firstname[0]}}</a>
        @endforeach
      </div>
    </div>


    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        <li class="nav-item menu-open" style="margin-bottom: 20px;">
          <a href="customerdashboard" class="nav-link">
            <i class="nav-icon fas fa-book"></i>
            <p  style="margin-left: 20px;">
              Dashboard
            </p>
          </a>
        </li>
        <li class="nav-item menu-open" style="margin-bottom: 20px;">
          <a href="loadmenu" class="nav-link">
            <i class="nav-icon fas fa-list-alt"></i>
            <p  style="margin-left: 20px;">
              Booth
            </p>
          </a>
        </li>
        <li class="nav-item menu-open" style="margin-bottom: 20px;">
          <a href="showcart" class="nav-link">
            <i class="nav-icon fas fa-shopping-cart"></i>
            <p  style="margin-left: 20px;">
              Cart ({{count($cart)}})
            </p>
          </a>
        </li>
        <li class="nav-item menu-open" style="margin-bottom: 20px;">
          <a href="viewcustomerorders" class="nav-link">
            <i class="nav-icon fas fa-shopping-bag"></i>
            <p  style="margin-left: 20px;">
              My Orders
            </p>
          </a>
        </li>


      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>