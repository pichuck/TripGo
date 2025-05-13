<template>
    <section
        class="breadcrumb-wrapper fix bg-cover"
        style="background-image: url(assets/img/breadcrumb/breadcrumb.jpg)"
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

    <section class="tour-section section-padding fix">
        <div class="container">
            <div class="row g-4">
                <div
                    v-for="(destination, index) in filteredDestinations"
                    :key="index"
                    class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp"
                    :data-wow-delay="`0.${index + 2}s`"
                >
                    <cardDestination
                        :image="destination.image"
                        :location="destination.location"
                        :rating="destination.rating"
                        :title="destination.title"
                        :price="destination.price"
                    />
                </div>
            </div>
        </div>
    </section>
</template>

<script setup>
import { defineProps, computed } from 'vue';
import cardDestination from '../../Components/cardDestination.vue';

const props = defineProps({
    region: String,
});

// Contoh data - sesuaikan dengan data sebenarnya
const allDestinations = [
    {
        region: 'jakarta',
        image: 'assets/img/destination/06.jpg',
        location: 'Jakarta, Indonesia',
        rating: '4.8',
        title: 'Monumen Nasional',
        price: '150000',
    },
    // Tambahkan data destinasi lainnya...
];

const filteredDestinations = computed(() =>
    allDestinations.filter(
        (dest) => dest.region.toLowerCase() === props.region.toLowerCase(),
    ),
);
</script>
