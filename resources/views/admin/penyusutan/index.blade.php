@extends('layouts.main')

@section('container')

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
        </div>
    </div>

    <form action="/penyusutan" method="get">
        {{-- @csrf --}}
        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <label for="">Sekolah</label>
                    <select name="sekolah_id" id="sekolah_id" class="form-control select2bs4" required>
                        <option value="">Pilih Sekolah</option>
                        @foreach ($sekolahs as $sklh)
                            @if (old('sekolah_id') == $sklh->id) 
                                <option value="{{ $sklh->id }}" selected>{{ $sklh->nama_sekolah }}</option>
                            @else
                                <option value="{{ $sklh->id }}">{{ $sklh->nama_sekolah }}</option>    
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="cari_aset">Aset</label>
                    <select name="cari_aset" id="cari_aset" class="form-control select2bs4" wid>
                        <option value="null">Pilih Aset</option>
                    </select>
                </div>
            </div>
            <div class="col-md-3" style="margin-top: 32px;">
                <button type="submit" class="btn btn-primary">Cari</button>
            </div>
        </div>
    </form>

    @if (request('cari_aset'))
        <div class="card mt-4" id="card-susut">
            <div class="card-header">
                <h3 class="card-title">{{ $title }}</h3>
            </div>
            <div class="card-body">
                <form action="/penyusutan" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Nama Sekolah</label>
                                <input type="text" id="" name="" class="form-control" value="{{ $aset[0]->nama_sekolah }}" readonly>
                                <input type="hidden" name="sekolah_id" id="sekolah_id" value="{{ $aset[0]->sekolah }}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Nama Aset</label>
                                <input type="text" id="" name="" class="form-control" value="{{ $aset[0]->nama_aset }}" readonly>
                                <input type="hidden" name="aset_id" id="aset_id" value="{{ $aset[0]->aset }}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Harga Beli</label>
                                <input type="text" id="" name="" class="form-control" value="@mataUang($aset[0]->harga_beli)" readonly>
                                <input type="hidden" id="harga_beli" name="harga_beli" class="form-control" value="{{ $aset[0]->harga_beli }}" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Tahun Aset</label>
                                <input type="text" id="" name="" class="form-control" value="{{ $aset[0]->tahun }}" readonly>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Estimasi Nilai Sisa</label>
                                <input type="text" class="form-control" id="" name="" value="@mataUang($aset[0]->harga_beli*0.10)" readonly>
                                <input type="hidden" class="form-control" id="estimasi_nilai_sisa" name="estimasi_nilai_sisa" value="{{ $aset[0]->harga_beli*0.10 }}" readonly>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Masa Manfaat</label>
                                <input type="text" class="form-control" id="masa_manfaat" name="masa_manfaat" value="20" readonly>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Nilai Penyusutan per tahun </label>
                                <input type="text" class="form-control" id="" name="" value="@mataUang(($aset[0]->harga_beli - 0) / 20)" readonly>
                                <input type="hidden" class="form-control" id="nilai_penyusutan" name="nilai_penyusutan" value="{{ ($aset[0]->harga_beli - 0) / 20 }}" readonly>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
                {{-- <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nilai Residu</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $aset[0]->nama_sekolah }}</td> 
                            <td>{{ $aset[0]->nama_aset }}</td> 
                        </tr>
                    </tbody>
                </table> --}}
            </div>
        </div> 
    @endif
    
@endsection