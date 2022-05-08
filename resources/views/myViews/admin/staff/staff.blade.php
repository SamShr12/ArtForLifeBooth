@extends('myViews.admin.admin')

@section('content')
<div class="card">
  <div class="card-header">
    <h2>Staff</h2>
    <button class="btn btn-primary">
      <a href="addstaff" style="color:white;text-decoration:none;">Add Staff</a>
    </button>
  </div>
  <div class="card-body">
    <table class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>Name</th>
          <th>Role</th>
          <th>Delete</th>
          <th>Update</th>
        </tr>
      </thead>
      <tbody>
        @foreach($data as $d)
        <tr>
          <td>{{$d['name']}}</td>
          <td>{{$d['role']}}</td>
          <td>
            <button type='button' class='btn btn-danger'>
              <a href='delstaff/{{$d['id']}}' style='color:white;text-decoration:none;'>
                Delete
              </a>
            </button>
          </td>
          <td>
            <button type='button' class='btn btn-primary'>
              <a href='updatestaff/{{$d['id']}}' style='color:white;text-decoration:none;'>
                Update
              </a>
            </button>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection