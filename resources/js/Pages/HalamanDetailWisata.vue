<template>
    <MainLayout>
        <!-- Loading state ketika destination belum tersedia -->
        <div
            v-if="!currentDestination"
            class="flex min-h-screen items-center justify-center"
        >
            <div class="text-center">
                <div
                    class="mx-auto mb-4 h-12 w-12 animate-spin rounded-full border-b-2 border-blue-500"
                ></div>
                <p class="text-gray-600">Memuat data destinasi...</p>
            </div>
        </div>

        <!-- Tampilkan komponen detail jika destination sudah tersedia -->
        <WisataDetailCard v-else :destination="currentDestination" />

        <!-- Pesan error jika destinasi tidak ditemukan -->
        <div
            v-if="!currentDestination && !isLoading"
            class="flex min-h-screen items-center justify-center"
        >
            <div class="text-center">
                <h2 class="mb-4 text-2xl font-bold text-gray-800">
                    Destinasi Tidak Ditemukan
                </h2>
                <p class="mb-4 text-gray-600">
                    Maaf, destinasi yang Anda cari tidak ditemukan.
                </p>
                <Link
                    href="/"
                    class="inline-block rounded-lg bg-blue-500 px-6 py-2 text-white transition-colors hover:bg-blue-600"
                >
                    Kembali ke Beranda
                </Link>
            </div>
        </div>
    </MainLayout>
</template>

<script setup>
import { ref, onMounted, computed } from 'vue';
import { Link } from '@inertiajs/vue3';
import MainLayout from '../Layouts/MainLayout.vue';
import WisataDetailCard from '../Components/WisataDetailCard.vue';
import { getDestinationBySlug } from '../../data/destinations.js';

// Props yang diterima dari Inertia
const props = defineProps({
    slug: {
        type: String,
        default: null,
    },
    // Props alternatif untuk ID jika menggunakan ID
    id: {
        type: [String, Number],
        default: null,
    },
});

// State management
const currentDestination = ref(null);
const isLoading = ref(true);

// Computed untuk mendapatkan slug dari URL jika tidak tersedia di props
const destinationSlug = computed(() => {
    // Coba ambil dari props dulu
    if (props.slug) return props.slug;

    // Jika tidak ada, ambil dari URL
    const params = new URLSearchParams(window.location.search);
    return params.get('slug');
});

// Function untuk load destination data
const loadDestination = () => {
    isLoading.value = true;

    try {
        const slug = destinationSlug.value;

        if (slug) {
            const destination = getDestinationBySlug(slug);
            currentDestination.value = destination || null;
        }
    } catch (error) {
        console.error('Error loading destination:', error);
        currentDestination.value = null;
    } finally {
        isLoading.value = false;
    }
};

// Load data saat komponen dimount
onMounted(() => {
    loadDestination();
});
</script>
