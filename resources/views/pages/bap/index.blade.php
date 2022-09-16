@extends('layouts.app')

@section('content')
<div class="row">
    @include('includes.sidebar')
    <div class="col-9 pt-5 pe-5">
        <div class="container">
            @if (session('status'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('message') }}.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            @endif
            
            <div class="card card-data mb-5">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <h5>Data Berita Acara</h5>
                        </div>
                        <div class="col text-end">
                            <a class="btn btn-success btn-sm" href="{{ route('berita-acara.create') }}">+ Tambah BAP</a>
                        </div>
                    </div>
                </div>
                <div class="card-body px-3 py-4">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Kegiatan</th>
                                <th>total Mahasiswa</th>
                                <th>Keterangan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($bap as $key => $item)
                            <tr>
                                <td>{{ $bap->firstItem() + $key }}</td>
                                <td>{{ $item->title }}</td>
                                <td>{{ $item->total_mhs }}</td>
                                <td>{{ $item->description }}</td>
                                <td>
                                    <a href="{{ route('berita-acara.edit',$item->id) }}" class="btn btn-warning btn-sm">Ubah</a>
                                    <form action="{{ route('berita-acara.destroy', $item->id) }}" method="post" class="d-inline">
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
                    {!! $bap->links() !!}
                </div>
              </div>
        </div>
    </div>
</div>
@endsection
