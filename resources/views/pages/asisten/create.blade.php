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
                            <h5>Asisten</h5>
                        </div>
                    </div>
                </div>
                <div class="card-body px-3 py-4">
                    <form action="{{ route('asisten.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') ? old('name') : '' }}">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ old('email') ? old('email') : '' }}">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">password</label>
                            <input type="password" class="form-control" id="password" name="password">
                        </div>
                        <button type="submit" class="btn btn-success w-100">Tambah Asisten</button>
                    </form>
                </div>
              </div>
        </div>
    </div>
</div>
@endsection
