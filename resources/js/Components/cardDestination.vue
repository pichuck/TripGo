<template>
    <div class="destination-card-items">
        <div class="destination-image">
            <img :src="image" alt="destination" />
        </div>
        <div class="destination-content">
            <ul class="meta">
                <li>
                    <i class="fa-thin fa-location-dot"></i>
                    {{ location }}
                </li>
                <li class="rating">
                    <div class="star">
                        <i class="fa-solid fa-star"></i>
                    </div>
                    <p style="color: #113d48">{{ rating }}</p>
                </li>
            </ul>
            <h5>
                {{ title }}
            </h5>
            <div class="price">
                <h6><span>mulai dari </span>IDR {{ price }}</h6>
                <Link
                    :href="route('detail-wisata')"
                    class="theme-btn style-2"
                    style="color: #113d48"
                >
                    Lihat Detail
                    <i class="fa-sharp fa-regular fa-arrow-right"></i>
                </Link>
            </div>
        </div>
    </div>
</template>

<script setup>
import { Link } from '@inertiajs/vue3';

defineProps({
    id: Number,
    image: String,
    location: String,
    rating: String,
    title: String,
    price: String,
});
</script>
