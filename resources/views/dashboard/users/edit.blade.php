@extends('layouts.app')

@section('title', 'Ubah data pengguna')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Ubah data pengguna</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></div>
                <div class="breadcrumb-item active"><a href="{{ route('users.index') }}">Data pengguna</a></div>
                <div class="breadcrumb-item "><a href="{{ route('users.edit', $user['id']) }}">Ubah data pengguna</a></div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary shadow">
                        <div class="card-body">
                            <form method="POST" action="{{ route('users.update', $user['id']) }}" class="needs-validation">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="firstName">Nama Depan</label>
                                            <input id="firstName" type="text"
                                                class="form-control @error('firstName') is-invalid @enderror" name="firstName"
                                                tabindex="1" value="{{$user['firstName']}}">
        
                                            @error('firstName')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="lastName">Nama Belakang</label>
                                            <input id="lastName" type="text"
                                                class="form-control @error('lastName') is-invalid @enderror" name="lastName"
                                                tabindex="1" value="{{$user['lastName']}}">
        
                                            @error('lastName')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                        Ubah data
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
