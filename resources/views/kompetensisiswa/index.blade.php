@extends('layouts.backend')
@section('content')
    {{-- @if (session('success'))
        <div class="alert alert-success fade show" role="alert">
            {{session('success')}}
        </div>
    @endif --}}
    <div class="card">
        <div class="card-header d-flex align-items-center justify-content-between">
            <h5>Data Kompetensi</h5>
            <a type="button" href="{{ route('kompetensisiswa.create') }}"
                class="btn rounded-pill btn-success float-end">Tambah</a>
        </div>
        <div class="table-responsive text-nowrap">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kompetensi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach ($kompetensiSiswa as $data)
                        <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <td><i class="fab fa-angular fa-lg text-danger me-3"></i>
                                <strong>{{ $data->kompetensi }}</strong></td>
                            <td>
                                <form action="{{ route('kompetensisiswa.destroy', $data->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                            data-bs-toggle="dropdown">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item"
                                                href="{{ route('kompetensisiswa.edit', $data->id) }}"><i
                                                    class="bx bx-edit-alt me-1"></i>Edit</a>
                                            <a type="submit" class="dropdown-item"
                                                href="{{ route('kompetensisiswa.destroy', $data->id) }}"
                                                data-confirm-delete="true"><i class="bx bx-trash me-1"></i>Hapus</a>
                                        </div>
                                    </div>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection