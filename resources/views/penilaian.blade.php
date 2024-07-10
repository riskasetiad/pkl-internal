@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        @if (Auth::user()->is_admin == 'admin')
                            <div class="row col-5">
                                @foreach ($nilai as $data)
                                    <p class="fw-bold text-center mt-3">{{ $data->pertanyaan }}</p>
                                    <form class="px-4" action="">
                                        <p class="fw-bold"></p>
                                        <div class="form-check mb-2">
                                            <input class="form-check-input" type="radio" name="exampleForm"
                                                id="radioExample1" />
                                            <label class="form-check-label" for="radioExample1">
                                                Option 1
                                            </label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input class="form-check-input" type="radio" name="exampleForm"
                                                id="radioExample2" />
                                            <label class="form-check-label" for="radioExample2">
                                                Option 2
                                            </label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input class="form-check-input" type="radio" name="exampleForm"
                                                id="radioExample3" />
                                            <label class="form-check-label" for="radioExample3">
                                                Option 3
                                            </label>
                                        </div>


                                        @endforeach
                            </div>
                        <div class="text-end">
                            <button type="button" data-mdb-button-init data-mdb-ripple-init
                                class="btn btn-primary">Submit</button>
                        </div>
                        </form>
                    @elseif (Auth::user()->is_admin == 'atasan')
                        Login Sebagai Atasan
                    @elseif (Auth::user()->is_admin == 'guru')
                        Login Sebagai Guru
                    @elseif (Auth::user()->is_admin == 'siswa')
                        Login Sebagai Siswa
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
