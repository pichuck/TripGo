<template>
    <MainLayout @open-login-modal="showLoginModal = true">
        <HeaderBar />
        <section class="hero-section-2">
            <div
                class="hero-2 bg-cover"
                style="background-image: url(/assets/img/banner.jpg)"
            >
                <div class="custom-container-3 container">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="hero-content">
                                <div class="sub-title wow fadeInUp">
                                    <h2 style="font-size: 40px; color: white">
                                        <strong
                                            >Dapatkan pengalaman tak terlupakan
                                            bersama kami
                                        </strong>
                                    </h2>
                                </div>
                                <h2
                                    class="wow fadeInUp"
                                    data-wow-delay=".3s"
                                    style="font-size: 25px; color: white"
                                >
                                    Temukan Destinasi Tersembunyi di Pulau Jawa
                                    dengan TripGo
                                </h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <section class="px-4 py-16">
                <div class="mx-auto max-w-7xl">
                    <!-- Heading -->
                    <div class="mb-8 text-center md:mb-12">
                        <h2
                            class="mb-3 text-3xl font-bold text-gray-900 md:mb-4 md:text-4xl lg:text-5xl"
                        >
                            Jelajahi Pulau Jawa Yang Sangat Menakjubkan
                        </h2>
                        <p class="text-base text-gray-600 md:text-lg">
                            Direkomendasikan oleh AI, Dipilih oleh Petualang
                            Sejati
                        </p>
                    </div>

                    <!-- Grid Container -->
                    <div
                        class="mx-auto grid grid-cols-2 gap-3 md:grid-cols-3 md:gap-4 lg:grid-cols-6 lg:gap-5"
                    >
                        <!-- Card Items -->
                        <Link
                            v-for="region in regions"
                            :key="region.slug"
                            :href="`/tour/${region.slug}`"
                            class="group relative cursor-pointer overflow-hidden rounded-lg bg-white shadow-md transition-all hover:shadow-lg md:rounded-xl"
                        >
                            <div class="aspect-video overflow-hidden">
                                <img
                                    :src="`/assets/img/bnr_${region.image}.jpg`"
                                    :alt="region.name"
                                    class="h-full w-full object-cover transition-transform duration-300 group-hover:scale-105"
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
                        </Link>
                    </div>
                </div>
            </section>

            <!-- Cta Section Start -->
            <CtaLokasi
                v-for="(lokasi, index) in ctaLokasi"
                :key="index"
                :location="lokasi.location"
                :street="lokasi.street"
                :range="lokasi.range"
                :recomendation="lokasi.recomendation"
            />

            <AboutSection />

            <br />
            <br />
            <br />

            <!-- INI BAGIAN POPULER TEMPAT WISATA -->
            <section class="popular-destination-section section-padding pt-0">
                <div class="car-shape float-bob-x">
                    <img src="assets/img/destination/car.png" alt="img" />
                </div>
                <div class="container">
                    <div
                        class="section-title-area mb-8 flex items-center justify-between"
                    >
                        <div class="section-title space-y-2">
                            <h3
                                class="wow fadeInUp mb-2 text-3xl font-bold uppercase tracking-wider text-gray-700"
                            >
                                <strong>
                                    Rekomendasi Tempat Wisata Populer
                                </strong>
                            </h3>
                            <span
                                class="wow fadeInUp block text-xl text-gray-900"
                                data-wow-delay=".3s"
                            >
                                Tempat wisata popular kami rekomendasikan pada
                                anda
                            </span>
                        </div>
                    </div>
                    <div class="row">
                        <div
                            v-for="(destination, index) in destinations"
                            :key="destination.id || index"
                            class="col-xl-3 col-lg-6 col-md-6 wow fadeInUp"
                            :data-wow-delay="`0.${index + 2}s`"
                        >
                            <CardDestination
                                :id="destination.id"
                                :slug="destination.slug"
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

            <!-- SECTION KONTRIBUSI USER -->
            <section class="py-16">
                <div class="container mx-auto px-4">
                    <div class="mx-auto max-w-4xl text-center">
                        <div class="mb-8">
                            <h2
                                class="wow fadeInUp mb-4 text-3xl font-bold text-gray-800 md:text-4xl"
                            >
                                <strong
                                    >Bagikan Tempat Wisata Favoritmu!</strong
                                >
                            </h2>
                            <p
                                class="wow fadeInUp mb-6 text-lg text-gray-600"
                                data-wow-delay=".2s"
                            >
                                Punya rekomendasi tempat wisata yang menakjubkan
                                di Pulau Jawa? Bantu sesama traveler dengan
                                berbagi pengalaman dan destinasi tersembunyimu!
                            </p>
                        </div>

                        <div class="mb-8 grid gap-6 md:grid-cols-3">
                            <div
                                class="wow fadeInUp text-center"
                                data-wow-delay=".3s"
                            >
                                <div
                                    class="mx-auto mb-4 flex h-16 w-16 items-center justify-center rounded-full bg-blue-500"
                                >
                                    <svg
                                        class="h-8 w-8 text-white"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"
                                        ></path>
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"
                                        ></path>
                                    </svg>
                                </div>
                                <h3
                                    class="mb-2 text-xl font-semibold text-gray-800"
                                >
                                    Lokasi Unik
                                </h3>
                                <p class="text-gray-600">
                                    Ceritakan tentang tempat tersembunyi yang
                                    belum banyak orang tahu
                                </p>
                            </div>

                            <div
                                class="wow fadeInUp text-center"
                                data-wow-delay=".4s"
                            >
                                <div
                                    class="mx-auto mb-4 flex h-16 w-16 items-center justify-center rounded-full bg-green-500"
                                >
                                    <svg
                                        class="h-8 w-8 text-white"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"
                                        ></path>
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"
                                        ></path>
                                    </svg>
                                </div>
                                <h3
                                    class="mb-2 text-xl font-semibold text-gray-800"
                                >
                                    Foto & Cerita
                                </h3>
                                <p class="text-gray-600">
                                    Bagikan foto dan pengalaman seru selama
                                    berkunjung ke sana
                                </p>
                            </div>

                            <div
                                class="wow fadeInUp text-center"
                                data-wow-delay=".5s"
                            >
                                <div
                                    class="mx-auto mb-4 flex h-16 w-16 items-center justify-center rounded-full bg-purple-500"
                                >
                                    <svg
                                        class="h-8 w-8 text-white"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"
                                        ></path>
                                    </svg>
                                </div>
                                <h3
                                    class="mb-2 text-xl font-semibold text-gray-800"
                                >
                                    Bantu Traveler
                                </h3>
                                <p class="text-gray-600">
                                    Kontribusimu akan membantu ribuan traveler
                                    menemukan destinasi baru
                                </p>
                            </div>
                        </div>

                        <div class="wow fadeInUp" data-wow-delay=".6s">
                            <Link
                                href="/kontribusi/tambah-wisata"
                                class="inline-flex transform items-center rounded-full bg-gradient-to-r from-blue-600 to-indigo-600 px-8 py-4 font-semibold text-white shadow-lg transition-all duration-300 hover:scale-105 hover:from-blue-700 hover:to-indigo-700 hover:shadow-xl"
                            >
                                <svg
                                    class="mr-2 h-5 w-5"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M12 6v6m0 0v6m0-6h6m-6 0H6"
                                    ></path>
                                </svg>
                                Tambahkan Tempat Wisata
                            </Link>
                        </div>

                        <p
                            class="wow fadeInUp mt-4 text-sm text-gray-500"
                            data-wow-delay=".7s"
                        >
                            Setiap kontribusi akan diverifikasi terlebih dahulu
                            untuk memastikan kualitas informasi
                        </p>
                    </div>
                </div>
            </section>
        </section>
    </MainLayout>
