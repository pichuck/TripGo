<template>
    <section class="activities-details-section fix section-padding">
        <div class="container">
            <div class="activities-details-wrapper">
                <div class="row g-4 justify-content-center">
                    <!-- Safety check untuk destination -->
                    <template v-if="destination">
                        <div class="details-thumb">
                            <img
                                :src="destination.image"
                                :alt="destination.title"
                            />
                            <ul class="image-list">
                                <li>
                                    <img :src="destination.image" alt="img" />
                                </li>
                            </ul>
                        </div>
                        <div class="activities-details-content">
                            <h2 class="mb-3 text-5xl">
                                {{ destination.title }}
                            </h2>
                            <div class="location-rating mb-4">
                                <span class="location">
                                    <i class="fa-thin fa-location-dot"></i>
                                    {{ destination.location }}
                                </span>
                                <span class="rating ml-4">
                                    <i class="fa-solid fa-star"></i>
                                    {{ destination.rating }}
                                </span>
                            </div>

                            <div class="categories mb-3">
                                <span
                                    v-for="(
                                        category, index
                                    ) in destination.categories"
                                    :key="`category-${index}`"
                                    class="category-tag"
                                >
                                    {{ category }}
                                </span>
                            </div>

                            <div class="location-rating mb-4">
                                <span class="location">
                                    <i class="fa-thin fa-location-dot"></i>
                                    {{ destination.location }}
                                </span>
                                <span class="rating ml-4">
                                    <i class="fa-solid fa-star"></i>
                                    {{ destination.rating }}
                                </span>
                            </div>

                            <div class="address mb-4">
                                <i class="fa-solid fa-map-marker-alt mr-2"></i>
                                <strong>Alamat: </strong>
                                <span>{{ destination.address }}</span>
                            </div>

                            <!-- TAMBAHAN: Fasilitas -->
                            <div class="facilities mb-4">
                                <h4 class="mb-2 font-bold">
                                    <i class="fa-solid fa-list-check mr-2"></i>
                                    Fasilitas:
                                </h4>
                                <ul class="facility-list">
                                    <li
                                        v-for="(
                                            facility, index
                                        ) in destination.facilities"
                                        :key="`facility-${index}`"
                                    >
                                        <i class="fa-solid fa-check mr-2"></i>
                                        {{ facility }}
                                    </li>
                                </ul>
                            </div>
                            <p class="text-justify">
                                {{ destination.description }}
                            </p>
                            <p
                                class="mt-3 text-justify"
                                v-if="destination.fullDescription"
                            >
                                {{ destination.fullDescription }}
                            </p>

                            <div class="price-section mb-4 mt-4">
                                <h4 class="text-2xl font-bold">
                                    Mulai dari IDR {{ destination.price }}
                                </h4>
                            </div>

                            <!-- Tempat Penginapan Terdekat -->
                            <div
                                class="activities-box-wrap"
                                v-if="
                                    destination.nearbyLodging &&
                                    destination.nearbyLodging.length > 0
                                "
                            >
                                <div class="activities-box-area">
                                    <h1 class="text-2xl">
                                        <strong
                                            >Tempat Penginapan Terdekat</strong
                                        >
                                    </h1>
                                    <ul class="nearby-list mt-3">
                                        <li
                                            v-for="(
                                                lodging, index
                                            ) in destination.nearbyLodging"
                                            :key="`lodging-${index}`"
                                        >
                                            <i class="fa-solid fa-bed mr-2"></i>
                                            {{ lodging }}
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <!-- Tempat Makan Terdekat -->
                            <div
                                class="activities-box-wrap"
                                v-if="
                                    destination.nearbyFood &&
                                    destination.nearbyFood.length > 0
                                "
                            >
                                <div class="activities-box-area">
                                    <h1 class="text-2xl">
                                        <strong>Tempat Makan Terdekat</strong>
                                    </h1>
                                    <ul class="nearby-list mt-3">
                                        <li
                                            v-for="(
                                                food, index
                                            ) in destination.nearbyFood"
                                            :key="`food-${index}`"
                                        >
                                            <i
                                                class="fa-solid fa-utensils mr-2"
                                            ></i>
                                            {{ food }}
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <!-- Tempat Oleh-oleh Terdekat -->
                            <div
                                class="activities-box-wrap"
                                v-if="
                                    destination.nearbySouvenirs &&
                                    destination.nearbySouvenirs.length > 0
                                "
                            >
                                <div class="activities-box-area">
                                    <h1 class="text-2xl">
                                        <strong
                                            >Tempat Oleh Oleh Terdekat</strong
                                        >
                                    </h1>
                                    <ul class="nearby-list mt-3">
                                        <li
                                            v-for="(
                                                souvenir, index
                                            ) in destination.nearbySouvenirs"
                                            :key="`souvenir-${index}`"
                                        >
                                            <i
                                                class="fa-solid fa-gift mr-2"
                                            ></i>
                                            {{ souvenir }}
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <br />
                            <br />

                            <!-- Map Section -->
                            <div
                                class="map-area"
                                v-if="destination.coordinates"
                            >
                                <h3 class="text-2xl"><b>View in Map</b></h3>
                                <div class="google-map">
                                    <div
                                        ref="mapContainer"
                                        class="h-96 w-full rounded-lg"
                                    ></div>
                                </div>
                            </div>

                            <!-- Client Reviews -->
                            <div class="cliect-review-area">
                                <h3>Client Review ({{ totalReviews }})</h3>

                                <!-- Success Message -->
                                <div
                                    v-if="showSuccessMessage"
                                    class="alert alert-success mb-4"
                                >
                                    <i
                                        class="fa-solid fa-check-circle mr-2"
                                    ></i>
                                    Review Anda berhasil ditambahkan!
                                </div>

                                <ul class="review-items">
                                    <!-- Dynamic Reviews (user submitted) -->
                                    <li
                                        v-for="review in userReviews"
                                        :key="review.id"
                                    >
                                        <div class="thumb">
                                            <img
                                                src="/assets/img/user.png"
                                                alt="img"
                                            />
                                        </div>
                                        <div class="content">
                                            <h5>{{ review.name }}</h5>
                                            <p>{{ review.comment }}</p>
                                            <small class="text-muted">{{
                                                formatDate(review.date)
                                            }}</small>
                                        </div>
                                    </li>

                                    <!-- Static Reviews -->
                                    <li>
                                        <div class="thumb">
                                            <img
                                                src="/assets/img/user.png"
                                                alt="img"
                                            />
                                        </div>
                                        <div class="content">
                                            <div class="star">
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                            </div>
                                            <h5>Budi Santoso</h5>
                                            <p>
                                                Tempat yang sangat indah dan
                                                menakjubkan! Pemandangannya
                                                benar-benar luar biasa. Sangat
                                                recommended untuk dikunjungi
                                                bersama keluarga.
                                            </p>
                                            <small class="text-muted"
                                                >15 Mei 2025, 14:30</small
                                            >
                                        </div>
                                    </li>
                                    <li>
                                        <div class="thumb">
                                            <img
                                                src="/assets/img/user.png"
                                                alt="img"
                                            />
                                        </div>
                                        <div class="content">
                                            <div class="star">
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                            </div>
                                            <h5>Sari Dewi</h5>
                                            <p>
                                                Pengalaman yang tak terlupakan!
                                                Staf sangat ramah dan pelayanan
                                                memuaskan. Akan datang lagi di
                                                lain waktu.
                                            </p>
                                            <small class="text-muted"
                                                >8 Mei 2025, 10:15</small
                                            >
                                        </div>
                                    </li>
                                    <li>
                                        <div class="thumb">
                                            <img
                                                src="/assets/img/user.png"
                                                alt="img"
                                            />
                                        </div>
                                        <div class="content">
                                            <div class="star">
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                            </div>
                                            <h5>Ahmad Rizki</h5>
                                            <p>
                                                Destinasi wisata yang sempurna
                                                untuk healing dan refreshing.
                                                Udara segar dan pemandangan yang
                                                memukau mata.
                                            </p>
                                            <small class="text-muted"
                                                >2 Mei 2025, 16:45</small
                                            >
                                        </div>
                                    </li>
                                </ul>
                            </div>

                            <!-- Review Form -->
                            <div class="client-ratting-items">
                                <h4 class="mb-4">Tulis Review Anda</h4>

                                <!-- Error Messages -->
                                <div
                                    v-if="formErrors.length > 0"
                                    class="alert alert-danger mb-4"
                                >
                                    <ul class="mb-0">
                                        <li
                                            v-for="error in formErrors"
                                            :key="error"
                                        >
                                            {{ error }}
                                        </li>
                                    </ul>
                                </div>

                                <form
                                    @submit.prevent="submitReview"
                                    class="review-form"
                                >
                                    <div class="row g-4">
                                        <!-- Name Input -->
                                        <div class="col-lg-6">
                                            <div class="form-clt">
                                                <input
                                                    type="text"
                                                    v-model="reviewForm.name"
                                                    placeholder="Nama lengkap"
                                                    class="form-control"
                                                    :class="{
                                                        'is-invalid':
                                                            formErrors.includes(
                                                                'Nama harus diisi',
                                                            ),
                                                    }"
                                                />
                                            </div>
                                        </div>

                                        <!-- Email Input -->
                                        <div class="col-lg-6">
                                            <div class="form-clt">
                                                <input
                                                    type="email"
                                                    v-model="reviewForm.email"
                                                    placeholder="Email (opsional)"
                                                    class="form-control"
                                                />
                                            </div>
                                        </div>

                                        <!-- Comment -->
                                        <div class="col-lg-12">
                                            <div class="form-clt">
                                                <textarea
                                                    v-model="reviewForm.comment"
                                                    placeholder="Tulis review Anda..."
                                                    rows="4"
                                                    class="form-control"
                                                    :class="{
                                                        'is-invalid':
                                                            formErrors.includes(
                                                                'Review harus diisi',
                                                            ),
                                                    }"
                                                ></textarea>
                                            </div>
                                        </div>

                                        <!-- Submit Button -->
                                        <div class="col-lg-6">
                                            <button
                                                type="submit"
                                                class="theme-btn text-center"
                                                :disabled="isSubmitting"
                                            >
                                                <span v-if="isSubmitting">
                                                    <i
                                                        class="fa-solid fa-spinner fa-spin mr-2"
                                                    ></i>
                                                    Mengirim...
                                                </span>
                                                <span v-else>
                                                    Submit Review
                                                    <i
                                                        class="fa-sharp fa-regular fa-arrow-right ml-2"
                                                    ></i>
                                                </span>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </template>

                    <!-- Fallback ketika destination tidak ada -->
                    <template v-else>
                        <div class="col-12 py-5 text-center">
                            <div class="alert alert-warning">
                                <h4>Data destinasi tidak tersedia</h4>
                                <p>
                                    Mohon periksa kembali URL atau coba refresh
                                    halaman.
                                </p>
                            </div>
                        </div>
                    </template>
                </div>
            </div>
        </div>
    </section>
