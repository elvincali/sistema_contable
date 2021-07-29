document.addEventListener('DOMContentLoaded', () => {

    if(document.querySelector('#mapa')){
        const lat = document.querySelector('#lat').value === '' ? -17.783315 : document.querySelector('#lat').value;
        const lng = document.querySelector('#lng').value === '' ? -63.182126 : document.querySelector('#lng').value;
        // const lat = -17.783315;
        // const lng = -63.182126;

        // const apiKey = "AAPK96ed51d947cb46eb80409931031d88casYH9i5QU-QhZWS4jgBHeA7uY3nMMunRQKezKSPQ5y-4Y1Ot9fpLDGnEh19RcOZx_";
        // const basemapEnum = "ArcGIS:Streets";

        const mapa = L.map('mapa').setView([lat, lng], 16);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(mapa);

        let marker;

        // agregar el pin
        marker = new L.marker([lat, lng], {
            draggable: true,
            autoPan: true
        }).addTo(mapa);

        //Geocode Service
        const geocodeService = L.esri.Geocoding.geocodeService();

        //Detectar movimiento del marker
        marker.on('moveend', function(e){
            marker = e.target;
            const posicion = marker.getLatLng();
            console.log(posicion);

            //Centrar automáticamente
            mapa.panTo(new L.LatLng(posicion.lat, posicion.lng));

            //Reverse Geocoding, cuando el usuario reubica el pin
            geocodeService.reverse().latlng(posicion, 16).run(function(error, resultado){
                // console.log(error);
                // console.log(resultado);

                marker.bindPopup(resultado.address.LongLabel);
                marker.openPopup();

                //Llenar los campos
                llenarInputs(resultado);
            })
        });

        function llenarInputs(resultado){
            console.log(resultado);
            document.querySelector('#direction').value = resultado.address.Address || '';
            document.querySelector('#site').value = resultado.address.Neighborhood || '';
            document.querySelector('#lat').value = resultado.latlng.lat || '';
            document.querySelector('#lng').value = resultado.latlng.lng || '';
        }
    }

});
