@extends('layouts.main')

@section('container')

    <div class="row">
        <div class="col-md-6">
            <button class="btn btn-primary mb-2" onclick="goBack()"><i class="fas fa-arrow-left"></i> Kembali</button>
        </div>
        <div class="col-md-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="/laporan/kartu_aset">Kartu Penyusutan</a></li>
                <li class="breadcrumb-item active">Detail Kartu Penyusutan</li>
            </ol>
            </div>
    </div>

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">{{ $title }}</h3>
        </div>
        <div class="card-body">
            <h5 class="text-center">Perhitungan Aset</h5>
                <table class="table mb-2" style="width: 40%" align="center" border="0">
                    <thead></thead>
                    <tbody>
                        <tr>
                            <td>Nama Aset</td>
                            <td>{{ $susut[0]->nama_aset }}</td>
                        </tr>
                        <tr>
                            <td>Sekolah</td>
                            <td>{{ $susut[0]->nama_sekolah }}</td>
                        </tr>
                        <tr>
                            <td>Harga Perolehan Aset</td>
                            <td>@mataUang($susut[0]->harga_beli)</td>
                        </tr>
                        <tr>
                            <td>Tahun Perolehan Aset</td>
                            <td>{{ $susut[0]->tahun }}</td>
                        </tr>
                        <tr>
                            <td>Masa Manfaat Aset</td>
                            <td>{{ $susut[0]->masa_manfaat }} Tahun</td>
                        </tr>
                        <tr>
                            <td>Nilai Penyusutan Per Tahun</td>
                            <td>@mataUang($susut[0]->per_tahun)</td>
                        </tr>
                        <tr>
                            <td>Nilai Penyusutan Per Bulan</td>
                            <td>@mataUang($susut[0]->per_bulan)</td>
                        </tr>
                        <tr>
                            <td>Estimasi Nilai Sisa</td>
                            <td>@mataUang($susut[0]->estimasi_nilai_sisa)</td>
                        </tr>
                    </tbody>
                </table>        

                <table class="table table-bordered table-striped">
                    <thead>
                        <tr class="text-center">
                            <th>Tahun</th>
                            <th>Tarif Penyusutan</th>
                            <th>Akumulasi Penyusutan</th>
                            <th>Nilai Sisa/Buku</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td colspan="4" class="text-right">@mataUang($susut[0]->harga_beli)</td>
                        </tr>
                        @for ($i = ($susut[0]->tahun + 1); $i < ($susut[0]->tahun + $susut[0]->masa_manfaat + 2); $i++)
                            <tr>
                                <?php 
                                    $tariff = $susut[0]->per_bulan * 12;
                                    $tarif = $susut[0]->per_tahun;
                                    $akm = $tarif + $tariff;
                                    $susut[0]->per_tahun = $akm;                

                                    $temp = $susut[0]->harga_beli - $tariff;
                                    $susut[0]->harga_beli = $temp

                                ?>
                                <td class="text-center">{{ $i }}</td>
                                <td class="text-right">@mataUang($tariff)</td>
                                <td class="text-right">@mataUang($tarif)</td>
                                <td class="text-right">@mataUang($temp)</td>
                                {{-- <td>{{ $susut[0]-> }}</td> --}}
                            </tr>
                        @endfor
                        {{-- <tr>
                            <td colspan="3" class="text-right"><b>Total</b></td>
                        </tr> --}}
                    </tbody>
                </table>
        </div>
    </div>
    
@endsection