@extends('blank')

@section('content')
    <div class="container">
        <h1>Create User</h1>
        <form action="{{ route('user.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" name="username" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="role">Role</label>
                <select name="role_id" class="form-control" required>
                    @foreach ($roles as $role)
                        <option value="{{ $role->id }}">{{ $role->nama_role }}</option>
                    @endforeach
                </select>
            </div>
            <!-- <div class="form-group">
                <label for="status">Status</label>
                <select name="status" class="form-control" required>
                    <option value="active">Active</option>
                    <option value="inactive">Inactive</option>
                </select>
            </div> -->
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
@endsection
