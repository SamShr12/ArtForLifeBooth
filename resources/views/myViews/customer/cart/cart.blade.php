@extends('myViews.customer.customer')

@section('content')
<div class="card">
  <div class="card-header">
    <h2>Cart</h2>
  </div>
  @if(count($cart)>0)
  <div class="card-body">
    <table class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>Product Name</th>
          <th>Price</th>
          <th>Quantity</th>
          <th>Image</th>
          <th>Date</th>
          <th>Remove</th>
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
          <td>
            <a href='/deletefromcart/{{$c->id}}' style='color:white;text-decoration:none;'>
              <i style="color:black" class="fas fa-minus-circle"></i>
            </a>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
    <h4 style="font-size: 1.15em; margin-top: 10px;">Total Amount: {{$amount}}</h4>
    <button class="btn btn-primary" style="float:right;">
      <a href="checkout" style="color:white;text-decoration:none;">Checkout</a>
    </button>
  </div>

  @else
  <h3 class="text-center" style="font-size: 1.2em; margin-top: 5px; margin-bottom: 5px;"> No Orders </h3>
  @endif
</div>
@endsection