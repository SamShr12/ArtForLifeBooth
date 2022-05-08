@extends('myViews.admin.admin')

@section('content')
<div class="card">
  <div class="card-header">
    <h3>Update Item</h3>
  </div>
  <div class="card-body">
    @foreach($data as $d)
    <form method="post" action="updatestaffdata/{{$d['id']}}">
      {{ csrf_field() }}
      <div class="row">
        <div class="col-md-6 mb-3">
          <label for="">Staff Name</label>
          <input type="text" value="{{$d['name']}}" class="form-control" name="inputName" required>
        </div>
        <div class="col-md-6  mb-3 ">
          <label for="">Role</label>
          <br>
          <select class="form-control" name="inputRole">
            <option value="Waiter">Waiter</option>
            <option value="Chef">Chef</option>
          </select>
        </div>
        <div class="col-md-12">
          <button type="submit" class="btn btn-primary">Update Staff</button>
        </div>
      </div>
    </form>
    @endforeach
  </div>
</div>
@endsection