<template>
    <div class="wow fadeInUp wow" data-wow-delay=".3s">
        <div class="cta-items">
            <div class="cta-text">
                <h2>LOKASI KAMU</h2>
                <div v-if="isLoading" class="loading-state">
                    <p>🔍 Mendeteksi lokasi kamu...</p>
                </div>
                <div v-else-if="locationError" class="error-state">
                    <p>❌ {{ locationError }}</p>
                    <button @click="getCurrentLocation" class="retry-btn">
                        Coba Lagi
                    </button>
                </div>
                <div v-else class="location-info">
                    <p>
                        🏙️ {{ currentLocation.city || location }}
                        <br />
                        🏷️ {{ currentLocation.address || street }}
                        <br />
                        📍 {{ currentLocation.district || range }}
                    </p>

                    <!-- Wisata Terdekat -->
                    <div
                        class="nearby-spots"
                        v-if="getNearbyTouristSpots().length > 0"
                    >
                        <h4>🎯 Wisata Terdekat:</h4>
                        <div class="spots-grid">
                            <div
                                v-for="spot in getNearbyTouristSpots().slice(
                                    0,
                                    4,
                                )"
                                :key="spot.name"
                                class="spot-card"
                            >
                                <span class="spot-name">{{ spot.name }}</span>
                                <div class="spot-details">
                                    <span class="spot-distance"
                                        >📍 {{ spot.distance }}</span
                                    >
                                    <span class="spot-type"
                                        >🏷️ {{ spot.type }}</span
                                    >
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <Link
                :href="route('maps')"
                class="theme-btn"
                style="color: #0097b2"
                :class="{ disabled: isLoading }"
            >
                LIHAT TEMPAT WISATA DISEKITAR
                <i class="fa-sharp fa-regular fa-arrow-right"></i>
            </Link>
            <div class="cta-image">
                <img
                    src="assets/img/lokasi-bnr.png"
                    alt="peta-lokasi"
                    class="bnr"
                />
            </div>
        </div>
    </div>
</template>

<script setup>
import { Link } from '@inertiajs/vue3';
import { ref, onMounted } from 'vue';

const props = defineProps({
    location: String,
    street: String,
    range: String,
    recomendation: String,
});

const isLoading = ref(false);
const locationError = ref(null);
const currentLocation = ref({
    city: null,
    address: null,
    district: null,
    lat: null,
    lng: null,
});

// Fungsi untuk mendapatkan lokasi saat ini
const getCurrentLocation = async () => {
    isLoading.value = true;
    locationError.value = null;

    if (!navigator.geolocation) {
        locationError.value = 'Geolocation tidak didukung di browser ini';
        isLoading.value = false;
        return;
    }

    navigator.geolocation.getCurrentPosition(
        async (position) => {
            const { latitude, longitude } = position.coords;
            currentLocation.value.lat = latitude;
            currentLocation.value.lng = longitude;

            try {
                // Reverse geocoding untuk mendapatkan alamat
                await reverseGeocode(latitude, longitude);
            } catch (error) {
                console.error('Error reverse geocoding:', error);
                locationError.value = 'Gagal mendapatkan alamat lokasi';
            }

            isLoading.value = false;
        },
        (error) => {
            isLoading.value = false;
            switch (error.code) {
                case error.PERMISSION_DENIED:
                    locationError.value =
                        'Akses lokasi ditolak. Mohon izinkan akses lokasi.';
                    break;
                case error.POSITION_UNAVAILABLE:
                    locationError.value = 'Informasi lokasi tidak tersedia.';
                    break;
                case error.TIMEOUT:
                    locationError.value = 'Request lokasi timeout.';
                    break;
                default:
                    locationError.value = 'Terjadi error yang tidak diketahui.';
                    break;
            }
        },
        {
            enableHighAccuracy: true,
            timeout: 10000,
            maximumAge: 300000, // 5 menit cache
        },
    );
};

// Fungsi reverse geocoding menggunakan Nominatim (OpenStreetMap)
const reverseGeocode = async (lat, lng) => {
    try {
        const response = await fetch(
            `https://nominatim.openstreetmap.org/reverse?format=json&lat=${lat}&lon=${lng}&zoom=18&addressdetails=1`,
        );
        const data = await response.json();

        if (data.display_name) {
            currentLocation.value.address = data.display_name;
            currentLocation.value.city =
                data.address?.city ||
                data.address?.town ||
                data.address?.village ||
                data.address?.county ||
                'Kota tidak diketahui';
            currentLocation.value.district =
                data.address?.suburb ||
                data.address?.neighbourhood ||
                data.address?.hamlet ||
                'Area sekitar';
        }
    } catch (error) {
        throw new Error('Gagal mendapatkan informasi alamat');
    }
};

