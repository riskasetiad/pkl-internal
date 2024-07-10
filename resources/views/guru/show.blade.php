@extends('layouts.backend')
@section('content')
<section style="background-color: #eee;">
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-4">
                <div class="card mb-4">
                    <div class="card-body text-center">
                        <img src="{{ asset('images/foto/' . $guru->foto) }}" alt="avatar" class="rounded-circle img-fluid"
                            style="width: 150px; height: 150px;">
                        <h5 class="my-3">{{ $guru->nama }}</h5>
                        <p class="text mb-4">Kinerja: </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Mata pelajaran</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text mb-0">{{ $guru->mapel->nama_pelajaran }}</p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">NIP</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text mb-0">{{ $guru->nip }}</p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Jenis kelamin</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text mb-0">{{ $guru->jenis_kelamin }}</p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Tanggal lahir</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text mb-0">{{ $guru->tanggal_lahir }}</p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Mengajar sejak</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text mb-0">{{ $guru->mengajar_sejak }}</p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-xl-12">
                                <a type="button" href="{{ route('guru.index') }}"
                                    class="btn rounded-pill btn-dark float-end">Kembali</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
