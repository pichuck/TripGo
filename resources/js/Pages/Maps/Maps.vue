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
const touristMarkers = ref([]);

// Custom marker icons for different categories
const markerIcons = {
    user: L.icon({
        iconUrl:
            'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-blue.png',
        iconSize: [25, 41],
        iconAnchor: [12, 41],
    }),
    pantai: L.icon({
        iconUrl:
            'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-green.png',
        iconSize: [25, 41],
        iconAnchor: [12, 41],
    }),
    wisata: L.icon({
        iconUrl:
            'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-red.png',
        iconSize: [25, 41],
        iconAnchor: [12, 41],
    }),
    penginapan: L.icon({
        iconUrl:
            'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-orange.png',
        iconSize: [25, 41],
        iconAnchor: [12, 41],
    }),
    oleholeh: L.icon({
        iconUrl:
            'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-violet.png',
        iconSize: [25, 41],
        iconAnchor: [12, 41],
    }),
    restoran: L.icon({
        iconUrl:
            'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-yellow.png',
        iconSize: [25, 41],
        iconAnchor: [12, 41],
    }),
};

// Data wisata dengan koordinat yang valid dan area yang diperluas
const touristSpots = {
    // Area Garut (sekitar -7.2, 107.9) - radius diperluas ~100km
    garut: [
        // Pantai
        {
            name: 'Pantai Sayang Heulang',
            lat: -7.335,
            lng: 107.745,
            type: 'pantai',
            desc: 'Pantai eksotis dengan pasir hitam',
            image: 'assets/img/destination/pantai-sayang-heulang.jpg',
            location: 'Garut, Jawa Barat',
            rating: '4.5',
            price: '15.000',
            slug: 'pantai-sayang-heulang',
        },
        {
            name: 'Pantai Rancabuaya',
            lat: -7.342,
            lng: 107.738,
            type: 'pantai',
            desc: 'Pantai tenang untuk bersantai',
            image: 'assets/img/destination/pantai-rancabuaya.jpg',
            location: 'Garut, Jawa Barat',
            rating: '4.2',
            price: '10.000',
            slug: 'pantai-rancabuaya',
        },

        // Wisata
        {
            name: 'Gunung Papandayan',
            lat: -7.317,
            lng: 107.732,
            type: 'wisata',
            desc: 'Gunung berapi aktif dengan kawah cantik',
            image: 'assets/img/destination/gunung-papandayan.jpg',
            location: 'Garut, Jawa Barat',
            rating: '4.7',
            price: '25.000',
            slug: 'gunung-papandayan',
        },
        {
            name: 'Situ Bagendit',
            lat: -7.145,
            lng: 107.897,
            type: 'wisata',
            desc: 'Danau dengan legenda menarik',
            image: 'assets/img/destination/situ-bagendit.jpg',
            location: 'Garut, Jawa Barat',
            rating: '4.3',
            price: '5.000',
            slug: 'situ-bagendit',
        },
        {
            name: 'Curug Orok',
            lat: -7.165,
            lng: 107.925,
            type: 'wisata',
            desc: 'Air terjun tersembunyi',
            image: 'assets/img/destination/curug-orok.jpg',
            location: 'Garut, Jawa Barat',
            rating: '4.4',
            price: '15.000',
            slug: 'curug-orok',
        },

        // Penginapan
        {
            name: 'Hotel Tirta Gangga',
            lat: -7.212,
            lng: 107.899,
            type: 'penginapan',
            desc: 'Hotel dengan pemandian air panas',
            image: 'assets/img/destination/hotel-tirta-gangga.jpg',
            location: 'Garut, Jawa Barat',
            rating: '4.6',
            price: '350.000',
            slug: 'hotel-tirta-gangga',
        },
        {
            name: 'Villa Kampung Sampireun',
            lat: -7.195,
            lng: 107.915,
            type: 'penginapan',
            desc: 'Villa tradisional di atas air',
            image: 'assets/img/destination/villa-sampireun.jpg',
            location: 'Garut, Jawa Barat',
            rating: '4.8',
            price: '800.000',
            slug: 'villa-kampung-sampireun',
        },

        // Oleh-oleh
        {
            name: 'Dodol Garut Picnic',
            lat: -7.208,
            lng: 107.905,
            type: 'oleholeh',
            desc: 'Dodol khas Garut terenak',
            image: 'assets/img/destination/dodol-garut.jpg',
            location: 'Garut, Jawa Barat',
            rating: '4.5',
            price: '25.000',
            slug: 'dodol-garut-picnic',
        },
        {
            name: 'Leather Craft Sukaregang',
            lat: -7.215,
            lng: 107.895,
            type: 'oleholeh',
            desc: 'Kerajinan kulit berkualitas',
            image: 'assets/img/destination/leather-craft.jpg',
            location: 'Garut, Jawa Barat',
            rating: '4.4',
            price: '150.000',
            slug: 'leather-craft-sukaregang',
        },

        // Restoran
        {
            name: 'RM Ampera',
            lat: -7.21,
            lng: 107.902,
            type: 'restoran',
            desc: 'Kuliner Sunda terlengkap',
            image: 'assets/img/destination/rm-ampera.jpg',
            location: 'Garut, Jawa Barat',
            rating: '4.3',
            price: '45.000',
            slug: 'rm-ampera',
        },
        {
            name: 'Warung Nasi Tutug Oncom',
            lat: -7.205,
            lng: 107.908,
            type: 'restoran',
            desc: 'Kuliner khas Garut',
            image: 'assets/img/destination/tutug-oncom.jpg',
            location: 'Garut, Jawa Barat',
            rating: '4.6',
            price: '35.000',
            slug: 'warung-nasi-tutug-oncom',
        },
    ],

    // Area Bandung (sekitar -6.9, 107.6) - radius diperluas ~100km
    bandung: [
        // Pantai
        {
            name: 'Pantai Pangandaran',
            lat: -7.683,
            lng: 108.65,
            type: 'pantai',
            desc: 'Pantai terkenal di Jawa Barat',
            image: 'assets/img/destination/pantai-pangandaran.jpg',
            location: 'Pangandaran, Jawa Barat',
            rating: '4.5',
            price: '20.000',
            slug: 'pantai-pangandaran',
        },

        // Wisata
        {
            name: 'Tangkuban Perahu',
            lat: -6.76,
            lng: 107.609,
            type: 'wisata',
            desc: 'Gunung berapi berbentuk perahu terbalik',
            image: 'assets/img/destination/tangkuban-perahu.jpg',
            location: 'Lembang, Bandung',
            rating: '4.6',
            price: '30.000',
            slug: 'tangkuban-perahu',
        },
        {
            name: 'Kawah Putih',
            lat: -7.166,
            lng: 107.402,
            type: 'wisata',
            desc: 'Danau kawah berwarna putih kehijauan',
            image: 'assets/img/destination/kawah-putih.jpg',
            location: 'Ciwidey, Bandung',
            rating: '4.7',
            price: '25.000',
            slug: 'kawah-putih',
        },
        {
            name: 'Farmhouse Lembang',
            lat: -6.812,
            lng: 107.618,
            type: 'wisata',
            desc: 'Wisata ala Eropa di Lembang',
            image: 'assets/img/destination/farmhouse-lembang.jpg',
            location: 'Lembang, Bandung',
            rating: '4.4',
            price: '40.000',
            slug: 'farmhouse-lembang',
        },

        // Penginapan
        {
            name: 'Grand Hyatt Bandung',
            lat: -6.914,
            lng: 107.609,
            type: 'penginapan',
            desc: 'Hotel mewah di pusat kota',
            image: 'assets/img/destination/grand-hyatt.jpg',
            location: 'Bandung, Jawa Barat',
            rating: '4.8',
            price: '1.200.000',
            slug: 'grand-hyatt-bandung',
        },
        {
            name: 'The Trans Luxury Hotel',
            lat: -6.895,
            lng: 107.613,
            type: 'penginapan',
            desc: 'Hotel berbintang dengan view kota',
            image: 'assets/img/destination/trans-luxury.jpg',
            location: 'Bandung, Jawa Barat',
            rating: '4.7',
            price: '900.000',
            slug: 'the-trans-luxury-hotel',
        },

        // Oleh-oleh
        {
            name: 'Kartika Sari',
            lat: -6.917,
            lng: 107.619,
            type: 'oleholeh',
            desc: 'Pisang bolen legendaris',
            image: 'assets/img/destination/kartika-sari.jpg',
            location: 'Bandung, Jawa Barat',
            rating: '4.5',
            price: '35.000',
            slug: 'kartika-sari',
        },
        {
            name: 'Cibaduyut Shoe Center',
            lat: -6.973,
            lng: 107.641,
            type: 'oleholeh',
            desc: 'Pusat sepatu terkenal',
            image: 'assets/img/destination/cibaduyut.jpg',
            location: 'Bandung, Jawa Barat',
            rating: '4.2',
            price: '200.000',
            slug: 'cibaduyut-shoe-center',
        },

        // Restoran
        {
            name: 'Bumbu Desa',
            lat: -6.902,
            lng: 107.618,
            type: 'restoran',
            desc: 'Kuliner Sunda premium',
            image: 'assets/img/destination/bumbu-desa.jpg',
            location: 'Bandung, Jawa Barat',
            rating: '4.6',
            price: '75.000',
            slug: 'bumbu-desa',
        },
        {
            name: 'Bebek Kaleyo',
            lat: -6.92,
            lng: 107.605,
            type: 'restoran',
            desc: 'Bebek bakar khas Bandung',
            image: 'assets/img/destination/bebek-kaleyo.jpg',
            location: 'Bandung, Jawa Barat',
            rating: '4.4',
            price: '65.000',
            slug: 'bebek-kaleyo',
        },
    ],

    // Area Malang-Bromo (sekitar -7.9, 112.6) - area baru dengan koordinat valid
    malang: [
        // Wisata
        {
            name: 'Gunung Bromo',
            lat: -7.942965,
            lng: 112.953186,
            type: 'wisata',
            desc: 'Gunung berapi ikonik dengan sunrise spektakuler',
            image: '/assets/img/destination/bromo.jpg',
            location: 'Probolinggo, Jawa Timur',
            rating: '4.8',
            price: '50.000',
            slug: 'gunung-bromo',
        },
        {
            name: 'Coban Rondo',
            lat: -7.8846458,
            lng: 112.4387149,
            type: 'wisata',
            desc: 'Air terjun indah di kaki Gunung Panderman',
            image: '/assets/img/destination/Coban-Rondo.jpg',
            location: 'Malang, Jawa Timur',
            rating: '4.4',
            price: '15.000',
            slug: 'coban-rondo',
        },
        {
            name: 'Taman Kelinci Pujon',
            lat: -7.851385,
            lng: 112.4911264,
            type: 'wisata',
            desc: 'Wisata keluarga dengan kelinci dan pemandangan gunung',
            image: '/assets/img/destination/taman-kelinci-pujon.jpg',
            location: 'Malang, Jawa Timur',
            rating: '4.3',
            price: '25.000',
            slug: 'taman-kelinci-pujon',
        },
        {
            name: 'Museum Angkut',
            lat: -7.878809,
            lng: 112.5173998,
            type: 'wisata',
            desc: 'Museum transportasi terlengkap di Indonesia',
            image: '/assets/img/destination/Museum-angkut.jpeg',
            location: 'Malang, Jawa Timur',
            rating: '4.5',
            price: '80.000',
            slug: 'museum-angkut',
        },
        {
            name: 'Jatim Park 2',
            lat: -7.888021,
            lng: 112.5269693,
            type: 'wisata',
            desc: 'Taman rekreasi dengan kebun binatang dan akuarium',
            image: '/assets/img/destination/jatim-park-2.jpeg',
            location: 'Malang, Jawa Timur',
            rating: '4.4',
            price: '90.000',
            slug: 'jatim-park-2',
        },
        {
            name: 'Jatim Park 1',
            lat: -7.884152,
            lng: 112.522252,
            type: 'wisata',
            desc: 'Taman Hiburan wahana',
            image: '/assets/img/destination/jatim-park-1.jpeg',
            location: 'Malang, Jawa Timur',
            rating: '4.4',
            price: '90.000',
            slug: 'jatim-park-2',
        },

        {
            name: 'Jatim Park 3',
            lat: -7.8971338,
            lng: 112.5505278,
            type: 'wisata',
            desc: 'Taman Hiburan wahana',
            image: '/assets/img/destination/jatim-park-3.jpeg',
            location: 'Malang, Jawa Timur',
            rating: '4.4',
            price: '90.000',
            slug: 'jatim-park-2',
        },

        {
            name: 'Tumpak sewu',
            lat: -8.2309374,
            lng: 112.9145319,
            type: 'wisata',
            desc: 'Air terjun yang eksotis dengan pemandangan alam yang indah',
            image: '/assets/img/destination/Tumpak sewu.jpg',
            location: 'Malang, Jawa Timur',
            rating: '4.4',
            price: '25.000',
            slug: 'jatim-park-2',
        },

        {
            name: 'Museum Brawijaya',
            lat: -7.9721325,
            lng: 112.6186341,
            type: 'wisata',
            desc: 'Artefak & pameran tentang perjuangan rakyat Indonesia menggapai kemerdekaan, termasuk senjata & tank militer.',
            image: '/assets/img/destination/Museum Brawijaya.jpg',
            location: 'Malang, Jawa Timur',
            rating: '4.4',
            price: '3.000',
            slug: 'jatim-park-2',
        },

        // Penginapan
        {
            name: 'Ubud Cottages Malang',
            lat: -7.961427,
            lng: 112.6024155,
            type: 'penginapan',
            desc: 'Villa bergaya Bali dengan suasana tropis',
            image: 'assets/img/destination/Ubud-cotages-malang.jpeg',
            location: 'Malang, Jawa Timur',
            rating: '4.6',
            price: '450.000',
            slug: 'ubud-cottages-malang',
        },
        {
            name: 'Hotel Tugu Malang',
            lat: -7.9772124,
            lng: 112.6305857,
            type: 'penginapan',
            desc: 'Hotel heritage dengan arsitektur klasik',
            image: '/assets/img/destination/tugu malang.jpg',
            location: 'Malang, Jawa Timur',
            rating: '4.7',
            price: '800.000',
            slug: 'hotel-tugu-malang',
        },
        {
            name: 'Jiwa Jawa Resort Bromo',
            lat: -7.9165878,
            lng: 112.9828043,
            type: 'penginapan',
            desc: 'Resort mewah dengan view Gunung Bromo',
            image: '/assets/img/destination/Jiwa-jawa.jpg',
            location: 'Probolinggo, Jawa Timur',
            rating: '4.8',
            price: '1.500.000',
            slug: 'jiwa-jawa-resort-bromo',
        },

        // Oleh-oleh
        {
            name: 'Malang Strudel',
            lat: -7.9749399,
            lng: 112.6188952,
            type: 'oleholeh',
            desc: 'Oleh-oleh khas Malang yang terkenal',
            image: '/assets/img/destination/malang strudel.jpg',
            location: 'Malang, Jawa Timur',
            rating: '4.4',
            price: '45.000',
            slug: 'malang-strudel',
        },
        {
            name: 'Keripik Tempe Sanan',
            lat: -7.9614884,
            lng: 112.6411015,
            type: 'oleholeh',
            desc: 'Keripik tempe legendaris Malang',
            image: '/assets/img/destination/sanan.jpg',
            location: 'Malang, Jawa Timur',
            rating: '4.3',
            price: '25.000',
            slug: 'keripik-tempe-sanan',
        },

        // Restoran
        {
            name: 'Warung Rawon Nguling',
            lat: -7.9838809,
            lng: 112.5958703,
            type: 'restoran',
            desc: 'Rawon legendaris sejak 1960',
            image: '/assets/img/destination/rawon-nguling.jpg',
            location: 'Malang, Jawa Timur',
            rating: '4.5',
            price: '30.000',
            slug: 'warung-rawon-nguling',
        },
        {
            name: 'Bakso President',
            lat: -7.9527926,
            lng: 112.607232,
            type: 'restoran',
            desc: 'Bakso jumbo terkenal di Malang',
            image: '/assets/img/destination/bakso-president.jpg',
            location: 'Malang, Jawa Timur',
            rating: '4.4',
            price: '25.000',
            slug: 'bakso-president',
        },

        // Pantai (di area Malang Selatan)
        {
            name: 'Pantai Balekambang',
            lat: -8.404,
            lng: 112.531,
            type: 'wisata',
            desc: 'Pantai dengan pulau kecil dan pura Hindu',
            image: '/assets/img/destination/pantai-balekambang-1.jpg',
            location: 'Malang, Jawa Timur',
            rating: '4.3',
            price: '10.000',
            slug: 'pantai-balekambang',
        },
        {
            name: 'Pantai Ngliyep',
            lat: -8.394,
            lng: 112.456,
            type: 'wisata',
            desc: 'Pantai dengan ombak besar dan sunset indah',
            image: '/assets/img/destination/ngliyep.jpg',
            location: 'Malang, Jawa Timur',
            rating: '4.2',
            price: '8.000',
            slug: 'pantai-ngliyep',
        },
    ],

    // Area default (untuk lokasi lain) - koordinat akan digenerate otomatis
    default: [
        {
            name: 'Taman Kota',
            lat: 0,
            lng: 0,
            type: 'wisata',
            desc: 'Taman untuk rekreasi keluarga',
            image: 'assets/img/destination/taman-kota.jpg',
            location: 'Kota Setempat',
            rating: '4.0',
            price: '5.000',
            slug: 'taman-kota',
        },
        {
            name: 'Museum Daerah',
            lat: 0,
            lng: 0,
            type: 'wisata',
            desc: 'Museum bersejarah setempat',
            image: 'assets/img/destination/museum-daerah.jpg',
            location: 'Kota Setempat',
            rating: '4.1',
            price: '10.000',
            slug: 'museum-daerah',
        },
        {
            name: 'Hotel Central',
            lat: 0,
            lng: 0,
            type: 'penginapan',
            desc: 'Hotel di pusat kota',
            image: 'assets/img/destination/hotel-central.jpg',
            location: 'Kota Setempat',
            rating: '4.0',
            price: '300.000',
            slug: 'hotel-central',
        },
        {
            name: 'Toko Oleh-oleh',
            lat: 0,
            lng: 0,
            type: 'oleholeh',
            desc: 'Souvenir khas daerah',
            image: 'assets/img/destination/toko-oleholeh.jpg',
            location: 'Kota Setempat',
            rating: '4.0',
            price: '50.000',
            slug: 'toko-oleh-oleh',
        },
        {
            name: 'Restoran Lokal',
            lat: 0,
            lng: 0,
            type: 'restoran',
            desc: 'Kuliner khas setempat',
            image: 'assets/img/destination/restoran-lokal.jpg',
            location: 'Kota Setempat',
            rating: '4.0',
            price: '40.000',
            slug: 'restoran-lokal',
        },
    ],
};

