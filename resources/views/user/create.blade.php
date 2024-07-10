@extends('layouts.backend')
@section('content')
    <div class="row">
        <!-- Basic Layout -->
        <div class="col-xxl">
            <div class="card mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Tambah Pengguna</h5>
                    <a type="button" href="{{ route('user.index') }}"
                        class="btn rounded-pill btn-success float-end">Kembali</a>
                </div>
                <div class="card-body">
                    <form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-name">Nama</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="basic-default-name"
                                    @error('name') is-invalid @enderror" name="name">
                            </div>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                         <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-name">Email</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="basic-default-name"
                                    @error('email') is-invalid @enderror" name="email">
                            </div>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-name">Kata Sandi</label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" id="basic-default-name"
                                    @error('password') is-invalid @enderror" name="password">
                            </div>
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-name">Konfirmasi Kata Sandi</label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" id="basic-default-name"
                                    @error('password') is-invalid @enderror" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-3">
                           <label class="col-sm-2 col-form-label" for="basic-default-company">Status</label>
                            <div class="col-sm-10">
                                <select id="defaultSelect" class="form-select" name="is_admin">
                                    <option selected="">Status Pengguna</option>
                                    <option value="admin">Admin</option>
                                    <option value="atasan">Atasan</option>
                                    <option value="guru">Guru</option>
                                    <option value="siswa">Siswa</option>
                                </select>
                            </div>
                            </div>

                        <div class="row justify-content-end">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">Tambah</button>
                            </div>
                        </div>
                         </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
