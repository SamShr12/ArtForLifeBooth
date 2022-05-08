@extends('myViews.customer.customer')

@section('content')
<div class="card">
  <div class="card-header">
    <h2>All Orders</h2>
  </div>
  <div class="card-body">
    <table class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>ID</th>
          <th>Invoice</th>
          <th>Date</th>
        </tr>
      </thead>
      <tbody>
        @foreach($data as $d)
        <tr>
          <td>{{$d->id}}</td>
          <td><a href="{{ asset('assets/upload/orders/'.$d->pdf) }}">{{$d->pdf}}</a></td>
          <td>{{$d->created_at}}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection