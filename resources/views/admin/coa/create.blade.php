@extends('layouts.main')

@section('container')

    <div class="row">
        <div class="col">
            <button class="btn btn-primary mb-2" onclick="goBack()"><i class="fas fa-arrow-left"></i> Kembali</button>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">{{ $title }}</h3>
        </div>
        <div class="card-body">
            <form action="/coa" method="POST">
                @csrf
                <div class="form-group">
                    <label for="no_coa">No Akun</label>
                    <input type="number" name="no_coa" id="no_coa" class="form-control @error('no_coa') is-invalid @enderror" value="{{ old('no_coa') }}" placeholder="Contoh: 111">
                    @error('no_coa')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nama_coa">Nama Akun</label>
                            <input type="text" name="nama_coa" id="nama_coa" class="form-control @error('nama_coa') is-invalid @enderror" value="{{ old('nama_coa') }}" placeholder="Contoh : Kas">
                            @error('nama_coa')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="jenis_coa">Jenis Akun</label>
                            <select name="jenis_coa" id="jenis_coa" class="form-control @error('jenis_coa') is-invalid @enderror select2bs4">
                                <option value="">Pilih Jenis Coa</option>
                                <option value="1">Aktiva</option>
                                <option value="2">Utang</option>
                                <option value="3">Modal</option>
                                <option value="4">Pendapatan</option>
                                <option value="5">Beban</option>
                            </select>
                            @error('jenis_coa')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>
                <input type="hidden" name="saldo_awal" id="saldo_awal" value="0" readonly>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
    
@endsection