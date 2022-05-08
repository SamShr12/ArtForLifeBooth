<?php
$total = $amount + (($amount / 100) * 13);
?>

@extends('myViews.customer.customer')

@section('content')
<div class="card">
  <div class="card-header">
    <h2>Checkout</h2>
  </div>
  <div class="card-body">
    <table class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>Product Name</th>
          <th>Price</th>
          <th>Quantity</th>
          <th>Image</th>
          <th>Date</th>
        </tr>
      </thead>
      <tbody>
        @foreach($cart as $c)
        <tr>
          <td>{{$c->product_name}}</td>
          <td>{{$c->price}}</td>
          <td>{{$c->product_quantity}}</td>
          <td><img src="{{ asset('assets/upload/menu/'.$c->product_image) }}" width="50" height="50"></td>
          <td>{{$c->created_at}}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
    <br>

    <form method="post" action="ordercomplete">
      @csrf
      <div class="row">
        <div class="col-md-6 mb-3">
          <input class="form-control" name="inputAddress" required placeholder="Enter Address"></input>
        </div>
        <br>
        <div class="col-md-12" mb-3>
          <input type="checkbox" name="payment" value="Payment on Delivery" required>
          <label for="" style="font-size: 1.em;"> Cash on Delivery </label><br>
        </div>
        <br><br><br>
        <div class="col-md-12" mb-3>
          <h4 style="font-size: 1.15em;">Amount: {{$amount}}</h4>
          <h4 style="font-size: 1.15em; border-bottom: 1px solid #ccc; width: 300px;">Tax : 13%</h4>
          <h4 style="font-size: 1.25em;">Total Amount: {{$total}}</h4>
        </div>
        <div class="col-md-12">
          <button type="submit" class="btn btn-primary">Order +</button>
        </div>
      </div>
    </form>
  </div>


</div>
@endsection