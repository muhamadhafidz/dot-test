@extends('layouts.app')

@section('content')
<div class="row">
    @include('includes.sidebar')
    <div class="col-9 pt-5 pe-5">
        <div class="container">
            <div class="card card-data mb-5">
                <div class="card-header">
                    <h5>Data Dashboard</h5>
                </div>
                <div class="card-body px-5 py-4">
                    <div class="row">
                        <div class="col">
                            <div class="card">
                                <div class="card-body">
                                  Total Asisten : {{ $asisten }}
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card">
                                <div class="card-body">
                                  Total Berita Acara : {{ $bap }}
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card">
                                <div class="card-body">
                                  Total Presensi : {{ $presensi }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
              </div>
        </div>
    </div>
</div>
@endsection
