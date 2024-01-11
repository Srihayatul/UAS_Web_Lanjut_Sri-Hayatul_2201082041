@extends('layout.template')

@section('title', $guru ? $guru->nama : 'Detail Guru')

@section('content')
    @if ($guru)
        <div class="card mb-3">
            <div class="row g-0">
                <div class="col-md-9">
                    <div class="card-body">
                        <h2 class="card-title">{{ $guru->nama }}</h2>
                        <p class="card-text">{{ $guru->deskripsi }}</p>
                        <p class="card-text">Kategori :
                            {{ $guru->category ? $guru->category->nama_kategori : 'Tidak ada kategori' }}</p>
                        <p class="card-text">Tahun Merdeka: {{ $guru->tahunlahir }}</p>
                        <p class="card-text">lulusan : {{ $guru->lulusan }}</p>
                        <a href="/" class="btn btn-primary">Kembali</a>
                    </div>
                </div>
                <div class="col-md-3">
                    <img src="/images/{{ $guru->foto_sampul }}" class="img-fluid rounded-end" alt="...">
                </div>
            </div>
        </div>
    @else
        <p>Data Guru tidak ditemukan.</p>
    @endif
@endsection
