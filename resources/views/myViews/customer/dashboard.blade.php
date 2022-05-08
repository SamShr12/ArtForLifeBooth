@extends('myViews.customer.customer')
<style>
  .in-im img{
    transition: opacity 700ms;
  }
  .in-im img:hover{
    opacity: 0.7;
  }
</style>

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6" style="margin:auto; width: 85%;">
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active"> v1</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content" style="width: 85%; margin: auto;">
<h1 class="m-0" style="font-size: 24px; padding-bottom: 20px;">  Recommended for you</h1>


  <div class="main">
    <div style="display: grid; grid-template-columns: repeat(4, 1fr); gap: 10px;">
    @foreach($work as $d)
    <a href="detail/{{$d->id}}">
      <div class="in-im">
        <img src="{{ asset('assets/upload/menu/'.$d->image) }}" alt="" style="object-fit: cover; object-position: center; width: 250px; height: 250px;">
        <div style="display: block;">
          <h4 class="text-underline-hover" style="font-size: 12px; margin-bottom: -26px;">{{ $d->category}}</h4><br>
          <h4 class="text-underline-hover" style="font-size: 16px; color: #000;">{{ $d->itemname}}</h4><br>
        </div>
        <p style="margin-top: -36px; color: #ff5c67; font-weight: 600;">Rs {{ $d->itemprice }}</p>
      </div>
      </a>
      @endforeach
    </div>
  </div>
</section>
<!-- /.content -->
@endsection