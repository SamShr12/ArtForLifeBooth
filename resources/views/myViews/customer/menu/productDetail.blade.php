@extends('myViews.customer.customer')

@section('content')
<div class="py-3 mb-4 shadow-sm border-top" style="background-color: #007bff;">
  <div class="container">
    @foreach ($data as $d)
    <h6 class="mb-0" style="color: white;">{{$d->category}} / {{$d->itemname}}</h6>
    @endforeach
  </div>
</div>
<div class="container">
  <div class="card-shadow product_data">
    <div class="card-body">
      <div class="row">
        @foreach ($data as $d)
        <div class="col-md-4 border-right" style="object-fit: cover; object-position: center;">
          <img src="{{ asset('assets/upload/menu/'.$d->image) }}" style="height: 500px; width: 448.75px; object-fit: cover; object-position: center;">
        </div>
        <div class="col-md-4" style="left: 180px; top: 50px;">
          <h3 class="mb-0">{{$d->itemname}}</h3>
          <hr>
          <label class="fw-bold">Price: Rs {{$d->itemprice}}</label>
          <p class="">{{$d->description}}</p>
          <p class="">Category: {{$d->category}}</p>
          <hr>
          <div class="row mt-1">
            <div class="col-md-10">
              <br />
              <button type="button" class="btn btn-primary me-3 addtocartbtn float-start">
              <a href="addsingleitem/{{$d->id}}" style="color:white;text-decoration:none;">
                  Add to Cart
                  <i class="fas fa-shopping-cart"></i>
                </a>
              </button>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </div>
</div>
@endsection

@section('script')

@endsection