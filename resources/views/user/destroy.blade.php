@extends('blank')

@section('content')
    <h2>Konfirmasi Hapus User</h2>
    
    <p>Anda yakin ingin menghapus user: <strong>{{ $user->username }}</strong>?</p>
    
    <form action="{{ route('user.destroy', $user) }}" method="post">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Hapus</button>
        <a href="{{ route('user.index') }}" class="btn btn-secondary">Batal</a>
    </form>
@endsection