// Map initialization
onMounted(() => {
    initializeMap();
    // Auto-detect location on page load
    setTimeout(() => {
        getLocation();
    }, 1000);
    window.addEventListener('resize', updateMapSize);
});

onBeforeUnmount(() => {
    clearTouristMarkers();
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

// Function to determine area based on coordinates - diperluas area coverage
function getAreaFromCoordinates(lat, lng) {
    // Area Garut: diperluas radius ~100km
    if (lat >= -7.8 && lat <= -6.6 && lng >= 107.0 && lng <= 108.5) {
        return 'garut';
    }
    // Area Bandung: diperluas radius ~100km
    if (lat >= -7.5 && lat <= -6.3 && lng >= 106.8 && lng <= 108.2) {
        return 'bandung';
    }
    // Area Malang-Bromo: area baru dengan radius ~150km
    if (lat >= -8.5 && lat <= -7.3 && lng >= 112.0 && lng <= 113.5) {
        return 'malang';
    }
    return 'default';
}

// Function to generate coordinates around user location
function generateNearbyCoordinates(centerLat, centerLng, spots) {
    const radius = 0.2; // Diperluas dari 0.1 ke 0.2 (~20km radius)
    return spots.map((spot) => {
        if (spot.lat === 0 && spot.lng === 0) {
            // Generate random coordinates around user location for default spots
            const randomLat = centerLat + (Math.random() - 0.5) * radius;
            const randomLng = centerLng + (Math.random() - 0.5) * radius;
            return { ...spot, lat: randomLat, lng: randomLng };
        }
        return spot; // Use predefined coordinates
    });
}

// Clear existing tourist markers
function clearTouristMarkers() {
    touristMarkers.value.forEach((marker) => {
        map.value.removeLayer(marker);
    });
    touristMarkers.value = [];
}

// Add tourist spots markers
function addTouristSpots(userLat, userLng) {
    clearTouristMarkers();

    const area = getAreaFromCoordinates(userLat, userLng);
    const spots = touristSpots[area] || touristSpots.default;
    const nearbySpots = generateNearbyCoordinates(userLat, userLng, spots);

    nearbySpots.forEach((spot) => {
        const spotMarker = L.marker([spot.lat, spot.lng], {
            icon: markerIcons[spot.type],
        }).addTo(map.value);

        // Add popup with destination card
        const popupContent = `
            <div class="destination-card-popup" style="width: 280px; font-family: Arial, sans-serif;">
                <div class="destination-image" style="width: 100%; height: 150px; overflow: hidden; border-radius: 8px 8px 0 0;">
                    <img src="${spot.image}" alt="${spot.name}" style="width: 100%; height: 100%; object-fit: cover;" />
                </div>
                <div class="destination-content" style="padding: 16px;">
                    <ul class="meta" style="display: flex; justify-content: space-between; align-items: center; margin: 0 0 12px 0; padding: 0; list-style: none;">
                        <li style="display: flex; align-items: center; color: #666; font-size: 12px;">
                            <i class="fa-thin fa-location-dot" style="margin-right: 4px;"></i>
                            ${spot.location}
                        </li>
                        <li class="rating" style="display: flex; align-items: center;">
                            <div class="star" style="color: #ffd700; margin-right: 4px;">
                                <i class="fa-solid fa-star"></i>
                            </div>
                            <p style="color: #113d48; margin: 0; font-weight: bold; font-size: 14px;">${spot.rating}</p>
                        </li>
                    </ul>
                    <h5 style="margin: 0 0 8px 0; font-size: 16px; font-weight: bold; color: #333;">${spot.name}</h5>
                    <p style="margin: 0 0 16px 0; font-size: 12px; color: #666; line-height: 1.4;">${spot.desc}</p>
                    <div class="price" style="display: flex; justify-content: space-between; align-items: center;">
                        <h6 style="margin: 0; font-size: 14px; color: #333;">
                            <span style="color: #666; font-size: 12px;">mulai dari </span>IDR ${spot.price}
                        </h6>
                        <a href="/detail-wisata/${spot.slug}" 
                           class="theme-btn style-2" 
                           style="background: #113d48; color: white; padding: 8px 16px; border-radius: 4px; text-decoration: none; font-size: 12px; display: flex; align-items: center;">
                            Lihat Detail
                            <i class="fa-sharp fa-regular fa-arrow-right" style="margin-left: 4px;"></i>
                        </a>
                    </div>
                </div>
            </div>
        `;

        spotMarker.bindPopup(popupContent, {
            maxWidth: 300,
            className: 'custom-popup',
        });

        touristMarkers.value.push(spotMarker);
    });
}

// Geolocation handler
function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(
            (position) => {
                lat.value = position.coords.latitude;
                lng.value = position.coords.longitude;

                // Update map view dengan zoom level 9 (sedikit lebih zoom out untuk area yang diperluas)
                map.value.setView([lat.value, lng.value], 9);

                // Add user marker
                if (marker.value) {
                    map.value.removeLayer(marker.value);
                }
                marker.value = L.marker([lat.value, lng.value], {
                    icon: markerIcons.user,
                }).addTo(map.value);

                // Tambahkan wisata terdekat
                addTouristSpots(lat.value, lng.value);
            },
            (error) => {
                alert(
                    'Gagal mendapatkan lokasi. Silakan aktifkan GPS atau izinkan akses lokasi.',
                );
            },
        );
    } else {
        alert('Geolocation tidak didukung browser Anda.');
    }
}
</script>

