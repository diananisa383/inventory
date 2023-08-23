@extends("blank")

@section("content")

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1 class="page-title">Semua Data User</h1>
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <a href="{{ route('user.create') }}" class="btn btn-primary me-md-2">Add User</a>
            </div>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Username</th>
                            <th>Role</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->username }}</td>
                            <td>{{ $user->role }}</td>
                            <td>
                                <a href="{{ route('users.edit', ['user' => $user->id]) }}" class="btn btn-primary btn-sm">Edit</a>
                                <form action="{{ route('users.destroy', ['user' => $user->id]) }}" method="post" style="display: inline;">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
