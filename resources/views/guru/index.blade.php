@extends('layouts.backend')
@section('content')
    <div class="card">
        <div class="card-header d-flex align-items-center justify-content-between">
            <h5>Data Guru</h5>
            <a type="button" href="{{ route('guru.create') }}" class="btn rounded-pill btn-success float-end">Tambah</a>
        </div>
        <div class="table-responsive text-nowrap">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Mata Pelajaran</th>
                        <th>Foto</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach ($guru as $data)
                        <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{ $data->nama }}</strong>
                            </td>
                            <td>{{ $data->mapel->nama_pelajaran }}</td>
                            <td>
                                <img src="{{ asset('images/foto/' . $data->foto) }}" alt="Avatar" class="rounded-circle"
                                    style="width: 100px;" height="100px;">
                            </td>
                            <td>
                                <form action="{{ route('guru.destroy', $data->id) }}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                            data-bs-toggle="dropdown">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="{{ route('guru.show', $data->id) }}"><i
                                                    class="bx bx-show-alt me-1"></i>Lihat</a>
                                            <a class="dropdown-item" href="{{ route('guru.edit', $data->id) }}"><i
                                                    class="bx bx-edit-alt me-1"></i>Edit</a>
                                            <a type="submit" class="dropdown-item" href="{{ route('guru.destroy', $data->id) }}" data-confirm-delete="true"><i
                                                    class="bx bx-trash me-1"></i>Hapus</a>
                                        </div>
                                    </div>
                                </form>
        </div>
        </td>
        </tr>
        @endforeach
        </tbody>
        </table>
    </div>
    </div>
@endsection
