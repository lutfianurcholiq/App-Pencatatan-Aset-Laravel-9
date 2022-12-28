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
                <li class="breadcrumb-item active">Edit Data Aset</li>
            </ol>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">{{ $title }}</h3>
        </div>
        <form method="POST" action="/aset/{{ $asets->id }}" enctype="multipart/form-data">
        @method('put')
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label for="nama_aset">Nama Aset</label>
                <input type="text" id="nama_aset" name="nama_aset" class="form-control @error('nama_aset') is-invalid @enderror" value="{{ old('nama_aset', $asets->nama_aset) }}" placeholder="Masukkan Nama Aset">
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
                        <select name="jenis_aset" id="jenis_aset" class="form-control @error('jenis_aset') is-invaid @enderror select2bs4">
                            <option value="">Pilih Jenis Aset</option>
                            <option value="aset tetap" {{ ($asets->jenis_aset === 'aset tetap') ? 'Selected' : '' }}> Aset Tetap</option>
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
                            @if (old('sekolah_id', $asets->sekolah_id) == $sklh->id)
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
                            @if (old('tahun', $asets->tahun) == $asets->tahun)
                                <option value="{{ $asets->tahun }}" selected>{{ $asets->tahun }}</option>
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
                        <input type="text" id="harga_beli" name="harga_beli" class="form-control @error('harga_beli') is-invalid @enderror" value="{{ old('harga_beli', $asets->harga_beli) }}" placeholder="Masukkan Harga Perolehan">
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
                        <img src="{{ asset('storage/'. $asets->foto_aset) }}" class="d-block" alt="foto aset lama" width="100px">
                        <input type="hidden" id="foto_aset_lama" name="foto_aset_lama" value="{{ $asets->foto_aset }}">
                        <input type="file" id="foto_aset" name="foto_aset" class="form-control @error('foto_aset') is-invalid @enderror">
                        @error('foto_aset')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
        </form>
    </div>
    
@endsection