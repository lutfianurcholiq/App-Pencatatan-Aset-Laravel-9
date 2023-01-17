@extends('layouts.main')

@section('container')

    <div class="row">
        <div class="col-sm-6">
            <button class="btn btn-primary mb-2" onclick="goBack()"><i class="fas fa-arrow-left"></i> Kembali</button>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="/sekolah">Master Data Sekolah</a></li>
                <li class="breadcrumb-item active">Tambah Data Sekolah</li>
            </ol>
        </div>
    </div>
    
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">{{ $title }}</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                        <table class="table table-striped">
                            <thead>
                                <tr></tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Nama Sekolah</td>
                                    <td><b>{{ $sekolahs->nama_sekolah }}</b> - {{ $sekolahs->kategori }}</td>
                                </tr>
                                <tr>
                                    <td>Tahun Berdiri</td>
                                    <td><b>{{ $sekolahs->tahun }}</b></td>
                                </tr>
                                <tr>
                                    <td>Jumlah Aset</td>
                                    <td><b>{{ $aset }}</b><button type="button" class="btn btn-primary float-right mr-3" data-toggle="modal" data-target="#detailAset">Lihat Aset</button></td>
                                </tr>
                                <tr>
                                    <td>Jumlah Siswa</td>
                                    <td><b>{{ number_format($sekolahs->jumlah_siswa) }}</b> Siswa</td>
                                </tr>
                                <tr>
                                    <td>Kota</td>
                                    <td><b>{{ $sekolahs->kota->nama_kota }}</b></td>
                                </tr>
                                <tr>
                                    <td>Kecamatan</td>
                                    <td><b>{{ $sekolahs->kecamatan->nama_kecamatan }}</b></td>
                                </tr>
                                <tr>
                                    <td>Alamat</td>
                                    <td><b>{{ $sekolahs->alamat }}</b></td>
                                </tr>
                                <tr>
                                    <td>Deskripsi</td>
                                    <td><b>{!! $sekolahs->deskripsi !!}</b></td>
                                </tr>
                            </tbody>
                        </table>
                        <!-- Modal -->
                        <div class="modal fade" id="detailAset" tabindex="-1" aria-hidden="true" data-backdrop="static" data-keyboard="false">
                            <div class="modal-dialog modal-dialog-scrollable">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">{{ $title }}</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <table class="table table-bordered table-striped">
                                        <thead>
                                            <th>Nama Aset</th>
                                            <th>Status Aset</th>
                                        </thead>
                                        <tbody>
                                            @foreach ($asets as $st)
                                                <tr>
                                                    <td>{{ $st->nama_aset }}</td>
                                                    @if ($st->status == 'belum disusutkan')
                                                        <td><span class="badge badge-danger">{{ $st->status }}</span></td>
                                                    @else
                                                        <td><span class="badge badge-success">{{ $st->status }}</span></td>
                                                    @endif
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                                </div>
                            </div>
                            </div>
                        </div>
                </div>
                <div class="col-lg-6">
                    <div id="map" style="height: 500px"></div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://unpkg.com/leaflet@1.8.0/dist/leaflet.js" integrity="sha512-BB3hKbKWOc9Ez/TAwyWxNXeoV9c1v6FIeYiBieIWkpLjauysF18NzgR1MBNBXf8/KABdlkX68nAhlwcDFLGPCQ==" crossorigin=""></script>
    <script>
        // LEAFLET JS 
            var mbAttr = 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>';
            
            var mapboxUrl = 'https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw';
            
            
            var osm = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                zoom: 15
            });
            
            var streets = L.tileLayer(mapboxUrl, {
                id: 'mapbox/streets-v11',
                tileSize: 512,
                zoomOffset: -1,
                attribution: mbAttr
            }),
            
            satellite = L.tileLayer(mapboxUrl, {
                id: 'mapbox/satellite-v9',
                tileSize: 512,
                zoomOffset: -1,
                attribution: mbAttr
            });

            var maps = L.map('map', {
                center: [{{ $sekolahs->lokasi }}],
                zoom: 15,
                layers: [streets, satellite]
            });

            maps.invalidateSize(true);
            var marker = L.marker([{{ $sekolahs->lokasi }}]).addTo(maps);
            
            var baseMaps = {
                "Streets": streets,
                "Satellite": satellite
            };
            
            var overlayMaps = {
                "Streets": streets,
                "Satellite": satellite
            };
            
            layerControl = L.control.layers(baseMaps, overlayMaps).addTo(maps);

            
        </script>


@endsection