// Data dummy wisata berdasarkan kota
const touristSpots = {
    Garut: [
        { name: 'Gunung Papandayan', distance: '2.5 km', type: 'Alam' },
        { name: 'Situ Bagendit', distance: '5.1 km', type: 'Danau' },
        { name: 'Kampung Sampireun', distance: '8.3 km', type: 'Resort' },
        { name: 'Curug Orok', distance: '12.7 km', type: 'Air Terjun' },
    ],
    Bandung: [
        { name: 'Gedung Sate', distance: '1.2 km', type: 'Sejarah' },
        { name: 'Braga Street', distance: '2.8 km', type: 'Kuliner' },
        { name: 'Tangkuban Perahu', distance: '25.4 km', type: 'Alam' },
        { name: 'Factory Outlet', distance: '3.5 km', type: 'Belanja' },
    ],
    Jakarta: [
        { name: 'Monas', distance: '4.2 km', type: 'Landmark' },
        { name: 'Kota Tua', distance: '6.8 km', type: 'Sejarah' },
        { name: 'Ancol Dreamland', distance: '12.3 km', type: 'Hiburan' },
        { name: 'Grand Indonesia', distance: '3.1 km', type: 'Mall' },
    ],
    Yogyakarta: [
        { name: 'Malioboro', distance: '1.5 km', type: 'Kuliner' },
        { name: 'Keraton Yogyakarta', distance: '2.3 km', type: 'Budaya' },
        { name: 'Candi Prambanan', distance: '18.5 km', type: 'Sejarah' },
        { name: 'Taman Sari', distance: '2.8 km', type: 'Sejarah' },
    ],
    Surabaya: [
        { name: 'Tugu Pahlawan', distance: '3.4 km', type: 'Sejarah' },
        { name: 'Jembatan Suramadu', distance: '15.2 km', type: 'Landmark' },
        { name: 'Kebun Binatang', distance: '7.8 km', type: 'Keluarga' },
        { name: 'Pasar Genteng', distance: '2.1 km', type: 'Kuliner' },
    ],
};

// Fungsi untuk mendapatkan wisata terdekat
const getNearbyTouristSpots = () => {
    if (currentLocation.value.city) {
        const cityName = currentLocation.value.city;
        return (
            touristSpots[cityName] || [
                {
                    name: 'Gunung Bromo',
                    distance: '57.3 km',
                    type: 'Wisata alam',
                },
                { name: 'Tumpak Sewu', distance: '71 km', type: 'Wisata alam' },
                {
                    name: 'Jatim Park 3',
                    distance: '9.3 km',
                    type: 'Taman Hiburan',
                },
                {
                    name: 'Museum Brawijaya',
                    distance: '5.2 km',
                    type: 'Budaya',
                },
            ]
        );
    }
    return [];
};

// Jalankan deteksi lokasi saat komponen dimount
onMounted(() => {
    getCurrentLocation();
});
</script>

<style scoped>
.loading-state {
    color: #666;
    font-style: italic;
}

.error-state {
    color: #e74c3c;
}

.retry-btn {
    background: #0097b2;
    color: white;
    border: none;
    padding: 8px 16px;
    border-radius: 4px;
    cursor: pointer;
    margin-top: 8px;
}

.retry-btn:hover {
    background: #007a94;
}

.theme-btn.disabled {
    opacity: 0.6;
    pointer-events: none;
}

.location-info {
    animation: fadeIn 0.5s ease-in-out;
}

.nearby-spots {
    margin-top: 16px;
    padding: 16px;
    background: rgba(0, 151, 178, 0.1);
    border-radius: 8px;
    border-left: 4px solid #0097b2;
}

.nearby-spots h4 {
    margin: 0 0 12px 0;
    color: #0097b2;
    font-size: 16px;
}

.spots-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 12px;
}

.spot-card {
    background: white;
    padding: 12px;
    border-radius: 6px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    border: 1px solid #e0e0e0;
    transition:
        transform 0.2s,
        box-shadow 0.2s;
}

.spot-card:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
}

.spot-name {
    font-weight: 600;
    color: #333;
    display: block;
    margin-bottom: 8px;
    font-size: 14px;
}

.spot-details {
    display: flex;
    justify-content: space-between;
    align-items: center;
    font-size: 12px;
}

.spot-distance {
    color: #666;
}

.spot-type {
    background: #0097b2;
    color: white;
    padding: 2px 8px;
    border-radius: 12px;
    font-size: 11px;
}

@keyframes fadeIn {
    from {
        opacity: 0;
    }
    to {
        opacity: 1;
    }
}
</style>