</template>

<script setup>
import { onMounted, ref, watch, computed } from 'vue';
import L from 'leaflet';
import 'leaflet/dist/leaflet.css';

const props = defineProps({
    destination: {
        type: Object,
        required: true,
        validator(value) {
            if (!value) return false;
            const requiredFields = [
                'title',
                'location',
                'rating',
                'price',
                'description',
            ];
            return requiredFields.every((field) => value.hasOwnProperty(field));
        },
    },
});

// Emit events to parent component
const emit = defineEmits(['review-submitted']);

// Reactive data
const map = ref(null);
const mapContainer = ref(null);
const userReviews = ref([]);
const isSubmitting = ref(false);
const showSuccessMessage = ref(false);
const formErrors = ref([]);
const hoverRating = ref(0);

// Review form data
const reviewForm = ref({
    name: '',
    email: '',
    comment: '',
});

// Computed properties
const totalReviews = computed(() => {
    return userReviews.value.length + 3; // 3 static reviews
});

// Custom marker icon
const customIcon = L.icon({
    iconUrl:
        'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-blue.png',
    iconSize: [25, 41],
    iconAnchor: [12, 41],
    popupAnchor: [1, -34],
});

// Methods
const initializeMap = () => {
    if (
        !props.destination ||
        !props.destination.coordinates ||
        !mapContainer.value
    ) {
        return;
    }

    try {
        if (map.value) {
            map.value.remove();
            map.value = null;
        }

        map.value = L.map(mapContainer.value, {
            zoomControl: true,
            attributionControl: false,
        }).setView(props.destination.coordinates, 13);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
        }).addTo(map.value);

        const marker = L.marker(props.destination.coordinates, {
            icon: customIcon,
        }).addTo(map.value);

        marker
            .bindPopup(
                `
                <div class="leaflet-popup-content">
                    <h4 class="font-bold text-lg">${props.destination.title}</h4>
                    <p class="text-sm">${props.destination.location}</p>
                </div>
            `,
            )
            .openPopup();

        L.circle(props.destination.coordinates, {
            color: '#3388ff',
            fillColor: '#3388ff',
            fillOpacity: 0.2,
            radius: 500,
        }).addTo(map.value);
    } catch (error) {
        console.error('Error initializing map:', error);
    }
};

