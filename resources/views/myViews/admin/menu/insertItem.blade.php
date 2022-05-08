@extends('myViews.admin.admin')

@section('content')
<div class="card">
  <div class="card-header">
    <h3>Add Item</h3>
  </div>
  <div class="card-body">
    <form method="post" action="insertitem" enctype="multipart/form-data">
      {{ csrf_field() }}
      <div class="row">
        <div class="col-md-6 mb-3">
          <label for="">Name</label>
          <input type="text" class="form-control" name="inputName" required>
        </div>
        <div class="col-md-6 mb-3">
          <label for="">Price</label>
          <input type="text" class="form-control" name="inputPrice" required>
        </div>
        <div class="col-md-6  mb-3 ">
          <label for="">Category</label>
          <br>
          <select class="form-control" name="inputCategory">
            @foreach ($category as $c)
            <option value="{{$c['name']}}">{{$c['name']}}</option>
            @endforeach
          </select>
        </div>
        <div class="col-md-6  mb-3">
          <label for="">Status</label>
          <div class="col-md-6" style="display: flex; gap: 10px;">
            <label class="radio-inline">
              <input type="radio" value="Available" name="inputStatus" style="margin-right: 5px;" checked>Available
            </label>
            <br>
            <label class="radio-inline">
              <input type="radio" value="Unavailable" name="inputStatus" style="margin-right: 5px;">Unavailable
            </label>
          </div>
        </div>
        <div class="col-md-12 mb-3" >
          <label for="">Description</label>
          <input type="text" class="form-control" name="inputDescription" required>
        </div>
        <br><br>
        <div class="col-md-6 mb-3">
          <label for="">Select your Illustration</label>
          <input type="file" class="form-control" name="inputImage" required>
        </div>
        <br><br>
        <div class="col-md-12">
          <button type="submit" class="btn btn-primary">Add Item</button>
        </div>
      </div>
    </form>
  </div>
</div>
@endsection