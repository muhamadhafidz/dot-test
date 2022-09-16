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
                            <h5>Presensi {{ $item->title }}</h5>
                        </div>
                    </div>
                </div>
                <div class="card-body px-3 py-4">
                    <form action="{{ route('presensi.store', $item->id) }}" method="POST">
                    @csrf
                        <div class="mb-3">
                            <label for="keterangan" class="form-label">Deskripsi Pekerjaan/Keterangan</label>
                            <textarea class="form-control" id="keterangan" name="jobdesc" rows="3">{{ old('jobdesc') ? old('jobdesc') : '' }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="status" class="form-label">Status</label>
                            <select class="form-select" name="status" aria-label="Default select example">
                                <option value="hadir" selected>Hadir</option>
                                <option value="izin">izin</option>
                                <option value="sakit">sakit</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-success w-100">Buat Presensi</button>
                    </form>
                </div>
              </div>
        </div>
    </div>
</div>
@endsection