const setRating = (rating) => {
    // Function removed - no longer needed
};

const getRatingText = (rating) => {
    // Function removed - no longer needed
};

const validateForm = () => {
    formErrors.value = [];

    if (!reviewForm.value.name.trim()) {
        formErrors.value.push('Nama harus diisi');
    }

    if (!reviewForm.value.comment.trim()) {
        formErrors.value.push('Review harus diisi');
    }

    if (reviewForm.value.comment.trim().length < 10) {
        formErrors.value.push('Review minimal 10 karakter');
    }

    return formErrors.value.length === 0;
};

const submitReview = async () => {
    if (!validateForm()) {
        return;
    }

    isSubmitting.value = true;

    try {
        // Simulate API call delay
        await new Promise((resolve) => setTimeout(resolve, 1000));

        // Create new review object
        const newReview = {
            id: Date.now(),
            name: reviewForm.value.name.trim(),
            email: reviewForm.value.email.trim(),
            comment: reviewForm.value.comment.trim(),
            date: new Date(),
        };

        // Add to reviews list
        userReviews.value.unshift(newReview);

        // Reset form
        reviewForm.value = {
            name: '',
            email: '',
            comment: '',
        };

        // Show success message
        showSuccessMessage.value = true;
        setTimeout(() => {
            showSuccessMessage.value = false;
        }, 5000);

        // Emit event to parent component
        emit('review-submitted', newReview);

        // Scroll to reviews section
        document.querySelector('.cliect-review-area')?.scrollIntoView({
            behavior: 'smooth',
        });
    } catch (error) {
        console.error('Error submitting review:', error);
        formErrors.value = [
            'Terjadi kesalahan saat mengirim review. Silakan coba lagi.',
        ];
    } finally {
        isSubmitting.value = false;
    }
};

