@extends('admin.layouts.dashboard')

@section('content')

<div class= "card mb-3">
  <div class="card-header">
      Data Table Example</div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Permissions</th>
                <th>Tools</th>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Permissions</th>
                <th>Tools</th>
              </tr>
            </tfoot>
            <tbody>
              @foreach($users as $user)
              <tr>
                <td>{{$user['id']}}</td>
                <td>{{$user['name']}}</td>
                <td>{{$user['email']}}</td>
                <td>
                  <a href="/users/{{ $user['id'] }}"><i class ="fa fa-eye"></i></a>
                  <a href="/users/{{ $user['id'] }}/edit"><i class ="fa fa-edit"></i></a>
                </td>
                <td></td>
                <td></td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        <div class="card-footer small text-muted">Updated .....</div>
@endsection
