@extends('layouts.main')

@section('container')

        <div class="row">
            <div class="col">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                <li class="breadcrumb-item active">Maps</li>
            </ol>
            </div>
        </div>

        <div id="map" style="height: 450px;" class="mb-2"></div>

        <!-- Modal -->
        @foreach ($aset as $st)
        <div class="modal fade" id="detailAset{{ $st->id  }}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Detail Aset - {{ $st->nama_sekolah }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        {{-- <h6>Jumlah Aset : {{ $jmlh->jmlh_aset }}</h6> --}}
                        <table class="table table-bordered table-striped">
                            <thead>
                                <th>Nama Aset</th>
                                <th>Tahun Aset</th>
                                <th>Harga Perolehan Aset</th>
                                <th>Status Aset</th>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ $st->nama_aset }}</td>
                                    <td>{{ $st->tahun }}</td>
                                    <td>@mataUang($st->harga_beli)</td>
                                    @if ($st->status == 'telah disusutkan')
                                        <td><span class="badge badge-success">{{ $st->status }}</span></td>
                                    @else
                                        <td><span class="badge badge-danger">{{ $st->status }}</span></td>
                                    @endif
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        
        {{-- Leaflet --}}
        {{-- Leaflet search --}}
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
                }),

                dark = L.tileLayer(mapboxUrl, {
                    id: 'mapbox/dark-v10',
                    tileSize: 512,
                    zoomOffset: -1,
                    attribution: mbAttr
                });

                var maps = L.map('map', {
                    center: [-6.93426091622277,107.60530765201031],
                    zoom: 12,
                    layers: [streets]
                });

                var baseMaps = {
                    "Streets": streets,
                    "Satellite": satellite,
                    "Dark": dark
                };
                
                var overlayMaps = {
                    "Streets": streets,
                    "Satellite": satellite,
                    "Dark": dark
                };

                maps.invalidateSize(true);
                // var marker = L.marker([-6.968536014388396,107.63416761904159]).addTo(maps);

                @foreach($sekolahs as $sekolah)
                    L.marker([{{ $sekolah->lokasi }}]).addTo(maps);
                @endforeach

                var data = [
                    @foreach($sekolahs as $sekolah => $value)
                        {"loc":[{{ $value->lokasi }}], "title": '{!! $value->nama_sekolah !!}'},

                    @endforeach
                ];

                var markersLayer = new L.LayerGroup();
                maps.addLayer(markersLayer);
                var controlSearch = new L.control.search({
                    position: 'topleft',
                    layer: markersLayer,
                    initial: false,
                    zoom: 15,
                    markerLocation: true
                })

                maps.addControl(controlSearch);

                for(i in data){
                    var title = data[i].title,
                        loc = data[i].loc,
                        marker = new L.marker(new L.latLng(loc), {title: title}
                        );
                    markersLayer.addLayer(marker);

                    @foreach($aset as $st)
                        L.marker([{{ $st->lokasi }}])
                            .bindPopup(
                                "<div align='center'><b>{{ $st->nama_sekolah }}</b></div>" +
                                "<div><img class='mb-3 mt-3 justify-content-center' src='{{ asset('storage/'. $st->foto) }}' alt='Foto {{ $st->nama_sekolah }}' width='150px'></div>" + 
                                "<div><button type='button'class='btn btn-primary btn-sm btn-block' data-toggle='modal' data-target='#detailAset{{ $st->id }}'>Detail Aset</button></div>" +
                                "<div></div>"
                            ).addTo(maps);
                    @endforeach

                }
                
                layerControl = L.control.layers(baseMaps, overlayMaps).addTo(maps);
                
        </script>
    
@endsection