@extends('blank')

@section('content')
    <div class="container">
        <h1>Edit User</h1>
        <form action="{{ route('user.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="username" value="{{ $user->username }}" required>
            </div>
            <!-- <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" required>
            </div> -->
            <div class="mb-3">
                <label for="role" class="form-label">Role</label>
                <select class="form-control" id="role" name="role_id" required>
                    @foreach($roles as $role)
                        <option value="{{ $role->id }}" {{ $user->role_id == $role->id ? 'selected' : '' }}>
                            {{ $role->nama_role }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="status" name="status" {{ $user->status == 'active' ? 'checked' : '' }}>
                <label class="form-check-label" for="status">Active</label>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('user.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
@endsection
