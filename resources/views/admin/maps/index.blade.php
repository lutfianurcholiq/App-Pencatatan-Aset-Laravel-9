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

                    @foreach($sekolahs as $sekolah)
                        L.marker([{{ $sekolah->lokasi }}])
                        .bindPopup(
                            "<div>{{ $sekolah->nama_sekolah }}</div>" + 
                            "<div><a href='/sekolah/{{ $sekolah->id }}' class='btn btn-primary btn-sm text-white' style='text-decoration:none'>Detail</a></div>" +
                            "<div></div>"
                        ).addTo(maps);
                    @endforeach

                }
                
                layerControl = L.control.layers(baseMaps, overlayMaps).addTo(maps);
                
        </script>
    
@endsection