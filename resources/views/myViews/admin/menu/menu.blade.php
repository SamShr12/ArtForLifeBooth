@extends('myViews.admin.admin')

@section('content')
<div class="card">
  <div class="card-header">
    <div style="display: flex; float: right;">
    <a href="insertitemview" style="text-decoration:none; color:white;"> 
      <button class="btn btn-primary">
        +  
      </button>
      </a>
    </div>
  </div>

  <div class="">
    <div class="card">
      <div class="card-body">
        <form method="post" action="adminsearchbyname" style="float: left;">
          {{ csrf_field() }}
          <div class="row">
            <div class="col-md-6 mb-3">
              <label for="">Search by Name</label>
              <input type="text" class="form-control" name="name_search" placeholder="Search works..." style="width: 500px;">
            </div>
            <div class="col-md-12">
              <button type="submit" class="btn btn-primary">Search</button>
            </div>
          </div>
        </form>

        <form method="post" action="adminsearchbycategory" style="float: right;">
          {{ csrf_field() }}
          <div class="row">
            <div class="col-md-6 mb-3">
              <label for="">Category</label>
              <br>
              <select class="form-control" name="category_search">
                @foreach ($category as $c)
                <option value="{{$c['name']}}">{{$c['name']}}</option>
                @endforeach
              </select>
            </div>
            <div class="col-md-12">
              <button type="submit" class="btn btn-primary">Search</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>


  <div class="py-5">
    <div class="container">
      <div class="row">
        @foreach ($data as $d)
        <div class="col-md-3">
          <div class="card text-center" style="object-fit: cover; object-position: center;">
            <img src="{{ asset('assets/upload/menu/'.$d->image) }}" alt="image here" style="height: 250px; width: 250px; object-fit: cover; object-position: center; margin: 0 auto;">
            <div class="card-body">
              <h4>{{$d->itemname}}</h4>
              <p>
                Price: {{$d->itemprice}}<br>
                Category: {{$d->category}}<br>
                Status: {{$d->status}}
              </p>
              <button type='button' class='btn btn-danger btn-sm'>
                <a href='delitem/{{$d->id}}' style='color:white;text-decoration:none;'>
                  Delete
                </a>
              </button>
              <button type='button' class='btn btn-primary btn-sm'>
                <a href='updateitem/{{$d->id}}' style='color:white;text-decoration:none;'>
                  Update
                </a>
              </button>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </div>
  @endsection