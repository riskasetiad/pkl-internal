@extends('layouts.backend')
@section('content')
    <div class="row">
        <!-- Basic Layout -->
        <div class="col-xxl">
            <div class="card mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Mengubah Pertanyaan</h5>
                    <a type="button" href="{{route('pertanyaan.index')}}" class="btn rounded-pill btn-success float-end">Kembali</a>
                </div>
                <div class="card-body">
                    <form action="{{route('pertanyaan.update', $pertanyaanAtasan->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-name">Pertanyaan</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="basic-default-name" @error('pertanyaan') is-invalid @enderror" name="pertanyaan" value="{{ $pertanyaanAtasan->pertanyaan }}">
                            </div>
                            @error('pertanyaan')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-company">Kompetensi</label>
                            <div class="col-sm-10">
                                <select id="defaultSelect" class="form-select" @error('id_kompetensi') is-invalid @enderror" name="id_kompetensi" value="{{ $pertanyaanAtasan->id_kompetensi }}">
                                    <option>Pilih Kompetensi</option>
                                    @foreach ($kompetensiAtasan as $data)
                                        <option value="{{$data->id}}" {{ $data->id == $pertanyaanAtasan->id_kompetensi ? 'selected' : '' }}>{{$data->kompetensi}}</option>
                                    @endforeach
                                </select>
                                @error('id_kompetensi')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{$message}}</strong>
                                    </span>
                                @enderror
                            </div>
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
