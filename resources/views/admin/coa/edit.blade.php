@extends('layouts.main')

@section('container')

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">{{ $title }}</h3>
        </div>
        <div class="card-body">
            <form action="/coa/{{ $coas->id }}" method="POST">
                @method('put')
                @csrf
                <div class="form-group">
                    <label for="no_coa">No Akun</label>
                    <input type="number" name="no_coa" id="no_coa" class="form-control @error('no_coa') is-invalid @enderror" value="{{ old('no_coa', $coas->no_coa) }}" placeholder="Contoh: 111" readonly>
                    <p class="text-danger">*No akun tidak dapat diubah</p>
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
                            <input type="text" name="nama_coa" id="nama_coa" class="form-control @error('nama_coa') is-invalid @enderror" value="{{ old('nama_coa', $coas->nama_coa) }}" placeholder="Contoh : Kas">
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
                                <option value="1" {{ ($coas->jenis_coa === '1') ? 'Selected' : '' }}>Aktiva</option>
                                <option value="2" {{ ($coas->jenis_coa === '2') ? 'Selected' : '' }}>Utang</option>
                                <option value="3" {{ ($coas->jenis_coa === '3') ? 'Selected' : '' }}>Modal</option>
                                <option value="4" {{ ($coas->jenis_coa === '4') ? 'Selected' : '' }}>Pendapatan</option>
                                <option value="5" {{ ($coas->jenis_coa === '5') ? 'Selected' : '' }}>Beban</option>
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