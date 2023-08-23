@extends("blank")

@section("content")

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1 class="page-title">Semua Data Role</h1>
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <a href="{{ route('role.create') }}" class="btn btn-primary me-md-2">Add Role</a>
            </div>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama Role</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($roles as $role)
                        <tr>
                            <td>{{ $role->id }}</td>
                            <td>{{ $role->nama_role }}</td>
                            <td>
                                <a href="{{ route('role.edit', ['role' => $role->id]) }}" class="btn btn-primary btn-sm">Edit</a>
                                <form action="{{ route('role.destroy', ['role' => $role->id]) }}" method="post" style="display: inline;">
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
