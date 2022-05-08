@extends('myViews.admin.admin')

@section('content')
<div class="card">
  <div class="card-body">
    <form method="post" action="searchbyemail">
      {{ csrf_field() }}
      <div class="row">
        <div class="col-md-3 mb-3">
          <input type="text" class="form-control" name="search" placeholder="Email" required>
        </div>
        <div class="col-md-12">
          <button type="submit" class="btn btn-primary">Search</button>
        </div>
      </div>
    </form>
  </div>
</div>
<div class="card">
  <div class="card-header">
    <h2>All Orders</h2>
  </div>
  <div class="card-body">
    <table class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>Order ID</th>
          <th>Customer Email</th>
          <th>Invoice</th>
          <th>Date</th>
        </tr>
      </thead>
      <tbody>
        @foreach($data as $d)
        <tr>
          <td>{{$d->id}}</td>
          <td>{{$d->customer_email}}</td>
          <td><a href="{{ asset('assets/upload/orders/'.$d->pdf) }}">{{$d->pdf}}</a></td>
          <td>{{$d->created_at}}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection