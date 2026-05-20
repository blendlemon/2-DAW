import L from 'leaflet';
import 'leaflet/dist/leaflet.min.css';
import { apiCall } from './api_client.js';

const BASE_URL = 'https://localhost:8001/api/demo';

delete L.Icon.Default.prototype._getIconUrl;

L.Icon.Default.mergeOptions({
    iconRetinaUrl:
        'https://unpkg.com/leaflet@1.9.4/dist/images/marker-icon-2x.png',
    iconUrl:
        'https://unpkg.com/leaflet@1.9.4/dist/images/marker-icon.png',
    shadowUrl:
        'https://unpkg.com/leaflet@1.9.4/dist/images/marker-shadow.png',
});

const map = L.map('map').setView([40, 0], 4);

L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; OpenStreetMap'
}).addTo(map);

// L.marker([40.4168, -3.7038])
//     .addTo(map)
//     .bindPopup("Madrid");

apiCall(BASE_URL + '/bottomcountry')
    .then(countries => {

        countries.forEach(country => {

            const marker = L.marker([country.countryLat, country.countryLng])

                .addTo(map);

            marker.bindPopup(`<b>${country.name}</b><br>Población: ${country.population}`);

        });

    }).catch(error => {

        console.error('Error fetching countries:', error);

    });
