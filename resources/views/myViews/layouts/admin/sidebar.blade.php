<style>
  .bd:hover{
    opacity: 0.7 !important;
  }
</style>
<?php

use App\Http\Controllers\AdminController;

$admin = AdminController::admin();
?>


<aside class="main-sidebar elevation-4">
  <!-- Brand Logo -->
  <div style="width: 160px; margin: auto;">
  <a href="" class="brand-link">
    <span class="brand-text" style="font-family:sans-serif; font-size: 1.25em;">ArtForLife</span>
  </a>
  </div>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        @foreach ($admin as $a)
        <img src="{{asset('assets/upload/admin/'.$a->image)}}" class="img-circle elevation-2" alt="Admin">
        @endforeach
      </div>
      <div class="info">
        @foreach ($admin as $a)
        <?php
        $firstname = explode(" ", $a->name);
        ?>
        <a href="#" class="d-block" style="font-family:sans-serif; text-transform: capitalize;">{{$firstname[0]}}</a>
        @endforeach
      </div>
    </div>


    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        
        <li class="nav-item menu-open {{Request::is('admindashboard')?'active':''}}">
          <a href="admindashboard" class="nav-link ">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p style="font-size: 1.1em;">
              Dashboard
            </p>
          </a>
        </li>
        <li class="nav-item menu-open {{Request::is('menu')?'active':''}}">
          <a href="/menu" class="nav-link">
            <i class="nav-icon fas fa-list-alt"></i>
            <p style="font-size: 1.1em;">
              Stock
            </p>
          </a>
        </li>
        <li class="nav-item menu-open {{Request::is('menu')?'active':''}}">
          <a href="/category" class="nav-link">
            <i class="nav-icon fas fa-list-alt"></i>
            <p style="font-size: 1.1em;">
              Category
            </p>
          </a>
        </li>
        <!-- <li class="nav-item menu-open {{Request::is('menu')?'active':''}}">
          <a href="staff" class="nav-link">
            <i class="nav-icon fas fa-users"></i>
            <p style="font-size: 1.1em;">
              Staff
            </p>
          </a>
        </li> -->
        <li class="nav-item menu-open {{Request::is('menu')?'active':''}}">
          <a href="viewallorders" class="nav-link">
            <i class="nav-icon fas fa-shopping-basket"></i>
            <p style="font-size: 1.1em;">
              Orders
            </p>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>