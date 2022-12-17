@extends('layouts.main')

@section('container')

    <div class="row">
        <div class="col">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
            <li class="breadcrumb-item active">Jurnal</li>
        </ol>
        </div>
    </div>

    <form action="/jurnal" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <label for="">Tanggal Awal</label>
                    <input type="date" class="form-control @error('tanggal_awal') is-invalid @enderror" name="tanggal_awal" id="tanggal_awal" value="{{ old('tanggal_awal') }}">
                    @error('tanggal_awal')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>   
                    @enderror
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="">Tanggal Akhir</label>
                    <input type="date" name="tanggal_akhir" id="tanggal_akhir" class="form-control @error('tanggal_akhir') is-invalid @enderror" value="{{ old('tanggal_akhir') }}">
                    @error('tanggal_akhir')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>   
                    @enderror
                </div>
            </div>
            <div class="col-md-3" style="margin-top: 32px;">
                <button type="submit" class="btn btn-primary">Cari</button>
            </div>
        </div>
    </form>

    <div class="card mt-4">
        <div class="card-header">
            <h5 class="card-title">{{ $title }}</h5>
        </div>
        <div class="card-body">
            <button class="btn btn-info mb-3 float-right" onclick="print()"><i class="nav-icon fas fa-print"> </i></button>
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Tanggal</th>
                        <th>Akun</th>
                        <th>Ref</th>
                        <th>Debit</th>
                        <th>Kredit</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($jurnals as $jurnal)
                        <tr>
                            <td>{{ $jurnal->tgl_jurnal }}</td>
                            @if ($jurnal->posisi_dr_cr == 'Debit')
                                <td>{{ $jurnal->nama_coa }} - {{ $jurnal->nama_sekolah }}</td>
                            @else
                                <td style="text-indent: 0.5in">{{ $jurnal->nama_coa }} - {{ $jurnal->nama_sekolah }}</td>
                            @endif
                            <td>{{ $jurnal->no_coa }}</td>
                            @if ($jurnal->posisi_dr_cr == 'Debit')
                                <td>@mataUang($jurnal->nominal)</td>
                            @else
                                <td></td>
                            @endif
                            @if ($jurnal->posisi_dr_cr == 'Kredit')
                                <td>@mataUang($jurnal->nominal)</td>
                            @else
                                <td></td>
                            @endif
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    
@endsection