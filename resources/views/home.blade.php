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
                   Login Sebagai Admin
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
