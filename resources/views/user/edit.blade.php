@extends('layouts.backend')
@section('content')
    <div class="row">
        <!-- Basic Layout -->
        <div class="col-xxl">
            <div class="card mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Mengubah Data Pengguna</h5>
                    <a type="button" href="{{route('user.index')}}" class="btn rounded-pill btn-success float-end">Kembali</a>
                </div>
                <div class="card-body">
                    <form action="{{route('user.update', $user->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-name">Nama</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="basic-default-name" @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}">
                            </div>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-name">Email</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="basic-default-name" @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}">
                            </div>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-company">Status</label>
                            <div class="col-sm-10">
                                <select id="defaultSelect" class="form-select" name="is_admin">
                                    <option selected="">Status Pengguna</option>
                                    <option value="admin" {{$user->is_admin == 'admin' ? 'selected' : ''}}>Admin</option>
                                    <option value="atasan" {{$user->is_admin == 'atasan' ? 'selected' : ''}}>Atasan</option>
                                    <option value="guru" {{$user->is_admin == 'guru' ? 'selected' : ''}}>Guru</option>
                                    <option value="siswa" {{$user->is_admin == 'siswa' ? 'selected' : ''}}>Siswa</option>
                                </select>
                            </div>
                            </div>

                        <div class="row justify-content-end">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">Ubah</button>
                            </div>
                        </div>
                         </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
