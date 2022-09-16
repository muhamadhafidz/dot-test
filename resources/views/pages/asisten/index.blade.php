@extends('layouts.app')

@section('content')
<div class="row">
    @include('includes.sidebar')
    <div class="col-9 pt-5 pe-5">
        <div class="container">
            <div class="card card-data mb-5">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <h5>Data Asisten</h5>
                        </div>
                        <div class="col text-end">
                            <a class="btn btn-success btn-sm" href="{{ route('asisten.create') }}">+ Tambah Asisten</a>
                        </div>
                    </div>
                </div>
                <div class="card-body px-5 py-4">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($asisten as $key => $item)
                            <tr>
                                <td>{{ $asisten->firstItem() + $key }}</td>
                                <td><span class="fw-bold">{{ $item->name }}</span></td>
                                <td>{{ $item->email }}</td>
                                <td>
                                    <a href="{{ route('asisten.edit',$item->id) }}" class="btn btn-warning btn-sm">Ubah</a>
                                    <form action="{{ route('asisten.destroy', $item->id) }}" method="post" class="d-inline">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr class="text-center">
                                <td colspan="5">
                                    Data Kosong
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    {!! $asisten->links() !!}
                </div>
              </div>
        </div>
    </div>
</div>
@endsection
