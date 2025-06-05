<template>
    <section
        class="breadcrumb-wrapper fix bg-cover"
        style="background-image: url(/assets/img/bnr_Yogyakarta.jpg)"
    >
        <div class="container">
            <div class="row">
                <div class="page-heading">
                    <h2>Wisata {{ region }}</h2>
                    <ul class="breadcrumb-list">
                        <li>
                            <a href="/"
                                ><span style="color: #5ce1e6">Home </span>
                            </a>
                            >
                        </li>
                        <li>Wisata {{ region }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Map Section -->
    <section class="map-section section-padding">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title mb-4 text-center">
                        <h3>Peta Wisata {{ region }}</h3>
                        <p>Jelajahi lokasi wisata menarik di {{ region }}</p>
                    </div>
                    <div class="map-container">
                        <div
                            id="map"
                            ref="mapContainer"
                            style="
                                height: 400px;
                                width: 100%;
                                border-radius: 10px;
                                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                            "
                        ></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Tour Section -->
    <section class="tour-section section-padding fix">
        <div class="container">
            <div class="section-title mb-5 text-center">
                <h3>Destinasi Wisata di {{ region }}</h3>
                <p>Pilihan terbaik untuk petualangan Anda</p>
            </div>
            <div class="row g-4">
                <div
                    v-for="(destination, index) in filteredDestinations"
                    :key="index"
                    class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp"
                    :data-wow-delay="`0.${index + 2}s`"
                >
                    <cardDestination
                        :id="destination.id"
                        :slug="destination.slug"
                        :image="destination.image"
                        :location="destination.location"
                        :rating="destination.rating"
                        :title="destination.title"
                        :price="destination.price"
                    />
                </div>
            </div>

            <!-- No destinations message -->
            <div
                v-if="filteredDestinations.length === 0"
                class="mt-5 text-center"
            >
                <div class="alert alert-info">
                    <h5>Belum ada destinasi wisata untuk {{ region }}</h5>
                    <p>
                        Destinasi wisata untuk region ini sedang dalam proses
                        pengembangan.
                    </p>
                </div>
            </div>
        </div>
    </section>
</template>

<script setup>
import { defineProps, computed, onMounted, onUnmounted, ref } from 'vue';
import cardDestination from '../../Components/cardDestination.vue';

const props = defineProps({
    region: String,
});

const mapContainer = ref(null);
let map = null;

// Region coordinates mapping
const regionCoordinates = {
    banten: { lat: -6.12, lng: 106.15, zoom: 9 },
    jakarta: { lat: -6.2088, lng: 106.8456, zoom: 11 },
    'jawa-barat': { lat: -6.9175, lng: 107.6191, zoom: 8 },
    'jawa-tengah': { lat: -7.2575, lng: 110.1739, zoom: 8 },
    yogyakarta: { lat: -7.7956, lng: 110.3695, zoom: 11 },
    'jawa-timur': { lat: -7.536, lng: 112.2384, zoom: 8 },
};

// Region boundary polygons (simplified coordinates for demonstration)
const regionBoundaries = {
    jakarta: [
        [-6.098, 106.677],
        [-6.098, 106.998],
        [-6.369, 106.998],
        [-6.369, 106.677],
    ],
    banten: [
        [-5.787, 105.421],
        [-5.787, 106.677],
        [-6.902, 106.677],
        [-6.902, 105.421],
    ],
    'jawa-barat': [
        [-5.998, 106.677],
        [-5.998, 108.745],
        [-7.789, 108.745],
        [-7.789, 106.677],
    ],
    'jawa-tengah': [
        [-6.524, 108.745],
        [-6.524, 111.543],
        [-8.234, 111.543],
        [-8.234, 108.745],
    ],
    yogyakarta: [
        [-7.654, 110.056],
        [-7.654, 110.764],
        [-8.234, 110.764],
        [-8.234, 110.056],
    ],
    'jawa-timur': [
        [-6.876, 111.543],
        [-6.876, 114.634],
        [-8.789, 114.634],
        [-8.789, 111.543],
    ],
};

// Extended destination data with coordinates
const allDestinations = [
    // Jakarta
    {
        id: 1,
        region: 'jakarta',
        slug: 'monumen-nasional',
        image: '/assets/img/destination/monas.jpeg',
        location: 'Jakarta Pusat, Indonesia',
        rating: '4.8',
        title: 'Monumen Nasional (Monas)',
        price: '150000',
        lat: -6.1751,
        lng: 106.827,
    },
    {
        id: 2,
        region: 'jakarta',
        slug: 'kota-tua',
        image: '/assets/img/destination/Kotu.jpeg',
        location: 'Jakarta Barat, Indonesia',
        rating: '4.5',
        title: 'Kota Tua Jakarta',
        price: '100000',
        lat: -6.1352,
        lng: 106.8133,
    },
    {
        id: 3,
        region: 'jakarta',
        slug: 'ancol-dreamland',
        image: '/assets/img/destination/ancol.jpg',
        location: 'Jakarta Utara, Indonesia',
        rating: '4.3',
        title: 'Ancol Dreamland',
        price: '250000',
        lat: -6.1229,
        lng: 106.8432,
    },

    // Banten
    {
        id: 4,
        region: 'banten',
        slug: 'pantai-anyer',
        image: '/assets/img/destination/Anyer.jpg',
        location: 'Serang, Banten',
        rating: '4.4',
        title: 'Pantai Anyer',
        price: '200000',
        lat: -6.0342,
        lng: 105.8811,
    },
    {
        id: 5,
        region: 'banten',
        slug: 'ujung-kulon',
        image: '/assets/img/destination/Taman-Nasional-Ujung-Kulon.jpg',
        location: 'Pandeglang, Banten',
        rating: '4.7',
        title: 'Taman Nasional Ujung Kulon',
        price: '500000',
        lat: -6.7608,
        lng: 105.3361,
    },

    // Jawa Barat
    {
        id: 6,
        region: 'jawa-barat',
        slug: 'tangkuban-perahu',
        image: 'assets/img/destination/11.jpg',
        location: 'Bandung, Jawa Barat',
        rating: '4.6',
        title: 'Gunung Tangkuban Perahu',
        price: '300000',
        lat: -6.7597,
        lng: 107.6098,
    },
    {
        id: 7,
        region: 'jawa-barat',
        slug: 'kawah-putih',
        image: 'assets/img/destination/12.jpg',
        location: 'Ciwidey, Jawa Barat',
        rating: '4.5',
        title: 'Kawah Putih Ciwidey',
        price: '250000',
        lat: -7.1661,
        lng: 107.4019,
    },

    // Jawa Tengah
    {
        id: 8,
        region: 'jawa-tengah',
        slug: 'borobudur',
        image: 'assets/img/destination/13.jpg',
        location: 'Magelang, Jawa Tengah',
        rating: '4.9',
        title: 'Candi Borobudur',
        price: '400000',
        lat: -7.6079,
        lng: 110.2038,
    },
    {
        id: 9,
        region: 'jawa-tengah',
        slug: 'dieng-plateau',
        image: 'assets/img/destination/14.jpg',
        location: 'Wonosobo, Jawa Tengah',
        rating: '4.4',
        title: 'Dataran Tinggi Dieng',
        price: '350000',
        lat: -7.2034,
        lng: 109.9214,
    },

    // Yogyakarta
    {
        id: 10,
        region: 'yogyakarta',
        slug: 'malioboro',
        image: '/assets/img/destination/Malioboro.jpeg',
        location: 'Yogyakarta, DIY',
        rating: '4.7',
        title: 'Jalan Malioboro',
        price: '100000',
        lat: -7.7926,
        lng: 110.3656,
    },
    {
        id: 11,
        region: 'yogyakarta',
        slug: 'prambanan',
        image: '/assets/img/destination/prambanan.jpeg',
        location: 'Sleman, DIY',
        rating: '4.8',
        title: 'Candi Prambanan',
        price: '350000',
        lat: -7.752,
        lng: 110.4915,
    },

    // Jawa Timur
    {
        id: 12,
        region: 'jawa-timur',
        slug: 'gunung-bromo',
        image: 'assets/img/destination/17.jpg',
        location: 'Probolinggo, Jawa Timur',
        rating: '4.9',
        title: 'Gunung Bromo',
        price: '450000',
        lat: -7.9425,
        lng: 112.953,
    },
    {
        id: 13,
        region: 'jawa-timur',
        slug: 'malang-city',
        image: 'assets/img/destination/18.jpg',
        location: 'Malang, Jawa Timur',
        rating: '4.5',
        title: 'Kota Malang',
        price: '200000',
        lat: -7.9666,
        lng: 112.6326,
    },
];

const filteredDestinations = computed(() =>
    allDestinations.filter(
        (dest) => dest.region.toLowerCase() === props.region.toLowerCase(),
    ),
);

const initializeMap = () => {
    // Load Leaflet CSS and JS
    if (!window.L) {
        const link = document.createElement('link');
        link.rel = 'stylesheet';
        link.href = 'https://unpkg.com/leaflet@1.9.4/dist/leaflet.css';
        document.head.appendChild(link);

        const script = document.createElement('script');
        script.src = 'https://unpkg.com/leaflet@1.9.4/dist/leaflet.js';
        script.onload = () => createMap();
        document.head.appendChild(script);
    } else {
        createMap();
    }
};

const loadRegionBoundary = async (region) => {
    try {
        // Fetch GeoJSON data from Indonesian administrative boundaries
        const response = await fetch(
            `https://raw.githubusercontent.com/ans-4175/indonesia-geojson/master/indonesia-prov.geojson`,
        );
        const geoData = await response.json();

        // Map region names to province names in GeoJSON
        const provinceMapping = {
            jakarta: 'DKI JAKARTA',
            banten: 'BANTEN',
            'jawa-barat': 'JAWA BARAT',
            'jawa-tengah': 'JAWA TENGAH',
            yogyakarta: 'DI YOGYAKARTA',
            'jawa-timur': 'JAWA TIMUR',
        };

        const provinceName = provinceMapping[region.toLowerCase()];

        // Find the matching province
        const provinceFeature = geoData.features.find(
            (feature) => feature.properties.PROVINSI === provinceName,
        );

        if (provinceFeature && map) {
            // Add province boundary to map
            window.L.geoJSON(provinceFeature, {
                style: {
                    color: '#5ce1e6',
                    weight: 3,
                    fillColor: '#5ce1e6',
                    fillOpacity: 0.1,
                    dashArray: '5, 10',
                },
            })
                .addTo(map)
                .bindPopup(
                    `Wilayah ${region.charAt(0).toUpperCase() + region.slice(1).replace('-', ' ')}`,
                );
        }
    } catch (error) {
        console.log('Unable to load boundary data, using fallback polygon');
        // Fallback to simplified polygon if GeoJSON fails
        const boundary = regionBoundaries[region.toLowerCase()];
        if (boundary && map) {
            window.L.polygon(boundary, {
                color: '#5ce1e6',
                weight: 3,
                fillColor: '#5ce1e6',
                fillOpacity: 0.1,
                dashArray: '5, 10',
            })
                .addTo(map)
                .bindPopup(
                    `Wilayah ${region.charAt(0).toUpperCase() + region.slice(1).replace('-', ' ')}`,
                );
        }
    }
};

const createMap = () => {
    if (map) {
        map.remove();
    }

    const regionCoord =
        regionCoordinates[props.region.toLowerCase()] ||
        regionCoordinates['jakarta'];

    map = window.L.map('map').setView(
        [regionCoord.lat, regionCoord.lng],
        regionCoord.zoom,
    );

    // Add tile layer
    window.L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '© OpenStreetMap contributors',
    }).addTo(map);

    // Load and add region boundary
    loadRegionBoundary(props.region);

    // Add markers for destinations in current region
    filteredDestinations.value.forEach((destination) => {
        if (destination.lat && destination.lng) {
            const marker = window.L.marker([
                destination.lat,
                destination.lng,
            ]).addTo(map);

            const popupContent = `
                <div style="text-align: center; min-width: 200px;">
                    <img src="${destination.image}" alt="${destination.title}" style="width: 100%; height: 100px; object-fit: cover; border-radius: 5px; margin-bottom: 8px;">
                    <h6 style="margin: 8px 0; color: #113d48;">${destination.title}</h6>
                    <p style="margin: 4px 0; color: #666; font-size: 12px;">
                        <i class="fa-thin fa-location-dot"></i> ${destination.location}
                    </p>
                    <p style="margin: 4px 0; color: #113d48; font-weight: bold;">
                        Mulai dari IDR ${destination.price}
                    </p>
                    <div style="margin-top: 8px;">
                        <span style="color: #ffa500;">★</span> ${destination.rating}
                    </div>
                </div>
            `;

            marker.bindPopup(popupContent);
        }
    });
};

onMounted(() => {
    setTimeout(() => {
        initializeMap();
    }, 100);
});

onUnmounted(() => {
    if (map) {
        map.remove();
        map = null;
    }
});
</script>

<style scoped>
.section-padding {
    padding: 60px 0;
}

.section-title h3 {
    color: #113d48;
    font-weight: bold;
    margin-bottom: 10px;
}

.section-title p {
    color: #666;
    margin-bottom: 0;
}

.map-container {
    position: relative;
    z-index: 1;
}

.map-section {
    background-color: #f8f9fa;
}

.alert {
    padding: 20px;
    border-radius: 10px;
    border: none;
}

.alert-info {
    background-color: #e3f2fd;
    color: #0277bd;
}

@media (max-width: 768px) {
    #map {
        height: 300px !important;
    }

    .section-padding {
        padding: 40px 0;
    }
}
</style>
