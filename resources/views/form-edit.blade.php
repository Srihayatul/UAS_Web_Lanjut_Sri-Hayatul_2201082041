@extends('layout.template')
@section('title', 'Edit Data Guru')
@section('content')
    <h2 class="mb-4">Edit Guru</h2>
    <form action="/Guru/{{ $guru->id }}/edit" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="id" class="form-label">ID Guru:</label>
            <input type="text" class="form-control" id="id" name="id" value="{{ $guru->id }}" readonly>
        </div>
        <div class="mb-3">
            <label for="nama" class="form-label">Nama Guru:</label>
            <input type="text" class="form-control" id="nama" name="nama" value="{{ $guru->nama }}" required>
        </div>
        <div class="mb-3">
            <label for="category_id" class="form-label">Kategori:</label>
            <select name="category_id" id="category_id" class="form-select" required>
                <option value="">Pilih Kategori</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ $guru->category_id == $category->id ? 'selected' : '' }}>
                        {{ $category->nama_kategori }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="deskripsi" class="form-label">deskripsi:</label>
            <textarea class="form-control" id="deskripsi" name="deskripsi" rows="4" required>{{ $guru->sejarah }}</textarea>
        </div>
        <div class="mb-3">
            <label for="tahunlahir" class="form-label">Tahun Merdeka:</label>
            <input type="number" class="form-control" id="tahunlahir" name="tahunlahir" value="{{ $guru->tahunlahir }}" required>
        </div>
        <div class="mb-3">
            <label for="lulusan" class="form-label">lulusan:</label>
            <input type="text" class="form-control" id="lulusan" name="lulusan" value="{{ $guru->lulusan }}" required>
        </div>
        <div class="mb-3">
            <label for="change_foto" class="form-label">Ganti Foto Sampul:</label>
            <input type="checkbox" id="change_foto" name="change_foto" value="1">
        </div>
        <div class="mb-3">
            <label for="foto_sampul" class="form-label">Foto Sampul:</label>
            <img src="/images/{{ $guru->foto_sampul }}" class="img-thumbnail" alt="Foto Sampul" width="100px">
            <input type="file" class="form-control" id="foto_sampul" name="foto_sampul" accept="image/*">
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </form>
@endsection
