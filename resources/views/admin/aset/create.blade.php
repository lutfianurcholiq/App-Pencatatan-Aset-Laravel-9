@extends('layouts.main')

@section('container')

    <div class="row">
        <div class="col-sm-6">
            <button class="btn btn-primary" onclick="goBack()"><i class="fas fa-arrow-left"></i> Kembali</button>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right mb-0">
                <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="/aset">Master Data Aset</a></li>
                <li class="breadcrumb-item active">Tambah Data Aset</li>
            </ol>
        </div>
    </div>

    <div class="card" style="width: 50%;">
        <div class="card-header">
            <h3 class="card-title">Catatan</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fas fa-minus"></i>
                </button>
                {{-- <button type="button" class="btn btn-tool" data-card-widget="remove">
                  <i class="fas fa-times"></i>
                </button> --}}
            </div>
        </div>
        <div class="card-body">
            <h6 class="text-danger">*Input hanya untuk aset tetap atau permanen, selain itu tidak dapat dilakukan perhitungan</h6>
        </div>
    </div>

    <div class="card mb-3">
        <div class="card-header">
            <h3 class="card-title">{{ $title }}</h3>
        </div>
        <form method="POST" action="/aset" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label for="nama_aset">Nama Aset</label>
                <input type="text" id="nama_aset" name="nama_aset" class="form-control @error('nama_aset') is-invalid @enderror" value="{{ old('nama_aset') }}" placeholder="Masukkan Nama Aset">
                @error('nama_aset')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="jenis_aset">Jenis Aset</label>
                        <select name="jenis_aset" id="jenis_aset" class="form-control @error('jenis_aset') is-invalid @enderror select2bs4">
                            <option value="">Pilih Jenis Aset</option>
                            <option value="aset tetap"> Aset Tetap</option>
                        </select>
                        @error('jenis_aset')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="sekolah_id">Sekolah</label>
                        <select name="sekolah_id" id="sekolah_id" class="form-control @error('sekolah_id') is-invalid @enderror select2bs4">
                            <option value="">Pilih Sekolah</option>
                        @foreach ($sekolahs as $sklh)
                            @if (old('sekolah_id') == $sklh->id)
                                <option value="{{ $sklh->id }}" selected>{{ $sklh->nama_sekolah }}</option>
                            @else    
                                <option value="{{ $sklh->id }}">{{ $sklh->nama_sekolah }}</option>
                            @endif
                        @endforeach
                        </select>
                        @error('sekolah_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="tahun">Tahun Beli</label>
                        <select name="tahun" id="tahun" class="form-control @error('tahun') is-invalid @enderror select2bs4">
                            <option>Pilih Tahun</option>
                            @if (old('tahun') != NULL)
                            <option value="{{ old('tahun') }}" selected>{{ old('tahun') }}</option>
                            @endif
                        </select>
                        @error('tahun')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="harga_beli">Harga Perolehan</label>
                        <input type="number" id="harga_beli" name="harga_beli" class="form-control @error('harga_beli') is-invalid @enderror" value="{{ old('harga_beli') }}" placeholder="Masukkan Harga Perolehan">
                        @error('harga_beli')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="foto_aset">Foto</label>
                        <input type="file" id="foto_aset" name="foto_aset" class="form-control @error('foto_aset') is-invalid @enderror">
                        @error('foto_aset')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="confirm_susut" id="confirm_susut" value="susut">
                    <label class="form-check-label">Lakukan perhitungan penyusutan</label>
                </div>
                <p class="text-danger">*Opsional, Perhitungan dapat dilakukan di menu <a href="/penyusutan" style="text-decoration: none">penyusutan</a></p>
            </div>
            <input type="hidden" name="status" id="status" value="" readonly>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
        </form>
    </div>
    
@endsection