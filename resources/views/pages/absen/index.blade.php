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
                    <h5>Data Presensi</h5>
                </div>
                <div class="card-body px-3 py-4">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Detail Berita Acara</th>
                                <th>Status Presensi</th>
                                <th>Deskripsi Pekerjaan/Keterangan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($bap as $key => $item)
                            <tr>
                                <td>{{ $bap->firstItem() + $key }}</td>
                                <td><span class="fw-bold">{{ $item->title }}</span><br><small>Total Mhs : {{ $item->total_mhs }}<br>Ket : {{ $item->description }}</small> </td>
                                @if ($item->presensis->where('user_id', Auth::user()->id)->isEmpty())
                                    <td class="text-danger">Belum melakukan presensi</td>
                                    <td class="text-danger">-</td>
                                    <td>
                                        <a class="btn btn-primary btn-sm" href="{{ route('presensi.create', $item->id) }}">Absen</a>
                                    </td>
                                @else
                                    <td class="">{{ $item->presensis->where('user_id', Auth::user()->id)->first()->status }}</td>
                                    <td class="">{{ $item->presensis->where('user_id', Auth::user()->id)->first()->jobdesc }}</td>
                                    <td>
                                        <button type="button" class="btn btn-secondary btn-sm">Sudah Absen</button>
                                    </td>
                                @endif
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
