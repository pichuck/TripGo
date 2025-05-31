<template>
    <div class="container mx-auto max-w-4xl px-4 py-12">
        <!-- Header -->
        <header class="mb-14 text-center">
            <h1
                class="mb-3 text-4xl font-bold leading-tight text-gray-800 md:text-5xl"
            >
                Pertama, Mau kemana dulu ni kita?
            </h1>
            <p class="mx-auto max-w-lg text-gray-500">
                You'll get custom recommendations
            </p>
        </header>

        <!-- Enhanced Search Section from HeaderBar -->
        <div class="mx-auto mb-10 max-w-2xl">
            <!-- Main Search Bar -->
            <div class="relative" ref="searchContainer">
                <div class="flex gap-4 rounded-full bg-white p-2 shadow-lg">
                    <input
                        type="text"
                        placeholder="Cari provinsi di Indonesia..."
                        class="flex-1 rounded-full px-6 py-3 text-lg text-gray-900 outline-none hover:text-gray-900 focus:text-gray-900"
                        v-model="searchQuery"
                        @focus="handleFocus"
                        @keydown.enter="handleEnterKey"
                        @keydown.arrow-down.prevent="navigateDown"
                        @keydown.arrow-up.prevent="navigateUp"
                        @keydown.escape="closeSuggestions"
                    />
                </div>
            </div>

            <!-- Search Suggestions Modal -->
            <div
                v-if="showSuggestions"
                class="absolute z-50 mt-2 w-full max-w-2xl overflow-hidden rounded-2xl bg-white shadow-2xl"
                @click.stop
            >
                <!-- Modal Header -->
                <div
                    class="flex items-center justify-between border-b border-gray-100 p-4"
                >
                    <h3 class="text-lg font-semibold text-gray-800">
                        {{
                            searchResults.length > 0
                                ? `${searchResults.length} provinsi ditemukan`
                                : 'Mencari...'
                        }}
                    </h3>
                    <button
                        @click="closeSuggestions"
                        class="text-gray-400 transition-colors hover:text-gray-600"
                    >
                        <svg
                            class="h-6 w-6"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M6 18L18 6M6 6l12 12"
                            ></path>
                        </svg>
                    </button>
                </div>

                <!-- Search Results -->
                <div class="max-h-96 overflow-y-auto">
                    <div v-if="searchResults.length > 0" class="p-2">
                        <div
                            v-for="(result, index) in searchResults"
                            :key="index"
                            @click="handleSuggestionClick(result)"
                            @mouseenter="selectedIndex = index"
                            :class="[
                                'flex cursor-pointer items-center justify-between rounded-xl p-4 transition-all duration-200',
                                selectedIndex === index
                                    ? 'border-l-4 border-blue-500 bg-blue-50'
                                    : 'hover:bg-gray-50',
                            ]"
                        >
                            <div class="flex items-center gap-3">
                                <div
                                    class="aspect-square h-12 w-12 overflow-hidden rounded-lg"
                                >
                                    <img
                                        :src="getImageUrl(result.image)"
                                        :alt="result.name"
                                        class="h-full w-full object-cover"
                                        @error="handleImageError"
                                    />
                                </div>
                                <div class="flex-1">
                                    <div
                                        class="mb-1 font-medium text-gray-900"
                                        v-html="highlightMatch(result.name)"
                                    ></div>
                                    <div
                                        class="flex items-center gap-2 text-sm text-gray-500"
                                    >
                                        <span>📍 {{ result.name }}</span>
                                    </div>
                                </div>
                            </div>
                            <span
                                class="rounded-full bg-green-100 px-3 py-1 text-xs font-medium text-green-800"
                            >
                                Provinsi
                            </span>
                        </div>
                    </div>

                    <!-- No Results -->
                    <div
                        v-else-if="searchQuery && !isSearching"
                        class="p-8 text-center text-gray-500"
                    >
                        <div class="mb-4 text-6xl">🔍</div>
                        <div class="mb-2 text-xl font-medium">
                            Tidak ada hasil untuk "{{ searchQuery }}"
                        </div>
                        <div class="text-sm">
                            Coba kata kunci lain atau periksa ejaan
                        </div>
                    </div>

                    <!-- Loading State -->
                    <div v-else-if="isSearching" class="p-8 text-center">
                        <div class="inline-flex items-center gap-3">
                            <div
                                class="h-6 w-6 animate-spin rounded-full border-2 border-blue-500 border-t-transparent"
                            ></div>
                            <span class="text-gray-600"
                                >Mencari provinsi untuk Anda...</span
                            >
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Popular Destinations Grid -->
        <div class="mb-5 text-center">
            <div v-if="isLoading" class="py-10">
                <div
                    class="inline-block h-12 w-12 animate-spin rounded-full border-4 border-blue-500 border-t-transparent"
                ></div>
                <p class="mt-4 text-gray-500">Memuat destinasi...</p>
            </div>

            <div v-else>
                <div
                    v-if="filteredRegions.length === 0"
                    class="py-10 text-gray-500"
                >
                    <i
                        class="fas fa-map-marker-alt mb-4 text-4xl opacity-50"
                    ></i>
                    <p>Provinsi tidak ditemukan</p>
                </div>

                <div
                    v-else
                    class="mx-auto grid grid-cols-2 gap-3 md:grid-cols-3 md:gap-4 lg:grid-cols-6 lg:gap-5"
                >
                    <!-- Card Items -->
                    <div
                        v-for="region in filteredRegions"
                        :key="region.slug"
                        class="region-card group relative cursor-pointer overflow-hidden rounded-lg bg-white shadow-md transition-all hover:shadow-lg md:rounded-xl"
                        :class="{ selected: selectedRegion === region.slug }"
                        @click="selectRegion(region)"
                    >
                        <div class="aspect-video overflow-hidden">
                            <img
                                :src="getImageUrl(region.image)"
                                :alt="region.name"
                                class="h-full w-full object-cover transition-transform duration-300 group-hover:scale-105"
                                @error="handleImageError"
                            />
                        </div>
                        <div
                            class="absolute inset-x-0 bottom-0 bg-gradient-to-t from-black/60 to-transparent px-3 py-2 text-center md:px-4 md:py-3"
                        >
                            <span
                                class="text-sm font-semibold text-white drop-shadow-md md:text-base"
                            >
                                {{ region.name }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Next Button -->
        <div class="mt-12 text-center">
            <button
                @click="handleNext"
                :disabled="!selectedRegion"
                class="next-btn rounded-full bg-primary px-12 py-4 text-lg font-medium text-white shadow-lg transition-all hover:bg-blue-700 disabled:opacity-50"
            >
                Next
                <i class="fas fa-arrow-right ml-2"></i>
            </button>
        </div>
    </div>
</template>

<script>
// PERBAIKAN: Import computed dari Vue
import { ref, computed, watch, onMounted, onUnmounted, nextTick } from 'vue';

export default {
    props: {
        formData: Object,
    },
    emits: ['next-step', 'update-form-data'],
    setup(props, { emit }) {
        // Reactive data
        const searchQuery = ref('');
        const searchResults = ref([]);
        const isSearching = ref(false);
        const showSuggestions = ref(false);
        const searchContainer = ref(null);
        const selectedIndex = ref(-1);
        const selectedRegion = ref(null);
        const isLoading = ref(false);

        // Data provinsi Indonesia
        const regions = ref([
            { name: 'Banten', slug: 'banten', image: 'banten' },
            { name: 'DKI Jakarta', slug: 'jakarta', image: 'jakarta' },
            { name: 'Jawa Barat', slug: 'jawa-barat', image: 'JawaBarat' },
            { name: 'Jawa Tengah', slug: 'jawa-tengah', image: 'JawaTengah' },
            { name: 'Yogyakarta', slug: 'yogyakarta', image: 'Yogyakarta' },
            { name: 'Jawa Timur', slug: 'jawa-timur', image: 'JawaTimur' },
        ]);

        let searchTimeout = null;

        // Computed - sekarang sudah diimport dengan benar
        const filteredRegions = computed(() => {
            if (!searchQuery.value) {
                return regions.value;
            }
            const query = searchQuery.value.toLowerCase();
            return regions.value.filter(
                (region) =>
                    region.name.toLowerCase().includes(query) ||
                    region.slug.toLowerCase().includes(query),
            );
        });

        // Watch untuk pencarian real-time
        watch(searchQuery, (newQuery) => {
            if (searchTimeout) {
                clearTimeout(searchTimeout);
            }

            selectedIndex.value = -1;

            if (!newQuery.trim()) {
                searchResults.value = [];
                showSuggestions.value = false;
                isSearching.value = false;
                return;
            }

            isSearching.value = true;

            // Debounce search
            searchTimeout = setTimeout(() => {
                performSearch(newQuery);
            }, 300);
        });

        // Methods
        const performSearch = (query) => {
            try {
                const filteredResults = regions.value.filter((region) => {
                    const searchTerm = query.toLowerCase();
                    return (
                        region.name.toLowerCase().includes(searchTerm) ||
                        region.slug.toLowerCase().includes(searchTerm)
                    );
                });

                // Sort berdasarkan relevance
                filteredResults.sort((a, b) => {
                    const aStartsWith = a.name
                        .toLowerCase()
                        .startsWith(query.toLowerCase());
                    const bStartsWith = b.name
                        .toLowerCase()
                        .startsWith(query.toLowerCase());

                    if (aStartsWith && !bStartsWith) return -1;
                    if (!aStartsWith && bStartsWith) return 1;
                    return 0;
                });

                searchResults.value = filteredResults;
                showSuggestions.value = true;
                isSearching.value = false;
            } catch (error) {
                console.error('Search error:', error);
                isSearching.value = false;
            }
        };

        const handleFocus = () => {
            if (searchQuery.value && searchResults.value.length > 0) {
                showSuggestions.value = true;
            }
        };

        const handleSuggestionClick = (suggestion) => {
            searchQuery.value = suggestion.name;
            showSuggestions.value = false;
            selectedIndex.value = -1;
            selectedRegion.value = suggestion.slug;

            console.log('Selected province:', suggestion);
        };

        const handleSearch = () => {
            if (!searchQuery.value.trim()) return;

            showSuggestions.value = false;
            selectedIndex.value = -1;

            // Cari provinsi yang cocok dan select otomatis
            const matchedRegion = regions.value.find((region) =>
                region.name
                    .toLowerCase()
                    .includes(searchQuery.value.toLowerCase()),
            );

            if (matchedRegion) {
                selectedRegion.value = matchedRegion.slug;
            }

            console.log('Searching for:', searchQuery.value);
        };

        const navigateDown = () => {
            if (searchResults.value.length > 0) {
                selectedIndex.value = Math.min(
                    selectedIndex.value + 1,
                    searchResults.value.length - 1,
                );
            }
        };

        const navigateUp = () => {
            selectedIndex.value = Math.max(selectedIndex.value - 1, -1);
        };

        const closeSuggestions = () => {
            showSuggestions.value = false;
            selectedIndex.value = -1;
        };

        const handleEnterKey = () => {
            if (
                selectedIndex.value >= 0 &&
                searchResults.value[selectedIndex.value]
            ) {
                handleSuggestionClick(searchResults.value[selectedIndex.value]);
            } else {
                handleSearch();
            }
        };

        const highlightMatch = (text) => {
            if (!searchQuery.value) return text;
            const regex = new RegExp(`(${searchQuery.value})`, 'gi');
            return text.replace(regex, '<mark class="bg-yellow-200">$1</mark>');
        };

        const getImageUrl = (imageName) => {
            return `/assets/img/bnr_${imageName}.jpg`;
        };

        const handleImageError = (event) => {
            event.target.src = '/assets/img/default-destination.jpg';
        };

        const selectRegion = (region) => {
            selectedRegion.value = region.slug;
            searchQuery.value = region.name;
        };

        const handleNext = () => {
            if (selectedRegion.value) {
                const selectedRegionObj = regions.value.find(
                    (region) => region.slug === selectedRegion.value,
                );

                emit('update-form-data', {
                    destination: selectedRegionObj,
                });
                emit('next-step');
            }
        };

        // Click outside handler
        const handleClickOutside = (event) => {
            if (
                searchContainer.value &&
                !searchContainer.value.contains(event.target)
            ) {
                showSuggestions.value = false;
                selectedIndex.value = -1;
            }
        };

        // Lifecycle
        onMounted(() => {
            document.addEventListener('mousedown', handleClickOutside);

            // Animation for cards
            nextTick(() => {
                const cards = document.querySelectorAll('.region-card');
                cards.forEach((card, index) => {
                    card.style.opacity = '0';
                    card.style.transition =
                        'opacity 0.5s ease, transform 0.3s ease';
                    card.style.transform = 'translateY(20px)';
                    setTimeout(
                        () => {
                            card.style.opacity = '1';
                            card.style.transform = 'translateY(0)';
                        },
                        150 * index + 100,
                    );
                });
            });
        });

        onUnmounted(() => {
            document.removeEventListener('mousedown', handleClickOutside);
            if (searchTimeout) {
                clearTimeout(searchTimeout);
            }
        });

        return {
            searchQuery,
            searchResults,
            isSearching,
            showSuggestions,
            searchContainer,
            selectedIndex,
            selectedRegion,
            isLoading,
            regions,
            filteredRegions,
            handleFocus,
            handleSuggestionClick,
            handleSearch,
            navigateDown,
            navigateUp,
            closeSuggestions,
            handleEnterKey,
            highlightMatch,
            getImageUrl,
            handleImageError,
            selectRegion,
            handleNext,
            performSearch,
        };
    },
};
</script>

<style scoped>
.destination-card {
    transition: all 0.3s ease;
    transform: translateY(0);
}
.destination-card:hover {
    transform: translateY(-5px);
    box-shadow:
        0 20px 25px -5px rgba(0, 0, 0, 0.1),
        0 10px 10px -5px rgba(0, 0, 0, 0.04);
}
.search-input:focus {
    box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.2);
}
.next-btn {
    transition: all 0.3s ease;
}
.next-btn:hover {
    transform: translateY(-2px);
    box-shadow:
        0 10px 15px -3px rgba(0, 0, 0, 0.1),
        0 4px 6px -2px rgba(0, 0, 0, 0.05);
}

.region-card.selected {
    border: 2px solid #2563eb;
    transform: translateY(-5px);
    box-shadow:
        0 20px 25px -5px rgba(37, 99, 235, 0.2),
        0 10px 10px -5px rgba(37, 99, 235, 0.1);
}

/* Custom animations */
.animate-spin {
    animation: spin 1s linear infinite;
}

@keyframes spin {
    from {
        transform: rotate(0deg);
    }
    to {
        transform: rotate(360deg);
    }
}

.transition-colors {
    transition:
        background-color 0.2s ease,
        color 0.2s ease;
}
</style>
