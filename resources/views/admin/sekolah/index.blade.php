@extends('layouts.main')

@section('container')

    <div class="row">
        <div class="col">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
            <li class="breadcrumb-item active">Master Data Sekolah</li>
        </ol>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{ session('success') }}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">{{ $title }}</h3>
        </div>
        <div class="card-body">
            @if (auth()->user()->role != 'admin')
                <a href="sekolah/create" class="btn btn-primary mb-3"><i class="nav-icon fas fa-plus"></i> Tambah</a>
                <button class="btn btn-info float-right" onclick="print()"><i class="nav-icon fas fa-print"> </i></button>
            @else
                <button class="btn btn-info mb-3" onclick="print()"><i class="nav-icon fas fa-print"> </i></button>
            @endif
        <table id="dataTables" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Sekolah</th>
                    <th>Kategori</th>
                    <th>Foto</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($sekolahs as $sekolah)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $sekolah->nama_sekolah }}</td>
                        <td>{{ $sekolah->kategori }}</td>
                        {{-- <td>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ModalMaps{{ $sekolah->id }}">Maps</button>
                        </td> --}}
                        <td>
                            <button class="" style="border: none" data-toggle="modal" data-target="#modalFoto{{ $sekolah->id }}">
                                <img src="{{ asset('storage/'. $sekolah->foto) }}" width="70px" alt="Foto sekolah Sekolah">
                            </button>
                        </td>
                        <td>
                            <a href="/sekolah/{{ $sekolah->id }}" class="btn btn-primary"><i class="far fa-eye"></i></a>
                            @if (auth()->user()->role != 'admin')
                            <a href="/sekolah/{{ $sekolah->id }}/edit/" class="btn btn-secondary ml-1"><i class="far fa-edit"></i></a>
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#ModalDelete{{ $sekolah->id }}"><i class="far fa-trash-alt"></i></button>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                @foreach ($sekolahs as $sekolah)
                <!-- Modal Delete -->
                <div class="modal fade" id="ModalDelete{{ $sekolah->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">{{ $confirm }}</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                            </div>
                            <div class="modal-body">
                                <p>Ingin Hapus data sekolah sekolah {{ $sekolah->nama_sekolah }}?</p>
                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                            <form action="/sekolah/{{ $sekolah->id }}" method="POST">
                                @method('delete')
                                @csrf
                                <button type="submit" class="btn btn-danger">Yakin</button>
                            </form>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- End Modal Delete --}}

                <!-- Modal Foto -->
                <div class="modal fade" id="modalFoto{{ $sekolah->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Foto Sekolah {{ $sekolah->nama_sekolah }}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <img src="{{ asset('storage/'. $sekolah->foto) }}" alt="" width="700px">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                    </div>
                </div>
                {{-- End Modal Foto --}}

                @endforeach
            </table>
        </div>
    </div>

@endsection