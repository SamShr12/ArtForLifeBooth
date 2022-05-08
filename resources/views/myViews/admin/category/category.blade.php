@extends('myViews.admin.admin')

@section('content')
<div class="card">
  <div class="card-header" style="display: flex;">
    <h2 style="font-size: 22px;">Category</h2>
    <button class="btn btn-primary" style="right: 16px; position: absolute;">
      <a href="insertcategoryview" style="text-decoration:none; color:white;">Add Category</a>
    </button>
  </div>
  <div class="card-body">
    <table class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>Category ID</th>
          <th>Category Name</th>
          <th>Delete</th>
          <th>Update</th>
        </tr>
      </thead>
      <tbody>
        @if (count($category)>0)
        @foreach($category as $c)
        <tr>
          <td>{{$c['id']}}</td>
          <td>{{$c['name']}}</td>
          <td>
            <button type='button' class='btn btn-danger'>
              <a href="delcategory/{{$c['id']}}" style='color:white;text-decoration:none;'>
                Delete
              </a>
            </button>
          </td>
          <td>
            <button type='button' class='btn btn-primary'>
              <a href="updatecategory/{{$c['id']}}" style='color:white;text-decoration:none;'>
                Update
              </a>
            </button>
          </td>
        </tr>
        @endforeach
        @else
        <h3 style="color:purple;"><b>No catgory found</b></h3>
        @endif

      </tbody>
    </table>
  </div>
</div>
@endsection