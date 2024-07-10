@extends('layouts.backend')
@section('content')
    <div class="row">
        <!-- Basic Layout -->
        <div class="col-xxl">
            <div class="card mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Mengubah Data Guru</h5>
                    <a type="button" href="{{route('guru.index')}}" class="btn rounded-pill btn-success float-end">Kembali</a>
                </div>
                <div class="card-body">
                    <form action="{{route('guru.update', $guru->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-name">Nama Guru</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="basic-default-name" @error('nama') is-invalid @enderror" name="nama" value="{{ $guru->nama }}">
                            </div>
                            @error('nama')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-phone">NIP</label>
                            <div class="col-sm-10">
                                <input type="number" id="basic-default-phone" class="form-control phone-mask" @error('nip') is-invalid @enderror" name="nip" value="{{ $guru->nip }}">
                            </div>
                            @error('nip')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-company">Jenis Kelamin</label>
                            <div class="col-sm-10">
                                <select id="defaultSelect" class="form-select" @error('jenis_kelamin') is-invalid @enderror" name="jenis_kelamin" value="{{ $guru->jenis_kelamin }}">
                                    <option value="{{$guru->id}}" {{ $guru->id == $guru->jenis_kelamin ? 'selected' : '' }}>{{$guru->jenis_kelamin}}</option>
                                    <option value="Laki-laki">laki-laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                                @error('jenis_kelamin')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{$message}}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-email">Tanggal Lahir</label>
                            <div class="col-sm-10">
                                <div class="input-group input-group-merge">
                                    <input class="form-control" type="date" id="html5-date-input" @error('tanggal_lahir') is-invalid @enderror" name="tanggal_lahir" value="{{ $guru->tanggal_lahir }}">
                                </div>
                                @error('tanggal_lahir')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{$message}}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-company">Mata Pelajaran</label>
                            <div class="col-sm-10">
                                <select id="defaultSelect" class="form-select" @error('id_mapel') is-invalid @enderror" name="id_mapel" value="{{ $guru->id_mapel }}">
                                    <option>Pilih Mata Pelajaran</option>
                                    @foreach ($mapel as $data)
                                        <option value="{{$data->id}}" {{ $data->id == $guru->id_mapel ? 'selected' : '' }}>{{$data->nama_pelajaran}}</option>
                                    @endforeach
                                </select>
                                @error('id_mapel')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{$message}}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-phone">Mengajar Sejak</label>
                            <div class="col-sm-10">
                                <input type="number" id="basic-default-phone" class="form-control phone-mask" @error('mengajar_sejak') is-invalid @enderror" name="mengajar_sejak" value="{{ $guru->mengajar_sejak }}">
                            </div>
                            @error('mengajar_sejak')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-message">Foto Profil</label>
                            <div class="col-sm-10">
                                @if($guru->foto)
                                    <p><img src="{{ asset('images/foto/'. $guru->foto)}}" alt="cover" width="100px"></p>
                                @endif
                                <input class="form-control" type="file" id="formFile" @error('foto') is-invalid @enderror" name="foto">
                            </div>
                            @error('foto')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="row justify-content-end">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">Ubah</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