</template>

<script setup>
import { Link } from '@inertiajs/vue3';
import MainLayout from '../Layouts/MainLayout.vue';
import CardDestination from '../Components/cardDestination.vue';
import NewsCard from '../Components/NewsCard.vue';
import AboutSection from '../Components/AboutSection.vue';
import CtaLokasi from '../Components/CtaLokasi.vue';
import HeaderBar from '@/Components/HeaderBar.vue';
// Import destinations dari file terpisah
import destinationsData from '../../data/destinations.js';

const destinations = destinationsData.slice(0, 8); // Ambil 8 destinasi pertama

const newsItems = [
    {
        type: 'image',
        image: 'assets/img/news/01.jpg',
        withPopup: true,
    },
    {
        type: 'content',
        date: 'December 02, 2024',
        tag: 'New York City',
        title: 'Including Animation In Your Design System',
    },
    {
        type: 'image',
        image: 'assets/img/news/02.jpg',
    },
    {
        type: 'content',
        date: 'December 02, 2024',
        tag: 'New York City',
        title: 'Including Animation In Your Design System',
    },
    {
        type: 'image',
        image: 'assets/img/news/02.jpg',
    },
    {
        type: 'content',
        date: 'December 02, 2024',
        tag: 'New York City',
        title: 'Including Animation In Your Design System',
    },
];

const ctaLokasi = [
    {
        location: 'Kota Jakarta Utara',
        street: 'Jl. Pantai Indah Kapuk No. 88',
        range: '500m dari Pantai',
        recomendation: '25+ Kuliner Terdekat',
    },
];

const regions = [
    {
        name: 'Banten',
        slug: 'banten',
        image: 'banten',
    },
    {
        name: 'Jakarta',
        slug: 'jakarta',
        image: 'jakarta',
    },
    {
        name: 'Jawa Barat',
        slug: 'jawa-barat',
        image: 'JawaBarat',
    },
    {
        name: 'Jawa Tengah',
        slug: 'jawa-tengah',
        image: 'JawaTengah',
    },
    {
        name: 'Yogyakarta',
        slug: 'yogyakarta',
        image: 'Yogyakarta',
    },
    {
        name: 'Jawa Timur',
        slug: 'jawa-timur',
        image: 'JawaTimur',
    },
];
</script>
