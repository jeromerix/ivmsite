@extends('admin.layouts.dashboard')

@section('content')

<h2>Edit User</h2>

<form method="POST" action="/users/{{ $user->id }}" enctype="multipart/form-data">
  @method('PATCH')
  @csrf()

  <div class="form-group">
    <label for="name">User name</label>
    <input type="text" name="name" class="form-control" id="name" placeholder="Name.." value="{{ $user->name }}"required>
  </div>
  <div class="form-group">
    <label for="email">Email</label>
    <input type="email" name="email" class="form-control" id="email" placeholder="Email.." value="{{ $user->email }}">
  </div>
  <div class="form-group">
    <label for="password">Password</label>
    <input type="password" name="password" class="form-control" id="password" placeholder="Password.."minlength="8">
  </div>
  <div class="form-group">
    <label for="password_confirmation">Password Confirm</label>
    <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" placeholder="Password..">
  </div>

  <div class="form-group pt-2">
    <input class="btn btn-primary" type="submit" value="Submit">
  </div>
</form>
@endsection
