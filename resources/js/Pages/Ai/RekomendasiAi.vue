<template>
    <MainLayout>
        <!-- Preloader Modal -->
        <div
            v-if="isLoading"
            class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 backdrop-blur-sm"
        >
            <div class="rounded-2xl bg-white p-8 text-center shadow-2xl">
                <div class="mb-4">
                    <div
                        class="mx-auto h-16 w-16 animate-spin rounded-full border-4 border-blue-200 border-t-blue-600"
                    ></div>
                </div>
                <h3 class="mb-2 text-xl font-bold text-gray-800">
                    Tunggu Sebentar...
                </h3>
                <p class="text-gray-600">Sedang menyesuaikan preferensi Anda</p>
                <div class="mt-4 h-2 w-full rounded-full bg-gray-200">
                    <div
                        class="h-2 rounded-full bg-blue-600 transition-all duration-300"
                        :style="{ width: loadingProgress + '%' }"
                    ></div>
                </div>
            </div>
        </div>

        <div v-if="!isLoading" class="m-0 flex h-screen">
            <!-- Left Section - Content -->
            <div class="w-3/5 overflow-y-auto p-6">
                <div class="h-2 p-0 lg:p-20">
                    <!-- Header Section with Animation -->
                    <div class="animate-fade-in mb-8">
                        <div class="mb-4 flex items-center justify-between">
                            <h1
                                class="text-4xl font-bold tracking-tight text-gray-900 lg:text-5xl"
                            >
                                {{ travelData.title }}
                            </h1>
                            <button
                                @click="toggleFavorite"
                                class="rounded-full p-2 transition-colors duration-200 hover:bg-gray-100"
                            >
                                <i
                                    :class="[
                                        'text-2xl transition-colors duration-200',
                                        isFavorite
                                            ? 'fas fa-heart text-red-500'
                                            : 'far fa-heart text-gray-400',
                                    ]"
                                ></i>
                            </button>
                        </div>

                        <div
                            class="mb-4 flex items-center text-lg text-gray-600"
                        >
                            <i class="fas fa-calendar mr-2"></i>
                            <span>{{ travelData.bestMonth }}</span>
                            <span class="mx-2">•</span>
                            <i class="fas fa-clock mr-2"></i>
                            <span>{{ travelData.duration }}</span>
                            <span class="mx-2">•</span>
                            <i class="fas fa-cloud-sun mr-2"></i>
                            <span>{{ travelData.weather }}</span>
                        </div>

                        <!-- Tags with improved styling -->
                        <div class="flex flex-wrap gap-2">
                            <span
                                v-for="tag in travelData.tags"
                                :key="tag.name"
                                :class="[
                                    'cursor-pointer rounded-full px-4 py-2 text-sm font-medium transition-all duration-200 hover:scale-105',
                                    tag.bgColor,
                                    tag.textColor,
                                ]"
                            >
                                <i :class="tag.icon + ' mr-1'"></i>
                                {{ tag.name }}
                            </span>
                        </div>
                    </div>

                    <!-- Description Section -->
                    <div class="animate-slide-up mb-8">
                        <h2
                            class="mb-4 text-2xl font-semibold text-gray-800 lg:text-3xl"
                        >
                            {{ travelData.subtitle }}
                        </h2>
                        <p class="mb-6 text-lg leading-relaxed text-gray-700">
                            {{ travelData.description }}
                        </p>

                        <!-- Enhanced Tips Section -->
                        <div
                            class="to-blue-25 mb-6 rounded-xl border-l-4 border-blue-500 bg-gradient-to-r from-blue-50 p-6 shadow-sm"
                        >
                            <div class="flex items-start">
                                <div class="flex-shrink-0">
                                    <div class="rounded-full bg-blue-100 p-2">
                                        <i
                                            class="fa-solid fa-lightbulb text-xl text-blue-600"
                                        ></i>
                                    </div>
                                </div>
                                <div class="ml-4">
                                    <h3
                                        class="mb-2 font-semibold text-blue-800"
                                    >
                                        Tips Perjalanan
                                    </h3>
                                    <p class="leading-relaxed text-blue-700">
                                        {{ travelData.tips }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Destinasi Wisata Section -->
                    <div class="mb-8">
                        <h3 class="mb-6 text-2xl font-semibold text-gray-800">
                            <i
                                class="fas fa-map-marker-alt mr-2 text-red-500"
                            ></i>
                            Destinasi Wisata Rekomendasi
                        </h3>
                        <div class="mx-auto max-w-7xl">
                            <div
                                class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-3"
                            >
                                <div
                                    v-for="(
                                        place, index
                                    ) in travelData.destinations"
                                    :key="place.id"
                                    class="animate-card-appear"
                                    :style="{
                                        animationDelay: `${index * 0.15}s`,
                                    }"
                                    @click="selectPlace(place)"
                                >
                                    <cardDestination
                                        :id="place.id"
                                        :image="place.image"
                                        :location="place.location"
                                        :rating="place.rating.toString()"
                                        :title="place.name"
                                        :price="
                                            place.price?.replace('Rp ', '') ||
                                            '0'
                                        "
                                        :slug="generateSlug(place.name)"
                                    />
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Restoran Section -->
                    <div class="mb-8">
                        <h3 class="mb-6 text-2xl font-semibold text-gray-800">
                            <i class="fas fa-utensils mr-2 text-yellow-500"></i>
                            Restoran Rekomendasi
                        </h3>
                        <div class="mx-auto max-w-7xl">
                            <div
                                class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-3"
                            >
                                <div
                                    v-for="(
                                        restaurant, index
                                    ) in travelData.restaurants"
                                    :key="restaurant.id"
                                    class="animate-card-appear"
                                    :style="{
                                        animationDelay: `${index * 0.15}s`,
                                    }"
                                    @click="selectPlace(restaurant)"
                                >
                                    <cardDestination
                                        :id="restaurant.id"
                                        :image="restaurant.image"
                                        :location="restaurant.location"
                                        :rating="restaurant.rating.toString()"
                                        :title="restaurant.name"
                                        :price="
                                            restaurant.price?.replace(
                                                'Rp ',
                                                '',
                                            ) || '0'
                                        "
                                        :slug="generateSlug(restaurant.name)"
                                    />
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Penginapan Section -->
                    <div class="mb-8">
                        <h3 class="mb-6 text-2xl font-semibold text-gray-800">
                            <i class="fas fa-bed mr-2 text-orange-500"></i>
                            Penginapan Rekomendasi
                        </h3>
                        <div class="mx-auto max-w-7xl">
                            <div
                                class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-3"
                            >
                                <div
                                    v-for="(hotel, index) in travelData.hotels"
                                    :key="hotel.id"
                                    class="animate-card-appear"
                                    :style="{
                                        animationDelay: `${index * 0.15}s`,
                                    }"
                                    @click="selectPlace(hotel)"
                                >
                                    <cardDestination
                                        :id="hotel.id"
                                        :image="hotel.image"
                                        :location="hotel.location"
                                        :rating="hotel.rating.toString()"
                                        :title="hotel.name"
                                        :price="
                                            hotel.price?.replace('Rp ', '') ||
                                            '0'
                                        "
                                        :slug="generateSlug(hotel.name)"
                                    />
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Oleh-oleh Section -->
                    <div class="mb-8">
                        <h3 class="mb-6 text-2xl font-semibold text-gray-800">
                            <i
                                class="fas fa-shopping-bag mr-2 text-purple-500"
                            ></i>
                            Oleh-oleh Rekomendasi
                        </h3>
                        <div class="mx-auto max-w-7xl">
                            <div
                                class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-3"
                            >
                                <div
                                    v-for="(
                                        souvenir, index
                                    ) in travelData.souvenirs"
                                    :key="souvenir.id"
                                    class="animate-card-appear"
                                    :style="{
                                        animationDelay: `${index * 0.15}s`,
                                    }"
                                    @click="selectPlace(souvenir)"
                                >
                                    <cardDestination
                                        :id="souvenir.id"
                                        :image="souvenir.image"
                                        :location="souvenir.location"
                                        :rating="souvenir.rating.toString()"
                                        :title="souvenir.name"
                                        :price="
                                            souvenir.price?.replace(
                                                'Rp ',
                                                '',
                                            ) || '0'
                                        "
                                        :slug="generateSlug(souvenir.name)"
                                    />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Section - Interactive Map -->
            <div class="relative w-2/5 bg-gray-100">
                <!-- Map Layer -->
                <div class="absolute inset-0" style="z-index: 10">
                    <div ref="mapContainer" class="h-full w-full"></div>
                </div>

                <!-- Enhanced Map Overlay -->
                <div
                    class="absolute left-6 top-6 max-w-xs rounded-2xl bg-white/95 p-6 shadow-xl backdrop-blur-sm"
                    style="z-index: 20"
                >
                    <h3 class="mb-4 text-lg font-bold text-gray-800">
                        <i class="fas fa-map-marker-alt mr-2 text-red-500"></i>
                        Peta Lokasi
                    </h3>
                    <div class="space-y-2 text-sm">
                        <div class="flex items-center">
                            <div
                                class="mr-2 h-3 w-3 rounded-full bg-red-500"
                            ></div>
                            <span>Wisata</span>
                        </div>
                        <div class="flex items-center">
                            <div
                                class="mr-2 h-3 w-3 rounded-full bg-yellow-500"
                            ></div>
                            <span>Restoran</span>
                        </div>
                        <div class="flex items-center">
                            <div
                                class="mr-2 h-3 w-3 rounded-full bg-orange-500"
                            ></div>
                            <span>Penginapan</span>
                        </div>
                        <div class="flex items-center">
                            <div
                                class="mr-2 h-3 w-3 rounded-full bg-purple-500"
                            ></div>
                            <span>Oleh-oleh</span>
                        </div>
                    </div>
                </div>

                <!-- Weather Widget -->
                <div
                    class="absolute right-6 top-6 rounded-2xl bg-white/95 p-4 shadow-xl backdrop-blur-sm"
                    style="z-index: 30"
                >
                    <div class="text-center">
                        <i class="fas fa-sun mb-2 text-2xl text-yellow-500"></i>
                        <div class="text-sm text-gray-600">Yogyakarta</div>
                        <div class="text-lg font-bold text-gray-800">
                            {{ travelData.currentTemp }}
                        </div>
                        <div class="text-xs text-gray-500">
                            {{ travelData.currentWeather }}
                        </div>
                        <div class="mt-2 text-xs text-blue-600">
                            <i class="fas fa-calendar-alt mr-1"></i>
                            Terbaik: {{ travelData.bestMonth }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </MainLayout>
</template>

<script>
import { ref, onMounted, nextTick } from 'vue';
import MainLayout from '../../Layouts/MainLayout.vue';
import cardDestination from '../../Components/cardDestination.vue';
import 'leaflet/dist/leaflet.css';
import L from 'leaflet';

export default {
    name: 'YogyakartaTravelGuide',
    components: {
        MainLayout,
        cardDestination,
    },
    setup() {
        const map = ref(null);
        const mapContainer = ref(null);
        const isFavorite = ref(false);
        const selectedPlace = ref(null);
        const isLoading = ref(true);
        const loadingProgress = ref(0);

        const travelData = ref({
            title: 'Yogyakarta',
            bestMonth: 'April - Oktober',
            duration: '3-4 hari',
            weather: 'Kering & Cerah',
            currentTemp: '29°C',
            currentWeather: 'Cerah Berawan',
            subtitle: 'Jelajahi Keajaiban Budaya dan Kuliner Istimewa',
            description:
                'Rasakan pesona Yogyakarta yang memadukan keindahan arsitektur klasik Kraton dengan kehangatan kuliner khas seperti Gudeg dan Bakpia. nikmati suasana Malioboro yang tak pernah sepi, dan temukan berbagai kerajinan unik di Kotagede. Yogyakarta menawarkan pengalaman budaya yang autentik dengan sentuhan modern.',
            tips: 'Kunjungi Yogyakarta pada musim kemarau (April-Oktober) untuk cuaca yang optimal. Gunakan pakaian yang sopan saat mengunjungi tempat-tempat bersejarah. Coba naik andong atau becak untuk pengalaman otentik. Jangan lupa mencicipi gudeg, bakpia, dan wedang ronde khas Yogya.',
            tags: [
                {
                    name: 'Budaya',
                    bgColor: 'bg-red-100',
                    textColor: 'text-red-800',
                    icon: 'fas fa-landmark',
                },
                {
                    name: 'Sejarah',
                    bgColor: 'bg-amber-100',
                    textColor: 'text-amber-800',
                    icon: 'fas fa-scroll',
                },
                {
                    name: 'Kuliner',
                    bgColor: 'bg-orange-100',
                    textColor: 'text-orange-800',
                    icon: 'fas fa-utensils',
                },
                {
                    name: 'Kerajinan',
                    bgColor: 'bg-purple-100',
                    textColor: 'text-purple-800',
                    icon: 'fas fa-palette',
                },
            ],
            destinations: [
                {
                    id: 2,
                    name: 'Kraton Yogyakarta',
                    rating: 4.6,
                    location: 'Kraton, Yogyakarta',
                    image: '/assets/img/destination/kraton yogya.jpeg',
                    lat: -7.8053,
                    lng: 110.3644,
                    price: 'Rp 15.000',
                    type: 'destination',
                    markerColor: 'red',
                },
                {
                    id: 3,
                    name: 'Jalan Malioboro',
                    rating: 4.5,
                    location: 'Malioboro, Yogyakarta',
                    image: 'data:image/jpeg;base64,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',
                    lat: -7.7956,
                    lng: 110.3695,
                    price: 'Gratis',
                    type: 'destination',
                    markerColor: 'red',
                },
            ],
            restaurants: [
                {
                    id: 4,
                    name: 'Gudeg Yu Djum',
                    rating: 4.7,
                    location: 'Wijilan, Yogyakarta',
                    image: '/assets/img/destination/gudeg.jpeg',
                    lat: -7.8017,
                    lng: 110.3667,
                    price: 'Rp 25.000',
                    type: 'restaurant',
                    markerColor: 'yellow',
                },
                {
                    id: 5,
                    name: 'Sate Klathak Pak Pong',
                    rating: 4.6,
                    location: 'Bantul, Yogyakarta',
                    image: 'https://images.unsplash.com/photo-1544025162-d76694265947?q=80&w=2069&auto=format&fit=crop',
                    lat: -7.83,
                    lng: 110.34,
                    price: 'Rp 35.000',
                    type: 'restaurant',
                    markerColor: 'yellow',
                },
                {
                    id: 6,
                    name: 'Angkringan Tugu',
                    rating: 4.4,
                    location: 'Tugu, Yogyakarta',
                    image: 'https://images.unsplash.com/photo-1554978991-33ef7f31d658?q=80&w=2070&auto=format&fit=crop',
                    lat: -7.7844,
                    lng: 110.3667,
                    price: 'Rp 15.000',
                    type: 'restaurant',
                    markerColor: 'yellow',
                },
            ],
            hotels: [
                {
                    id: 7,
                    name: 'Hotel Tentrem Yogyakarta',
                    rating: 4.8,
                    location: 'Malioboro, Yogyakarta',
                    image: 'https://images.unsplash.com/photo-1566073771259-6a8506099945?q=80&w=2070&auto=format&fit=crop',
                    lat: -7.7928,
                    lng: 110.3678,
                    price: 'Rp 850.000',
                    type: 'hotel',
                    markerColor: 'orange',
                },
                {
                    id: 8,
                    name: 'The Phoenix Hotel',
                    rating: 4.6,
                    location: 'Malioboro, Yogyakarta',
                    image: 'https://images.unsplash.com/photo-1551882547-ff40c63fe5fa?q=80&w=2070&auto=format&fit=crop',
                    lat: -7.7939,
                    lng: 110.3656,
                    price: 'Rp 650.000',
                    type: 'hotel',
                    markerColor: 'orange',
                },
                {
                    id: 9,
                    name: 'INEZ Homestay',
                    rating: 4.3,
                    location: 'Kec. Mergangsan, Kota Yogyakarta',
                    image: '/assets/img/destination/ienz-homestay.jpeg',
                    lat: -7.8206187,
                    lng: 110.3697933,
                    price: 'Rp 350.000',
                    type: 'hotel',
                    markerColor: 'orange',
                },
            ],
            souvenirs: [
                {
                    id: 10,
                    name: 'Bakpia Pathok 25',
                    rating: 4.7,
                    location: 'Pathuk, Yogyakarta',
                    image: '/assets/img/destination/Bakpia.jpeg',
                    lat: -7.7833,
                    lng: 110.37,
                    price: 'Rp 45.000',
                    type: 'souvenir',
                    markerColor: 'purple',
                },
                {
                    id: 11,
                    name: 'Batik Plentong',
                    rating: 4.5,
                    location: 'Kotagede, Yogyakarta',
                    image: 'https://images.unsplash.com/photo-1558618666-fcd25c85cd64?q=80&w=2070&auto=format&fit=crop',
                    lat: -7.8289,
                    lng: 110.3922,
                    price: 'Rp 125.000',
                    type: 'souvenir',
                    markerColor: 'purple',
                },
                {
                    id: 12,
                    name: 'Perak Kotagede',
                    rating: 4.6,
                    location: 'Kotagede, Yogyakarta',
                    image: 'https://images.unsplash.com/photo-1515562141207-7a88fb7ce338?q=80&w=2070&auto=format&fit=crop',
                    lat: -7.8267,
                    lng: 110.3933,
                    price: 'Rp 85.000',
                    type: 'souvenir',
                    markerColor: 'purple',
                },
            ],
        });

        // Fix Leaflet default markers
        delete L.Icon.Default.prototype._getIconUrl;
        L.Icon.Default.mergeOptions({
            iconRetinaUrl:
                'https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/images/marker-icon-2x.png',
            iconUrl:
                'https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/images/marker-icon.png',
            shadowUrl:
                'https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/images/marker-shadow.png',
        });

        const initMap = async () => {
            await nextTick();

            if (!mapContainer.value) {
                console.error('Map container not found');
                return;
            }

            try {
                map.value = L.map(mapContainer.value).setView(
                    [-7.7956, 110.3695],
                    11,
                );

                L.tileLayer(
                    'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',
                    {
                        attribution: ' OpenStreetMap contributors',
                    },
                ).addTo(map.value);

                const markerColors = {
                    red: '#ef4444',
                    yellow: '#eab308',
                    orange: '#f97316',
                    purple: '#a855f7',
                };

                const createCustomMarker = (color) => {
                    return L.divIcon({
                        html: `<div style="background-color: ${color}; width: 20px; height: 20px; border-radius: 50%; border: 3px solid white; box-shadow: 0 2px 4px rgba(0,0,0,0.3);"></div>`,
                        iconSize: [20, 20],
                        iconAnchor: [10, 10],
                        popupAnchor: [0, -10],
                        className: 'custom-marker',
                    });
                };

                const allPlaces = [
                    ...travelData.value.destinations,
                    ...travelData.value.restaurants,
                    ...travelData.value.hotels,
                    ...travelData.value.souvenirs,
                ];

                allPlaces.forEach((place) => {
                    const marker = L.marker([place.lat, place.lng], {
                        icon: createCustomMarker(
                            markerColors[place.markerColor],
                        ),
                    }).addTo(map.value);

                    marker.bindPopup(`
                        <div class="p-3">
                            <h3 class="font-bold text-lg">${place.name}</h3>
                            <p class="text-sm text-gray-600 mb-1">${place.location}</p>
                            <div class="flex items-center mb-2">
                                <span class="text-yellow-500">★</span>
                                <span class="ml-1 text-sm">${place.rating}</span>
                            </div>
                            <p class="text-sm font-semibold text-blue-600">${place.price}</p>
                        </div>
                    `);
                });

                console.log('Map initialized successfully');
            } catch (error) {
                console.error('Error initializing map:', error);
            }
        };

        const simulateLoading = () => {
            const interval = setInterval(() => {
                loadingProgress.value += Math.random() * 15;
                if (loadingProgress.value >= 100) {
                    loadingProgress.value = 100;
                    setTimeout(() => {
                        isLoading.value = false;
                        clearInterval(interval);
                        setTimeout(initMap, 100);
                    }, 500);
                }
            }, 200);
        };

        const toggleFavorite = () => {
            isFavorite.value = !isFavorite.value;
        };

        const selectPlace = (place) => {
            selectedPlace.value = place;
            if (map.value) {
                map.value.setView([place.lat, place.lng], 15);
            }
        };

        const generateSlug = (name) => {
            return name
                .toLowerCase()
                .replace(/[^a-z0-9]+/g, '-')
                .replace(/(^-|-$)/g, '');
        };

        const closeModal = () => {
            selectedPlace.value = null;
        };

        const focusOnPlace = (place) => {
            if (map.value) {
                map.value.setView([place.lat, place.lng], 13);
            }
        };

        onMounted(() => {
            simulateLoading();
        });

        return {
            map,
            mapContainer,
            isFavorite,
            selectedPlace,
            isLoading,
            loadingProgress,
            travelData,
            toggleFavorite,
            selectPlace,
            generateSlug,
            closeModal,
            focusOnPlace,
        };
    },
};
</script>

<style scoped>
.animate-fade-in {
    animation: fadeIn 0.8s ease;
}
@keyframes fadeIn {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}
.animate-slide-up {
    animation: slideUp 0.8s cubic-bezier(0.4, 0, 0.2, 1);
}
@keyframes slideUp {
    from {
        opacity: 0;
        transform: translateY(40px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}
.animate-card-appear {
    animation: cardAppear 0.7s cubic-bezier(0.4, 0, 0.2, 1) both;
}
@keyframes cardAppear {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}
.custom-marker {
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
}
</style>
