@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-4 pt-sm-5 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit User Role</h1>
</div>

<div class="col-lg-8 mb-5">
    <form method="post" action="/dashboard/user/{{ $user->id }}">
        @method('put')
        @csrf
        <div class="mb-3">
          <label for="name" class="form-label">Name</label>
          <input type="text" name="name" class="form-control" disabled id="name" value="{{ old('name', $user->name) }}">
        </div>
        <div class="mb-3">
          <label for="email" class="form-label">Email</label>
          <input type="text" name="email" class="form-control" disabled id="email" value="{{ old('email', $user->email) }}">
        </div>
        <div class="mb-3">
            <label for="role" class="form-label">Role</label>
            <select class="form-select" name="role">
              <option value="user" {{ $user->is_superAdmin || $user->is_admin ? '' : 'selected' }}>User</option>
              <option value="secondAdmin" {{ $user->is_admin ? 'selected' : '' }}>Second Admin</option>
              <option value="superAdmin" {{ $user->is_superAdmin ? 'selected' : '' }}>Super Admin</option>
            </select>
          </div>          
        <button type="submit" class="btn btn-primary my-4">Update Role</button>
    </form>
</div>

@endsection
