@extends('myViews.admin.admin')

@section('content')
<div class="card">
  <div class="card-header">
    <h3>Add Category</h3>
  </div>
  <div class="card-body">
    <form method="post" action="insertcategory">
      {{ csrf_field() }}
      <div class="row">
        <div class="col-md-6 mb-3">
          <label for="">Category Name</label>
          <input type="text" class="form-control" name="inputName" required>
        </div>
        <div class="col-md-12">
          <button type="submit" class="btn btn-primary">Add Category</button>
        </div>
      </div>
    </form>
  </div>
</div>
@endsection