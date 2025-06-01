<template>
    <header>
        <div class="mx-auto mb-10 max-w-3xl text-center">
            <h1 class="mb-8 text-5xl font-bold text-gray-800">
                <strong>Mau Kemana Kita?</strong>
            </h1>

            <!-- Search Bar Container -->
            <div class="relative mx-auto max-w-2xl" ref="searchContainer">
                <div class="flex gap-4 rounded-full bg-white p-2 shadow-lg">
                    <input
                        type="text"
                        placeholder="Cari wisata, hotels, Restoran, Rentalan ......."
                        class="flex-1 rounded-full px-6 py-3 text-lg text-gray-900 outline-none hover:text-gray-900 focus:text-gray-900"
                        v-model="searchQuery"
                        @focus="handleFocus"
                        @keydown.enter="handleEnterKey"
                        @keydown.arrow-down.prevent="navigateDown"
                        @keydown.arrow-up.prevent="navigateUp"
                        @keydown.escape="closeSuggestions"
                    />
                    <button
                        @click="handleSearch"
                        class="rounded-full bg-[#1ba9c9] px-8 py-3 text-lg text-white transition-colors hover:bg-[#168ba8]"
                    >
                        <span
                            v-if="isSearching"
                            class="flex items-center gap-2"
                        >
                            <div
                                class="h-4 w-4 animate-spin rounded-full border-2 border-white border-t-transparent"
                            ></div>
                            Search
                        </span>
                        <span v-else>Search</span>
                    </button>
                </div>
            </div>
        </div>
    </header>

    <!-- Search Modal -->
    <div
        v-if="showSuggestions"
        class="fixed inset-0 z-50 flex items-start justify-center bg-black bg-opacity-50 pt-20"
        @click="closeSuggestions"
    >
        <div
            class="mx-4 max-h-[70vh] w-full max-w-2xl overflow-hidden rounded-2xl bg-white shadow-2xl"
            @click.stop
        >
            <!-- Modal Header -->
            <div
                class="flex items-center justify-between border-b border-gray-100 p-4"
            >
                <h3 class="text-lg font-semibold text-gray-800">
                    {{
                        searchResults.length > 0
                            ? `${searchResults.length} hasil ditemukan`
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

            <!-- Tambahkan search bar di dalam modal -->
            <div class="border-b border-gray-100 bg-gray-50 p-4">
                <div class="flex gap-2 rounded-full bg-white p-2 shadow">
                    <input
                        type="text"
                        placeholder="Lanjutkan mengetik..."
                        class="flex-1 rounded-full bg-transparent px-4 py-2 text-gray-900 outline-none"
                        v-model="searchQuery"
                        ref="modalInput"
                        @focus="handleFocus"
                        @keydown.enter="handleEnterKey"
                        @keydown.arrow-down.prevent="navigateDown"
                        @keydown.arrow-up.prevent="navigateUp"
                        @keydown.escape="closeSuggestions"
                        style="color: black"
                    />
                    <button
                        @click="handleSearch"
                        class="rounded-full bg-[#1ba9c9] px-4 py-2 text-white transition-colors hover:bg-[#168ba8]"
                    >
                        <span
                            v-if="isSearching"
                            class="flex items-center gap-1"
                        >
                            <div
                                class="h-3 w-3 animate-spin rounded-full border-2 border-white border-t-transparent"
                            ></div>
                            Cari
                        </span>
                        <span v-else>Cari</span>
                    </button>
                </div>
            </div>

            <!-- Modal Content -->
            <div class="max-h-[calc(70vh-80px)] overflow-y-auto">
                <!-- Search Results -->
                <div v-if="searchResults.length > 0" class="p-2">
                    <div
                        v-for="(result, index) in searchResults.slice(0, 12)"
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
                        <div class="flex-1">
                            <div
                                class="mb-1 font-medium text-gray-900"
                                v-html="highlightMatch(result.name)"
                            ></div>
                            <div
                                class="flex items-center gap-2 text-sm text-gray-500"
                            >
                                <span>📍 {{ result.location }}</span>
                                <span class="text-yellow-500"
                                    >⭐ {{ result.rating }}</span
                                >
                            </div>
                        </div>
                        <span
                            :class="getTypeColor(result.type)"
                            class="rounded-full px-3 py-2 text-xs font-medium"
                        >
                            {{ result.type }}
                        </span>
                    </div>

                    <div
                        v-if="searchResults.length > 12"
                        class="border-t border-gray-100 p-4 text-center"
                    >
                        <button
                            @click="handleViewAll"
                            class="font-medium text-blue-600 transition-colors hover:text-blue-800"
                        >
                            Lihat semua {{ searchResults.length }} hasil →
                        </button>
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

                    <!-- Search suggestions -->
                    <div class="mt-6">
                        <p class="mb-3 text-sm font-medium text-gray-600">
                            Mungkin Anda mencari:
                        </p>
                        <div class="flex flex-wrap justify-center gap-2">
                            <button
                                v-for="suggestion in [
                                    'Bromo',
                                    'Bali',
                                    'Bandung',
                                    'Borobudur',
                                ]"
                                :key="suggestion"
                                @click="
                                    searchQuery = suggestion;
                                    performSearch(suggestion);
                                "
                                class="rounded-full bg-blue-100 px-4 py-2 text-sm text-blue-800 transition-colors hover:bg-blue-200"
                            >
                                {{ suggestion }}
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Loading State -->
                <div v-else-if="isSearching" class="p-8 text-center">
                    <div class="inline-flex items-center gap-3">
                        <div
                            class="h-6 w-6 animate-spin rounded-full border-2 border-blue-500 border-t-transparent"
                        ></div>
                        <span class="text-gray-600"
                            >Mencari hasil terbaik untuk Anda...</span
                        >
                    </div>
                </div>
            </div>

            <!-- Modal Footer (Optional) -->
            <div class="border-t border-gray-100 bg-gray-50 p-4">
                <div
                    class="flex items-center justify-between text-sm text-gray-500"
                >
                    <span>💡 Tips: Gunakan keyboard ↑↓ untuk navigasi</span>
                    <span>Press ESC to close</span>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { ref, watch, onMounted, onUnmounted, nextTick } from 'vue';

// Reactive data
const searchQuery = ref('');
const searchResults = ref([]);
const isSearching = ref(false);
const showSuggestions = ref(false);
const searchContainer = ref(null);
const selectedIndex = ref(-1);
const recentSearches = ref([]);
const modalInput = ref(null);

// Watch untuk showSuggestions: ketika modal muncul, fokus ke input modal
watch(showSuggestions, (newVal) => {
    if (newVal) {
        nextTick(() => {
            if (modalInput.value) {
                modalInput.value.focus();
                // Posisikan kursor di akhir teks
                const length = searchQuery.value.length;
                modalInput.value.setSelectionRange(length, length);
            }
        });
    }
});

// Data dummy untuk simulasi
const allDestinations = [
    // Wisata dengan awalan BRO
    {
        name: 'Bromo Tengger Semeru',
        type: 'Wisata',
        location: 'Jawa Timur',
        rating: 4.8,
    },
    {
        name: 'Borobudur Temple',
        type: 'Wisata',
        location: 'Yogyakarta',
        rating: 4.9,
    },
    {
        name: 'Bali Beach Resort',
        type: 'Wisata',
        location: 'Bali',
        rating: 4.7,
    },
    { name: 'Braga Street', type: 'Wisata', location: 'Bandung', rating: 4.5 },
    {
        name: 'Bantul Heritage',
        type: 'Wisata',
        location: 'Yogyakarta',
        rating: 4.3,
    },
    {
        name: 'Brooklyn Bridge Cafe',
        type: 'Restoran',
        location: 'Jakarta',
        rating: 4.4,
    },
    {
        name: 'Brastagi Highland',
        type: 'Wisata',
        location: 'Sumatera Utara',
        rating: 4.6,
    },

    // Hotels
    { name: 'Bali Resort Hotel', type: 'Hotel', location: 'Bali', rating: 4.8 },
    {
        name: 'Bandung Plaza Hotel',
        type: 'Hotel',
        location: 'Bandung',
        rating: 4.5,
    },
    {
        name: 'Bromo View Hotel',
        type: 'Hotel',
        location: 'Jawa Timur',
        rating: 4.6,
    },
    {
        name: 'Bentani Hotel Cirebon',
        type: 'Hotel',
        location: 'Cirebon',
        rating: 4.2,
    },

    // Restoran
    {
        name: 'Bebek Bengil Restaurant',
        type: 'Restoran',
        location: 'Bali',
        rating: 4.7,
    },
    {
        name: 'Bakso Solo Pak H. Bambang',
        type: 'Restoran',
        location: 'Solo',
        rating: 4.6,
    },
    {
        name: 'Burger King Bandung',
        type: 'Restoran',
        location: 'Bandung',
        rating: 4.1,
    },
    {
        name: 'Bebek Kaleyo',
        type: 'Restoran',
        location: 'Jakarta',
        rating: 4.4,
    },

    // Rental
    { name: 'Bike Rental Bali', type: 'Rental', location: 'Bali', rating: 4.3 },
    {
        name: 'Boat Rental Bromo',
        type: 'Rental',
        location: 'Jawa Timur',
        rating: 4.5,
    },
    {
        name: 'Bus Rental Bandung',
        type: 'Rental',
        location: 'Bandung',
        rating: 4.2,
    },
    {
        name: 'BMW Rental Jakarta',
        type: 'Rental',
        location: 'Jakarta',
        rating: 4.7,
    },
];

let searchTimeout = null;

// Watch untuk pencarian real-time (mirip useEffect di React)
watch(searchQuery, (newQuery, oldQuery) => {
    // Clear timeout sebelumnya
    if (searchTimeout) {
        clearTimeout(searchTimeout);
    }

    // Reset selected index
    selectedIndex.value = -1;

    // Jika query kosong
    if (!newQuery.trim()) {
        searchResults.value = [];
        showSuggestions.value = false;
        isSearching.value = false;
        return;
    }

    // Set loading state
    isSearching.value = true;

    // Debounce search - tunggu 300ms sebelum search
    searchTimeout = setTimeout(() => {
        performSearch(newQuery);
    }, 300);
});

// Function untuk melakukan pencarian
const performSearch = (query) => {
    try {
        const filteredResults = allDestinations.filter((destination) => {
            const searchTerm = query.toLowerCase();
            return (
                destination.name.toLowerCase().includes(searchTerm) ||
                destination.type.toLowerCase().includes(searchTerm) ||
                destination.location.toLowerCase().includes(searchTerm)
            );
        });

        // Sort berdasarkan relevance (nama yang dimulai dengan query di atas)
        filteredResults.sort((a, b) => {
            const aStartsWith = a.name
                .toLowerCase()
                .startsWith(query.toLowerCase());
            const bStartsWith = b.name
                .toLowerCase()
                .startsWith(query.toLowerCase());

            if (aStartsWith && !bStartsWith) return -1;
            if (!aStartsWith && bStartsWith) return 1;

            // Jika sama, sort berdasarkan rating
            return b.rating - a.rating;
        });

        searchResults.value = filteredResults;
        showSuggestions.value = true;
        isSearching.value = false;
    } catch (error) {
        console.error('Search error:', error);
        isSearching.value = false;
    }
};

// Methods
const handleFocus = () => {
    if (searchQuery.value && searchResults.value.length > 0) {
        showSuggestions.value = true;
    }
};

const handleViewAll = () => {
    closeSuggestions();
    // Redirect ke halaman hasil pencarian lengkap
    console.log('View all results for:', searchQuery.value);
    // router.push(`/search?q=${encodeURIComponent(searchQuery.value)}`)
};

const handleSuggestionClick = (suggestion) => {
    searchQuery.value = suggestion.name;
    showSuggestions.value = false;
    selectedIndex.value = -1;

    // Simpan ke recent searches
    addToRecentSearches(suggestion.name);

    // Handle selection - bisa redirect atau emit event
    console.log('Selected:', suggestion);

    // Contoh: emit ke parent component
    // emit('destination-selected', suggestion)
};

const handleSearch = () => {
    if (!searchQuery.value.trim()) return;

    showSuggestions.value = false;
    selectedIndex.value = -1;

    // Simpan ke recent searches
    addToRecentSearches(searchQuery.value);

    console.log('Searching for:', searchQuery.value);

    // Di sini bisa redirect ke halaman hasil pencarian
    // router.push(`/search?q=${encodeURIComponent(searchQuery.value)}`)
};

// Keyboard navigation
const navigateDown = () => {
    if (searchResults.value.length > 0) {
        selectedIndex.value = Math.min(
            selectedIndex.value + 1,
            Math.min(searchResults.value.length - 1, 11),
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

// Handle Enter key when suggestion is selected
const handleEnterKey = () => {
    if (selectedIndex.value >= 0 && searchResults.value[selectedIndex.value]) {
        handleSuggestionClick(searchResults.value[selectedIndex.value]);
    } else {
        handleSearch();
    }
};

// Recent searches management
const addToRecentSearches = (search) => {
    const searches = recentSearches.value.filter((s) => s !== search);
    searches.unshift(search);
    recentSearches.value = searches.slice(0, 5); // Keep only 5 recent searches

    // Save to localStorage (opsional)
    try {
        localStorage.setItem(
            'recentSearches',
            JSON.stringify(recentSearches.value),
        );
    } catch (error) {
        console.log('Cannot save to localStorage');
    }
};

// Load recent searches from localStorage
const loadRecentSearches = () => {
    try {
        const saved = localStorage.getItem('recentSearches');
        if (saved) {
            recentSearches.value = JSON.parse(saved);
        }
    } catch (error) {
        console.log('Cannot load from localStorage');
    }
};

// Highlight matching text
const highlightMatch = (text) => {
    if (!searchQuery.value) return text;

    const regex = new RegExp(`(${searchQuery.value})`, 'gi');
    return text.replace(regex, '<mark class="bg-yellow-200">$1</mark>');
};

// Get type color
const getTypeColor = (type) => {
    const colors = {
        Wisata: 'bg-green-100 text-green-800',
        Hotel: 'bg-blue-100 text-blue-800',
        Restoran: 'bg-orange-100 text-orange-800',
        Rental: 'bg-purple-100 text-purple-800',
    };
    return colors[type] || 'bg-gray-100 text-gray-800';
};

// Handle click outside
const handleClickOutside = (event) => {
    if (
        searchContainer.value &&
        !searchContainer.value.contains(event.target)
    ) {
        showSuggestions.value = false;
        selectedIndex.value = -1;
    }
};

// Lifecycle hooks
onMounted(() => {
    document.addEventListener('mousedown', handleClickOutside);
    loadRecentSearches();
});

onUnmounted(() => {
    document.removeEventListener('mousedown', handleClickOutside);
    if (searchTimeout) {
        clearTimeout(searchTimeout);
    }
});
</script>

<style scoped>
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

/* Smooth transitions */
.transition-colors {
    transition:
        background-color 0.2s ease,
        color 0.2s ease;
}

/* Modal animations */
.z-50 {
    animation: modalFadeIn 0.3s ease-out;
}

@keyframes modalFadeIn {
    from {
        opacity: 0;
    }
    to {
        opacity: 1;
    }
}

.bg-white.rounded-2xl.shadow-2xl {
    animation: modalSlideIn 0.3s ease-out;
}

@keyframes modalSlideIn {
    from {
        opacity: 0;
        transform: translateY(-20px) scale(0.95);
    }
    to {
        opacity: 1;
        transform: translateY(0) scale(1);
    }
}
</style>