<template>
    <div class="relative h-screen w-full overflow-hidden">
        <div
            ref="mapContainer"
            class="h-full w-full overflow-hidden rounded-[35px] border-8 border-white shadow-xl"
        ></div>
        <div class="pointer-events-none absolute inset-0 p-8">
            <div class="mx-auto mt-12 w-full max-w-2xl text-center">
                <h1
                    class="rounded-full bg-black/30 px-6 py-3 text-4xl font-bold text-white drop-shadow-lg"
                >
                    {{ questionText }}
                </h1>
            </div>
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
            <div
                class="absolute bottom-8 right-8 rounded-2xl bg-white/90 px-4 py-3 shadow-lg"
            >
                <h3 class="mb-2 text-sm font-bold text-gray-800">Legenda</h3>
                <div class="space-y-1 text-xs">
                    <div class="flex items-center space-x-2">
                        <div class="h-3 w-3 rounded-full bg-blue-500"></div>
                        <span>Lokasi Anda</span>
                    </div>

                    <div class="flex items-center space-x-2">
                        <div class="h-3 w-3 rounded-full bg-red-500"></div>
                        <span>Wisata</span>
                    </div>
                    <div class="flex items-center space-x-2">
                        <div class="h-3 w-3 rounded-full bg-orange-500"></div>
                        <span>Penginapan</span>
                    </div>
                    <div class="flex items-center space-x-2">
                        <div class="h-3 w-3 rounded-full bg-violet-500"></div>
                        <span>Oleh-oleh</span>
                    </div>
                    <div class="flex items-center space-x-2">
                        <div class="h-3 w-3 rounded-full bg-yellow-500"></div>
                        <span>Restoran</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

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
    .absolute.bottom-20.right-8 {
        bottom: 5rem !important;
        right: 1rem !important;
        left: 1rem !important;
        width: auto !important;
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