const formatDate = (date) => {
    return new Intl.DateTimeFormat('id-ID', {
        year: 'numeric',
        month: 'long',
        day: 'numeric',
        hour: '2-digit',
        minute: '2-digit',
    }).format(new Date(date));
};

// Watch for destination changes
watch(
    () => props.destination,
    (newDestination) => {
        if (newDestination && newDestination.coordinates) {
            setTimeout(() => {
                initializeMap();
            }, 100);
        }
    },
    { immediate: false },
);

onMounted(() => {
    setTimeout(() => {
        initializeMap();
    }, 100);
});
</script>

<style scoped>
.leaflet-control-attribution {
    display: none !important;
}

.leaflet-popup-content-wrapper {
    border-radius: 8px !important;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2) !important;
}

.leaflet-popup-content {
    margin: 8px 12px !important;
}

.location-rating {
    display: flex;
    align-items: center;
    gap: 20px;
    color: #666;
    font-size: 16px;
}

.location-rating i {
    margin-right: 5px;
    color: #113d48;
}

.nearby-list {
    list-style: none;
    padding: 0;
}

.nearby-list li {
    padding: 8px 0;
    border-bottom: 1px solid #eee;
    color: #666;
}

.nearby-list li:last-child {
    border-bottom: none;
}

.price-section {
    background: #f8f9fa;
    padding: 20px;
    border-radius: 8px;
    border-left: 4px solid #113d48;
}

.alert {
    padding: 20px;
    margin: 20px 0;
    border: 1px solid transparent;
    border-radius: 4px;
}

.alert-warning {
    color: #856404;
    background-color: #fff3cd;
    border-color: #ffeaa7;
}

.alert-success {
    color: #155724;
    background-color: #d4edda;
    border-color: #c3e6cb;
}

.alert-danger {
    color: #721c24;
    background-color: #f8d7da;
    border-color: #f5c6cb;
}

.alert ul {
    list-style: none;
    padding: 0;
}

.form-control {
    width: 100%;
    padding: 12px;
    border: 1px solid #ddd;
    border-radius: 4px;
    font-size: 14px;
    transition: border-color 0.3s;
}

.form-control:focus {
    outline: none;
    border-color: #113d48;
    box-shadow: 0 0 0 2px rgba(17, 61, 72, 0.1);
}

.form-control.is-invalid {
    border-color: #dc3545;
}

.star-rating {
    display: flex;
    align-items: center;
    gap: 5px;
    margin: 10px 0;
}

.star-input {
    font-size: 20px;
    color: #ddd;
    cursor: pointer;
    transition: color 0.2s;
}

.star-input:hover,
.star-input.active {
    color: #ffd700;
}

.rating-text {
    font-size: 14px;
    color: #666;
    font-weight: 500;
}

.review-form {
    background: #f8f9fa;
    padding: 25px;
    border-radius: 8px;
    border: 1px solid #e9ecef;
}

.theme-btn {
    background: #113d48;
    color: white;
    padding: 12px 24px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 16px;
    transition: background-color 0.3s;
}

.theme-btn:hover:not(:disabled) {
    background: #0d2d36;
}

.theme-btn:disabled {
    background: #6c757d;
    cursor: not-allowed;
}

.review-items li {
    border-bottom: 1px solid #eee;
    padding: 20px 0;
}

.review-items li:last-child {
    border-bottom: none;
}

.star {
    color: #ffd700;
}

.star i:not(.active) {
    color: #ddd;
}

.text-muted {
    color: #6c757d !important;
    font-size: 12px;
}
</style>
