@extends('myViews.customer.customer')

@section('content')
<div class="">
  <div class="card">
    <div class="card-body">
      <form method="post" action="searchbyname" style="float: left;">
        {{ csrf_field() }}
        <div class="row">
          <div class="col-md-6 mb-3">
            <label for="">Search by Name</label>
            <input type="text" class="form-control" name="name_search" placeholder="Search works ..." style="width: 500px;" required>
          </div>
          <div class="col-md-12">
            <button type="submit" class="btn btn-primary">Search</button>
          </div>
        </div>
      </form>

      <form method="post" action="searchbycategory" style="float: right; width: 300px;">
        {{ csrf_field() }}
        <div class="row">
          <div class="col-md-6 mb-3">
            <label for="">Select Category</label>
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
<div class="py-3">
  
  <div class="container">
  <h2 style="font-size: 24px;" class="py-2">On Sale</h2>
    
    <div class="row">
      @foreach ($data as $d)
      <div class="col-md-3">
        <div class="card text-center" style="object-fit: cover; object-position: center; margin-bottom: 20px;">
          <a href="detail/{{$d->id}}"><img src="{{ asset('assets/upload/menu/'.$d->image) }}" alt="image here" style="width: 250px; height: 250px; object-fit: cover; object-position: center; margin: 0 auto; border-radius: 5px;"></a>
          <div class="card-body">
            <?php
            $firstname = explode(" ", $d->itemname);
            ?>
            <h3>{{$firstname[0]}}</h3>
            <button class="btn btn-primary btn-sm">
              <a href="detail/{{$d->id}}" style='color:white;text-decoration:none;'>
                Info
              </a>
            </button>
            <button type='button' class='btn btn-primary btn-sm'>
              <a href='addsingleitem/{{$d->id}}' style='color:white;text-decoration:none;'>
                Add
                <i class=" nav-icon fas fa-shopping-cart"></i>
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