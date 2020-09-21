@extends('admin.layouts.dashboard')

@section('content')
<div class="container">
  <div class="card">
    <div class="card-header">
      <h3>Name: {{$user->name}}<h3>
      <h4>Email: {{$user->email}}<h4>
    </div>
    <div class="card-body">
      <h5 class="card-title">Role</h5>
      <p class="card-text">
        @if ($user->roles->isNotEmpty())
                  @foreach ($user->roles as $role)
                          {{ $role->name }}
                  @endforeach
        @endif
     </p>
     <h5 class="card-title">Permissions</h5>
     <p class="card-text">
       @if ($user->permissions->isNotEmpty())
      @foreach ($user->permissions as $permission)
      {{ $permission->name }}
      @endforeach
      @endif
    </p>
  </div>
  <div class="card-footer">
    <a href="{{ url()->previous() }}" class="btn btn-primary">Go Back</a>
  </div>
</div>
</div>
@endsection
