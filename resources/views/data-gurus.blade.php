@extends('layout.template')

@section('title', 'Data Guru')

@section('content')

    <h1>Data Guru</h1>
    <a href="/gurus/create" class="btn btn-primary">Input Guru</a>
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Guru</th>
                <th scope="col">Kategori</th>
                <th scope="col">Tahun Lahir</th>
                <th scope="col">lulusan</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($gurus as $guru)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $guru->nama }}</td>
                    <td>{{ $guru->category->nama_kategori }}</td>
                    <td>{{ $guru->tahunmerdeka }}</td>
                    <td>{{ $guru->pendiri }}</td>
                    <td class="text-nowrap">
                        <a href="/guru/{{ $guru['id'] }}/edit" class="btn btn-warning">Edit</a>
                        <a href="/guru/delete/{{ $guru->id }}" class="btn btn-danger"
                            onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-center">
        {{ $gurus->links() }}
    </div>
@endsection
