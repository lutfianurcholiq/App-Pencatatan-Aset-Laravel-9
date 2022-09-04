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
        center: [-6.972669, 107.63933],
        zoom: 15,
        layers: [osm, satellite]
    });
    // var marker = L.marker([-6.972669, 107.63933]).addTo(maps).bindPopup('My KOST').openPopup();
    // var polygon = L.polygon([
    //     [-6.972424, 107.639411],
    //     [-6.972403, 107.639132],
    //     [-6.973383, 107.638896],
    //     [-6.973452, 107.639223],
    //     [-6.972424, 107.639411]
    // ]).addTo(maps).bindPopup('E-10');
    // var polyline = L.polyline([
    //     [-6.971988, 107.640248],
    //     [-6.974432, 107.639819]
    // ]).addTo(maps);

    var baseMaps = {
        "Streets": streets,
        "Satellite": satellite
    };

    var overlayMaps = {
        "Streets": streets,
        "Satellite": satellite
    };

    layerControl = L.control.layers(baseMaps, overlayMaps).addTo(maps);

    // Start Maps-action

    var marker

    var loc = document.querySelector("[name=location]");

    maps.on('click', function(e) {
        if(marker){
            maps.removeLayer(marker);
        }
        marker = new L.marker(e.latlng, {draggable:'true'}).addTo(maps);
        marker.on('dragend', function(event){
          var marker = event.target;
          var location = marker.getLatLng();
          marker.setLatLng(new L.LatLng(location.lat, location.lng),{draggable:'true'}).bindPopup(location).update();
        //   maps.panTo(new L.LatLng(lokasi.lat, lokasi.lng))
        $('#location').val(location.lat + "," + location.lng).keyup()
        });
        maps.addLayer(marker);
    
            var lat = e.latlng.lat;
            var lng = e.latlng.lng;
        
            loc.value = lat + "," + lng;
    });

    // End Maps-action