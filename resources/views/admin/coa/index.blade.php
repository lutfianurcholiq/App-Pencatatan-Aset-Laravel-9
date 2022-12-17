@extends('layouts.main')

@section('container')

    <div class="row">
        <div class="col">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
            <li class="breadcrumb-item active">Master Data COA</li>
        </ol>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
        @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div> 
        @endif
        @if (session()->has('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
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
                <a href="coa/create" class="btn btn-primary mb-3"><i class="nav-icon fas fa-plus"></i> Tambah</a>
                <button class="btn btn-info mb-3 float-right" onclick="print()"><i class="nav-icon fas fa-print"> </i></button>
            @else
                <button class="btn btn-info mb-3" onclick="print()"><i class="nav-icon fas fa-print"> </i></button>
            @endif
            <table id="dataTables" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode Akun</th>
                        <th>Nama Akun</th>
                        <th>Header Akun</th>
                        @if (auth()->user()->role != 'admin')
                        <th>Aksi</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @foreach ($coas as $coa)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $coa->no_coa }}</td>
                            <td>{{ $coa->nama_coa }}</td>
                            <td>{{ $coa->jenis_coa }}</td>
                            @if (auth()->user()->role != 'admin')
                            <td>
                                <a href="/coa/{{ $coa->id }}/edit" class="btn btn-secondary ml-1"><i class="nav-icon fas fa-edit"></i></a>
                                <button type="button" class="btn btn-danger ml-1" data-toggle="modal" data-target="#modalHapus{{ $coa->id }}"><i class="nav-icon fas fa-trash"></i></button>
                            </td>
                            @endif
                        </tr>
                    @endforeach
                </tbody>
                @foreach ($coas as $coa)
                <!-- Modal -->
                    <div class="modal fade" id="modalHapus{{ $coa->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Konfirmasi</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <div class="modal-body">
                                <p>Yakin ingin menghapus coa <b>{{ $coa->nama_coa }}</b>?</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <form action="/coa/{{ $coa->id }}" method="POST">
                                @method('delete')
                                @csrf
                                <button type="submit" class="btn btn-danger">Yakin</button>
                            </form>
                            </div>
                        </div>
                        </div>
                    </div>
                {{-- end modal --}}
                @endforeach
            </table>
        </div>
    </div>
    
@endsection