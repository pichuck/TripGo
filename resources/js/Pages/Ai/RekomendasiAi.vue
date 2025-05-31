<template>
    <MainLayout>
        <div class="m-0 flex h-screen">
            <!-- Left Section - Content (diperpanjang) -->
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
                            <i class="fas fa-user mr-2"></i>
                            <span>{{ travelData.tripType }}</span>
                            <span class="mx-2">•</span>
                            <i class="fas fa-calendar mr-2"></i>
                            <span>{{ travelData.month }}</span>
                            <span class="mx-2">•</span>
                            <i class="fas fa-clock mr-2"></i>
                            <span>{{ travelData.duration }}</span>
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

                    <!-- Cards Section menggunakan cardDestination component -->
                    <div class="mb-8">
                        <h3 class="mb-6 text-2xl font-semibold text-gray-800">
                            Destinasi Rekomendasi
                        </h3>

                        <!-- Container dengan max-width untuk mencegah stretch -->
                        <div class="mx-auto max-w-7xl">
                            <!-- Grid responsive dengan gap yang konsisten -->
                            <div
                                class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-3"
                            >
                                <div
                                    v-for="(place, index) in travelData.places"
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
                                    />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Section - Interactive Map (diperkecil) -->
            <div class="relative w-2/5 bg-gray-100">
                <div class="absolute inset-0">
                    <div ref="mapContainer" class="h-full w-full"></div>
                </div>

                <!-- Enhanced Map Overlay -->
                <div
                    class="absolute left-6 top-6 max-w-xs rounded-2xl bg-white/95 p-6 shadow-xl backdrop-blur-sm"
                >
                    <h3 class="mb-4 text-lg font-bold text-gray-800">
                        <i class="fas fa-map-marker-alt mr-2 text-red-500"></i>
                        Lokasi Wisata
                    </h3>
                    <div class="space-y-3">
                        <div
                            v-for="(place, index) in travelData.places"
                            :key="place.id"
                            class="flex cursor-pointer items-center rounded-lg p-2 transition-colors duration-200 hover:bg-gray-50"
                            @click="focusOnPlace(place)"
                        >
                            <div
                                class="mr-3 h-4 w-4 rounded-full shadow-sm"
                                :class="place.markerColor"
                            ></div>
                            <span class="text-sm font-medium text-gray-700">{{
                                place.name
                            }}</span>
                            <i
                                class="fas fa-external-link-alt ml-auto text-xs text-gray-400"
                            ></i>
                        </div>
                    </div>
                </div>

                <!-- Weather Widget -->
                <div
                    class="absolute right-6 top-6 rounded-2xl bg-white/95 p-4 shadow-xl backdrop-blur-sm"
                >
                    <div class="text-center">
                        <i class="fas fa-sun mb-2 text-2xl text-yellow-500"></i>
                        <div class="text-sm text-gray-600">Malang</div>
                        <div class="text-lg font-bold text-gray-800">28°C</div>
                        <div class="text-xs text-gray-500">Cerah</div>
                    </div>
                </div>
            </div>

            <!-- Modal for place details -->
        </div>
    </MainLayout>
</template>

<script>
import { ref, onMounted } from 'vue';
import MainLayout from '../../Layouts/MainLayout.vue';
import cardDestination from '../../Components/cardDestination.vue';
import 'leaflet/dist/leaflet.css';
import L from 'leaflet';

