<script setup>
import { onMounted, ref, onBeforeUnmount } from 'vue';
import L from 'leaflet';

// State management
const lat = ref(null);
const lng = ref(null);
const map = ref(null);
const marker = ref(null);
const mapContainer = ref(null);
const questionText = ref('wisata terdekat');
const weather = ref({
    status: 'Cerah',
    temp: 32,
    humidity: 65,
});

// Custom marker icon
const customIcon = L.icon({
    iconUrl:
        'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-blue.png',
    iconSize: [25, 41],
    iconAnchor: [12, 41],
});

// Map initialization
onMounted(() => {
    initializeMap();
    window.addEventListener('resize', updateMapSize);
});

onBeforeUnmount(() => {
    window.removeEventListener('resize', updateMapSize);
});

function initializeMap() {
    // Default view set to Indonesia coordinates
    map.value = L.map(mapContainer.value, {
        zoomControl: false,
        attributionControl: false,
    }).setView([-2.5489, 118.0149], 5);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png').addTo(
        map.value,
    );
}

function updateMapSize() {
    map.value.invalidateSize();
}

// Geolocation handler
function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition((position) => {
            lat.value = position.coords.latitude;
            lng.value = position.coords.longitude;

            // Update map view dengan zoom level 8
            map.value.setView([lat.value, lng.value], 10); // <-- Diubah dari 14 ke 8

            // Create or update marker
            if (marker.value) {
                marker.value.setLatLng([lat.value, lng.value]);
            } else {
                marker.value = L.marker([lat.value, lng.value], {
                    draggable: true,
                    icon: customIcon,
                }).addTo(map.value);

                marker.value.on('dragend', function (e) {
                    const newPos = e.target.getLatLng();
                    lat.value = newPos.lat;
                    lng.value = newPos.lng;
                });
            }
        });
    }
}
</script>

<template>
    <div class="relative h-screen w-full overflow-hidden">
        <!-- Map Container -->
        <div
            ref="mapContainer"
            class="h-full w-full overflow-hidden rounded-[35px] border-8 border-white shadow-xl"
        ></div>

        <!-- Overlay Content -->
        <div class="pointer-events-none absolute inset-0 p-8">
            <!-- Question Section -->
            <div class="mx-auto mt-12 w-full max-w-2xl text-center">
                <h1
                    class="rounded-full bg-black/30 px-6 py-3 text-4xl font-bold text-white drop-shadow-lg"
                >
                    {{ questionText }}
                </h1>
            </div>

            <!-- Location Details -->
            <div
                class="absolute left-8 top-8 rounded-2xl bg-white/90 px-6 py-4 shadow-lg"
            >
                <h2 class="mb-2 text-xl font-bold text-gray-800">
                    lokasi Anda
                </h2>
                <div class="space-y-1">
                    <p class="text-gray-600">
                        Latitude: {{ lat ? lat.toFixed(6) : 'Belum tersedia' }}
                    </p>
                    <p class="text-gray-600">
                        Longitude: {{ lng ? lng.toFixed(6) : 'Belum tersedia' }}
                    </p>
                </div>
            </div>

            <!-- Weather Card -->
            <div
                class="absolute right-8 top-8 rounded-2xl bg-white/90 px-6 py-4 shadow-lg"
            >
                <h2 class="mb-2 text-xl font-bold text-gray-800">
                    Cuaca Hari Ini
                </h2>
                <div class="flex items-center space-x-4">
                    <span class="text-3xl">⛅</span>
                    <div>
                        <p class="text-lg font-semibold text-gray-700">
                            {{ weather.status }}
                        </p>
                        <p class="text-sm text-gray-600">
                            {{ weather.temp }}°C • Kelembaban
                            {{ weather.humidity }}%
                        </p>
                    </div>
                </div>
            </div>

            <!-- Control Button -->
            <button
                @click="getLocation"
                class="pointer-events-auto absolute bottom-8 left-1/2 -translate-x-1/2 transform rounded-full bg-[#113d48] px-8 py-3 text-white shadow-lg transition-colors hover:bg-[#0097b2]"
            >
                Dapatkan Lokasi Saya
            </button>
        </div>
    </div>
</template>

<!-- Styles tetap sama -->

<style>
.leaflet-control-attribution {
    display: none !important;
}

@media (max-width: 768px) {
    .rounded-[35px] {
        border-radius: 25px !important;
        border-width: 4px !important;
    }

    .absolute.top-8 {
        top: 1rem !important;
        left: 1rem !important;
        right: 1rem !important;
        width: auto !important;
    }

    .text-4xl {
        font-size: 1.5rem !important;
    }
}

.leaflet-map-pane {
    z-index: 0 !important;
}

.leaflet-top {
    z-index: 10 !important;
}

.leaflet-control {
    z-index: 10 !important;
}
</style>
