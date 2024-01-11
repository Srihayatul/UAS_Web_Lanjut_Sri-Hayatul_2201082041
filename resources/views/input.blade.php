@extends('layout.template')
@section('title', 'Input Data Guru')
@section('content')
    <h2 class="mb-4">Tambah Guru </h2>
    <form action="/guru/store" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="id" class="form-label">ID Guru:</label>
            <input type="text" class="form-control" id="id" name="id" required="">
        </div>
        <div class="mb-3">
            <label for="judul" class="form-label">Nama:</label>
            <input type="text" class="form-control" id="nama" name="nama" required="">
        </div>s1
        <div class="mb-3">
            <label for="category_id" class="form-label">Kategori:</label>
            <select name="category_id" id="category_id" class="form-select" required>
                <option value="">Pilih Kategori</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->nama_kategori }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="deskripsi" class="form-label">deskripsi:</label>
            <textarea class="form-control" id="deskripsi" name="deskripsi" rows="4" required=""></textarea>
        </div>
        <div class="mb-3">
            <label for="tahunlahir" class="form-label">Tahun Lahir:</label>
            <input type="number" class="form-control" id="tahunlahir" name="tahunlahir" required="">
        </div>
        <div class="mb-3">
            <label for="lulusan" class="form-label">lulusan:</label>
            <input type="text" class="form-control" id="lulusan" name="lulusan" required="">
        </div>
        <div class="mb-3">
            <label for="foto_sampul" class="form-label">Foto Sampul:</label>
            <input type="file" class="form-control" id="foto_sampul" name="foto_sampul" required="">
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="/gurus/data" class="btn btn-danger">Batal</a>
        </div>
    </form>
@endsection