export default {
    name: 'MalangTravelGuide',
    components: {
        MainLayout,
        cardDestination,
    },
    setup() {
        const map = ref(null);
        const mapContainer = ref(null);
        const isFavorite = ref(false);
        const selectedPlace = ref(null);

        const travelData = ref({
            title: 'Malang',
            tripType: 'Going solo',
            month: 'Juni',
            duration: '1 hari',
            subtitle: 'Petualangan Menakjubkan Melalui Keajaiban Alam',
            description:
                'Rasakan sensasi mendaki Gunung Semeru yang menantang, dengan pemandangan menakjubkan dan matahari terbit yang tak terlupakan di Puncak Mahameru. Setelah menaklukkan ketinggian, bersantailah di pantai Sendiki yang tenang, tempat yang sempurna untuk bersantai dan meremajakan diri di tengah keindahan alam. Lengkapi perjalanan Anda dengan mengunjungi Satya Home Fashion untuk mencari oleh-oleh unik.',
            tips: 'Gunakan sepatu hiking yang nyaman dan bawa jaket hangat untuk pendakian pagi hari. Di pantai, jangan lupa tabir surya dan topi. Sebaiknya mulai perjalanan dari pagi hari untuk memaksimalkan waktu di setiap lokasi.',
            tags: [
                {
                    name: 'Petualangan',
                    bgColor: 'bg-blue-100',
                    textColor: 'text-blue-800',
                    icon: 'fas fa-mountain',
                },
                {
                    name: 'Alam',
                    bgColor: 'bg-green-100',
                    textColor: 'text-green-800',
                    icon: 'fas fa-leaf',
                },
                {
                    name: 'Pantai',
                    bgColor: 'bg-yellow-100',
                    textColor: 'text-yellow-800',
                    icon: 'fas fa-umbrella-beach',
                },
                {
                    name: 'Belanja',
                    bgColor: 'bg-purple-100',
                    textColor: 'text-purple-800',
                    icon: 'fas fa-shopping-bag',
                },
            ],
            places: [
                {
                    id: 1,
                    name: 'Gunung Semeru',
                    rating: 4.7,
                    reviews: 1250,
                    categories: ['Pendakian', 'Alam', 'Petualangan'],
                    location: 'Lumajang, Jawa Timur',
                    image: 'https://images.unsplash.com/photo-1588668214407-6ea9a6d8c272?q=80&w=2071&auto=format&fit=crop',
                    markerColor: 'bg-red-500',
                    lat: -8.1077,
                    lng: 112.9224,
                    price: 'Rp 75.000',
                    description:
                        'Gunung tertinggi di Pulau Jawa dengan pemandangan spektakuler dan tantangan pendakian yang mengasyikkan.',
                },
                {
                    id: 2,
                    name: 'Pantai Sendiki',
                    rating: 4.2,
                    reviews: 850,
                    categories: ['Pantai', 'Bersantai', 'Keluarga'],
                    location: 'Sendang, Malang',
                    image: 'https://images.unsplash.com/photo-1505228395891-9a51e7e86bf6?q=80&w=1933&auto=format&fit=crop',
                    markerColor: 'bg-blue-500',
                    lat: -8.4095,
                    lng: 112.6989,
                    price: 'Rp 10.000',
                    description:
                        'Pantai yang tenang dengan pasir putih dan ombak yang cocok untuk berenang dan bersantai.',
                },
                {
                    id: 3,
                    name: 'Satya Home Fashion',
                    rating: 4.9,
                    reviews: 500,
                    categories: ['Belanja', 'Souvenir', 'Kerajinan'],
                    location: 'Malang, Jawa Timur',
                    image: 'https://images.unsplash.com/photo-1556228453-efd6c1ff04f6?q=80&w=2070&auto=format&fit=crop',
                    markerColor: 'bg-purple-500',
                    lat: -7.9666,
                    lng: 112.6326,
                    price: 'Rp 25.000',
                    description:
                        'Pusat oleh-oleh dan kerajinan khas Malang dengan berbagai pilihan produk berkualitas.',
                },
            ],
        });

        const initMap = async () => {
            // Initialize Leaflet map
            map.value = L.map(mapContainer.value).setView(
                [-7.9826, 112.6129],
                10,
            );

            // Add tile layer
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: ' OpenStreetMap contributors',
            }).addTo(map.value);

            // Add markers for each place
            travelData.value.places.forEach((place) => {
                const marker = L.marker([place.lat, place.lng]).addTo(
                    map.value,
                );
                marker.bindPopup(`
          <div class="p-2">
            <h3 class="font-bold">${place.name}</h3>
            <p class="text-sm text-gray-600">${place.location}</p>
            <div class="flex items-center mt-1">
              <span class="text-yellow-500">★</span>
              <span class="ml-1 text-sm">${place.rating}</span>
            </div>
          </div>
        `);
            });
        };

        const toggleFavorite = () => {
            isFavorite.value = !isFavorite.value;
        };

        const selectPlace = (place) => {
            selectedPlace.value = place;
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
            initMap();
        });

        return {
            map,
            mapContainer,
            isFavorite,
            selectedPlace,
            travelData,
            toggleFavorite,
            selectPlace,
            closeModal,
            focusOnPlace,
        };
    },
};
</script>

<style scoped>
/* Custom animations */
.animate-fade-in {
    animation: fadeIn 0.6s ease-out;
}

.animate-slide-up {
    animation: slideUp 0.8s ease-out;
}

.animate-card-appear {
    animation: cardAppear 0.6s ease-out both;
}

@keyframes fadeIn {
    from {
        opacity: 0;
        transform: translateY(-20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
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

@keyframes cardAppear {
    from {
        opacity: 0;
        transform: translateY(30px) scale(0.95);
    }
    to {
        opacity: 1;
        transform: translateY(0) scale(1);
    }
}

/* Responsive improvements */
@media (max-width: 768px) {
    .flex {
        flex-direction: column;
    }

    .flex-1 {
        height: auto;
        min-height: 100vh;
    }
}

/* Backdrop blur support */
.backdrop-blur-sm {
    backdrop-filter: blur(4px);
}

/* Smooth scrolling */
html {
    scroll-behavior: smooth;
}

/* Card destination styling adjustments untuk lebih konsisten */
:deep(.destination-card-items) {
    height: 100%;
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    cursor: pointer;
}

:deep(.destination-card-items:hover) {
    transform: translateY(-4px);
    box-shadow:
        0 20px 25px -5px rgba(0, 0, 0, 0.1),
        0 10px 10px -5px rgba(0, 0, 0, 0.04);
}

/* Memastikan gambar dalam card tidak stretch */
:deep(.destination-image img) {
    object-fit: cover;
    height: 200px;
    width: 100%;
}
</style>
