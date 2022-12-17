@extends('layouts.main')

@section('container')

    <div class="row">
        <div class="col-sm-6">
            <button class="btn btn-primary" onclick="goBack()"><i class="fas fa-arrow-left"></i> Kembali</button>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="/aset">Master Data Aset</a></li>
                <li class="breadcrumb-item active">Detail Data Aset</li>
            </ol>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <h5 class="card-title">{{ $title }}</h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <thead></thead>
                        <tbody>
                            <tr>
                                <td>Nama Aset</td>
                                <td>{{ $asets->nama_aset }}</td>
                            </tr>
                            <tr>
                                <td>Sekolah</td>
                                <td>{{ $asets->sekolah->nama_sekolah }}</td>
                            </tr>
                            <tr>
                                <td>Jenis Aset</td>
                                <td class="text-uppercase">{{ $asets->jenis_aset }}</td>
                            </tr>
                            <tr>
                                <td>Tahun Perolehan Aset</td>
                                <td>{{ $asets->tahun }}</td>
                            </tr>
                            <tr>
                                <td>Harga Perolehan Aset</td>
                                <td>@mataUang($asets->harga_beli)</td>
                            </tr>
                            <tr>
                                <td>Status Aset</td>
                                @if ($asets->status == 'telah disusutkan')
                                    <td><span class="badge badge-success">{{ $asets->status }}</span></td>
                                @else
                                    <td><span class="badge badge-danger">{{ $asets->status }}</span></td>
                                @endif
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-md-6">
                    <img src="{{ asset('storage/'. $asets->foto_aset) }}" alt="foto aset" width="180px" style="display: block; margin: auto;">
                </div>
            </div>
        </div>
    </div>
    
@endsection