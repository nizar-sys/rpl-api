@extends('layouts.app')

@section('title', 'Data pengguna')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Data pengguna</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('home') }}">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="{{ route('users.index') }}">Data pengguna</a></div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary shadow">
                        <div class="card-header">
                            <a href="{{ route('users.create') }}" class="btn btn-primary btn-sm float-right"><i class="fas fa-plus"></i> Tambah data</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover" id="table-1">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Depan</th>
                                            <th>Nama Belakang</th>
                                            <th>Nama Lengkap</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($users['data'] as $user)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $user['firstName']}}</td>
                                                <td>{{ $user['lastName'] }}</td>
                                                <td>
                                                    <span class="badge badge-">{{ $user['firstName']. ' ' . $user['lastName'] }}</span>
                                                </td>
                                                <td>
                                                    <a href="{{ route('users.edit', $user['id']) }}"
                                                        class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                                                    <form action="{{ route('users.destroy', $user['id']) }}" method="POST"
                                                        class="d-inline" id="form-delete-{{$user['id']}}">
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>
                                                    <button class="btn btn-danger btn-sm" onclick="deleteData('{{ $user['id'] }}')"><i
                                                            class="fas fa-trash"></i></button>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="5">
                                                    Tidak ada data.
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('script')
    <script>
        function deleteData(id) {
            Swal.fire({
                title: 'Apakah anda yakin?',
                text: "Data yang dihapus tidak dapat dikembalikan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, hapus!'
            }).then((result) => {
                if (result.value) {
                    document.getElementById('form-delete-' + id).submit();
                }
            })
        }
    </script>
@endsection