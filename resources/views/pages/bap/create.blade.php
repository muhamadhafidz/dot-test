@extends('layouts.app')

@section('content')
<div class="row">
    @include('includes.sidebar')
    <div class="col-9 pt-5 pe-5">
        @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {!! implode('', $errors->all(':message <br>')) !!}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        <div class="container">
            <div class="card card-data mb-5">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <h5>Data Berita Acara</h5>
                        </div>
                    </div>
                </div>
                <div class="card-body px-3 py-4">
                    <form action="{{ route('berita-acara.store') }}" method="POST">
                    @csrf
                        <div class="mb-3">
                            <label for="kegiatan" class="form-label">Nama Kegiatan</label>
                            <input type="text" class="form-control" id="kegiatan" name="title" value="{{ old('title') ? old('title') : '' }}">
                        </div>
                        <div class="mb-3">
                            <label for="total_mhs" class="form-label">Total Mahasiswa Hadir</label>
                            <input type="number" class="form-control" id="total_mhs" name="total_mhs" value="{{ old('total_mhs') ? old('total_mhs') : '' }}">
                        </div>
                        <div class="mb-3">
                            <label for="keterangan" class="form-label">Keterangan</label>
                            <textarea class="form-control" id="keterangan" name="description" rows="3">{{ old('description') ? old('description') : '' }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-success w-100">Tambah Berita Acara</button>
                    </form>
                </div>
              </div>
        </div>
    </div>
</div>
@endsection
