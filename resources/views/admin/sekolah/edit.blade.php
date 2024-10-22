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
        <form method="POST" action="/sekolah/{{ $sekolahs->id }}" enctype="multipart/form-data">
        @method('put')
        @csrf
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div id="map" style="height: 820px"></div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="nama_sekolah">Nama Sekolah</label>
                        <input type="text" id="nama_sekolah" name="nama_sekolah" class="form-control @error('nama_sekolah') is-invalid @enderror" value="{{ old('nama_sekolah', $sekolahs->nama_sekolah) }}" placeholder="Masukkan Nama Sekolah">
                        @error('nama_sekolah')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="tahun">Tahun Berdiri</label>
                                <select name="tahun" id="tahun" class="form-control @error('tahun') is-invalid @enderror select2bs4">
                                    <option>Pilih Tahun</option>
                                    @if (old('tahun', $sekolahs->tahun) == $sekolahs->tahun)
                                        <option value="{{ $sekolahs->tahun }}" selected>{{ $sekolahs->tahun }}</option>
                                    @endif
                                </select>
                                {{-- <input type="text" id="since" name="since" class="form-control @error('since') is-invalid @enderror" value="{{ old('since', $sekolahs->since) }}" placeholder="Masukkan Tahun Berdiri"> --}}
                                @error('tahun')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="kategori">Kategori</label>
                                <select name="kategori" id="kategori" class="form-control @error('kategori') is-invalid @enderror select2bs4">
                                <option value="">Pilih Kategori</option>
                                <option value="Swasta" {{ ($sekolahs->kategori === 'Swasta') ? 'Selected' : '' }} >Swasta</option>
                                <option value="Negeri" {{ ($sekolahs->kategori === 'Negeri') ? 'Selected' : '' }}>Negeri</option>
                                <option value="Luar Biasa" {{ ($sekolahs->kategori === 'Luar Biasa') ? 'Selected' : '' }}>Luar Biasa</option>
                                </select>
                                @error('kategori')
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
                                <label for="kota_id">Kota</label>
                                <select name="kota_id" id="kota_id" class="form-control @error('kota_id') is-invalid @enderror select2bs4">
                                    <option value="">Pilih Kota</option>
                                    @foreach ($kotas as $kota)
                                        @if (old('kota_id', $sekolahs->kota_id) == $kota->id)
                                            <option value="{{ $kota->id }}" selected>{{ $kota->nama_kota }}</option>    
                                        @else
                                            <option value="{{ $kota->id }}">{{ $kota->nama_kota }}</option>
                                        @endif
                                    @endforeach
                                </select>
                                @error('kota_id')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="kecamatan_id">Kecamatan</label>
                                <select name="kecamatan_id" id="kecamatan_id" class="form-control @error('kecamatan_id') is-invalid @enderror select2bs4">
                                    <option value="">Pilih Kecamatan</option>
                                    @foreach ($kec as $kc)
                                        @if (old('kecamatan_id', $sekolahs->kecamatan_id) == $kc->id)
                                        <option value="{{ $kc->id }}" selected>{{ $kc->nama_kecamatan }}</option>
                                        @else
                                        <option value="{{ $kc->id }}">{{ $kc->nama_kecamatan }}</option>
                                        @endif
                                    @endforeach
                                </select>
                                @error('kecamatan_id')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat Lengkap</label>
                        <textarea name="alamat" id="alamat" cols="30" rows="3" class="form-control @error('alamat') is-invalid @enderror">{{ old('alamat', $sekolahs->alamat) }}</textarea>
                        @error('alamat')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="lokasi">Lokasi</label>
                        <input type="text" id="lokasi" name="lokasi" class="form-control @error('lokasi') is-invalid @enderror" value="{{ old('lokasi', $sekolahs->lokasi) }}" readonly>
                        @error('lokasi')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                    </div>
                    <div class="form-group">
                        <label for="jumlah_siswa">Jumlah Siswa</label>
                        <input type="text" id="jumlah_siswa" name="jumlah_siswa" class="form-control @error('jumlah_siswa') is-invalid @enderror" value="{{ old('jumlah_siswa', $sekolahs->jumlah_siswa) }}">
                        @error('jumlah_siswa')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                    </div>
                    <div class="form-group">
                        <label for="foto">Foto</label>
                        <div class="card" style="width: 100px">
                            <img src="{{ asset('storage/'. $sekolahs->foto) }}" class="mt-1 mb-2" alt="" width="100px">
                        </div>
                        <input type="hidden" id="foto_lama" name="foto_lama" value="{{ $sekolahs->foto }}">
                        <input type="file" id="foto" name="foto" class="form-control @error('foto') is-invalid @enderror">
                        @error('foto')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                    </div>
                    <div class="form-group">
                            <label for="deskripsi">Deskripsi</label>
                            <textarea name="deskripsi" id="deskripsi" cols="10" rows="5" class="form-control @error('deskripsi') is-invalid @enderror">{{ old('deskripsi', $sekolahs->deskripsi) }}</textarea>
                            @error('deskripsi')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </div>
        </form>
    </div>

{{-- JS Leaflet --}}
<script src="https://unpkg.com/leaflet@1.8.0/dist/leaflet.js" integrity="sha512-BB3hKbKWOc9Ez/TAwyWxNXeoV9c1v6FIeYiBieIWkpLjauysF18NzgR1MBNBXf8/KABdlkX68nAhlwcDFLGPCQ==" crossorigin=""></script>
<script src="{{ asset('leaflet-search/src/leaflet-search.js') }}"></script>
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
        layers: [osm, satellite]
    });

    var baseMaps = {
        "Streets": streets,
        "Satellite": satellite
    };

    var overlayMaps = {
        "Streets": streets,
        "Satellite": satellite
    };

    maps.addControl( new L.control.search({
            url: 'https://nominatim.openstreetmap.org/search?format=json&q={s}',
            jsonParam: 'jsoncallback',
            propertyName: 'display_name',
            propertyLoc: ['lat','lon'],
            marker: L.circleMarker([0,0],{radius:50}),
            autoCollapse: true,
            autoType: false,
            minLength: 2
    }));

    layerControl = L.control.layers(baseMaps, overlayMaps).addTo(maps);

    // Start Maps-action

    var marker = L.marker([{{ $sekolahs->lokasi }}]).addTo(maps);

    var marker

    var loc = document.querySelector("[name=lokasi]");

    maps.on('click', function(e) {
        if(marker){
            maps.removeLayer(marker);
        }
        marker = new L.marker(e.latlng, {draggable:'true'}).addTo(maps);
        marker.on('dragend', function(event){
        var marker = event.target;
        var lokasi = marker.getLatLng();
        marker.setLatLng(new L.LatLng(lokasi.lat, lokasi.lng),{draggable:'true'}).bindPopup(lokasi).update();
        //   maps.panTo(new L.LatLng(lokasi.lat, lokasi.lng))
        $('#location').val(lokasi.lat + "," + lokasi.lng).keyup()
        });
        maps.addLayer(marker);
    
            var lat = e.latlng.lat;
            var lng = e.latlng.lng;
        
            loc.value = lat + "," + lng;
    });

    // End Maps-action
</script>


@endsection