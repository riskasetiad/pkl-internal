@extends('layouts.backend')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-xxl">
                <div class="card mb-4">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h5 class="mb-0">Menambahkan Kompetensi</h5>
                        <a type="button" href="{{route('kompetensi.index')}}" class="btn rounded-pill btn-success float-end">Kembali</a>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('kompetensi.store') }}">
                        @csrf
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-default-name">Kompetensi</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control @error('kompetensi') is-invalid @enderror" id="basic-default-name" name="kompetensi" required>
                                    @error('kompetensi')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{$message}}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row justify-content-end">
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary">Tambah</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
