let map, marker, selectedLatLng = null;

window.openMap = function () {
    document.getElementById('mapModal').classList.remove('hidden');

    setTimeout(() => {
        if (!map) initMap();
        map.invalidateSize();
    }, 200);
};

window.closeMap = function () {
    document.getElementById('mapModal').classList.add('hidden');
};

window.saveLocation = function () {
    if (!selectedLatLng) {
        alert('Silakan pilih lokasi terlebih dahulu');
        return;
    }
    closeMap();
};



function initMap() {
    map = L.map('map').setView([-6.2, 106.8], 13);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '© OpenStreetMap'
    }).addTo(map);

    map.on('click', e => setMarker(e.latlng));

    document.getElementById('search')
        .addEventListener('input', async function () {

        const q = this.value;
        const res = await fetch(
            `https://nominatim.openstreetmap.org/search?format=json&q=${q}`
        );
        const data = await res.json();

        if (data.length) {
            const latlng = {
                lat: parseFloat(data[0].lat),
                lng: parseFloat(data[0].lon),
            };
            map.setView(latlng, 15);
            setMarker(latlng);
            document.getElementById('location_input').value =
                data[0].display_name;
        }
    });
}

async function setMarker(latlng) {
    if (marker) map.removeLayer(marker);

    marker = L.marker(latlng).addTo(map);
    selectedLatLng = latlng;

    document.getElementById('latitude').value = latlng.lat;
    document.getElementById('longitude').value = latlng.lng;

    // reverse geocoding
    try {
        const res = await fetch(
            `https://nominatim.openstreetmap.org/reverse?format=json&lat=${latlng.lat}&lon=${latlng.lng}`
        );
        const data = await res.json();

        document.getElementById('location_input').value =
            data.display_name ?? `${latlng.lat}, ${latlng.lng}`;
    } catch (e) {
        document.getElementById('location_input').value =
            `${latlng.lat}, ${latlng.lng}`;
    }
}

