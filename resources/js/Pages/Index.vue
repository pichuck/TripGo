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
            <section class="cta-section section-padding">
                <div class="container">
                    <div class="row g-4">
                        <CtaLokasi
                            v-for="(lokasi, index) in ctaLokasi"
                            :key="index"
                            :location="lokasi.location"
                            :street="lokasi.street"
                            :range="lokasi.range"
                            :recomendation="lokasi.recomendation"
                        />
                        <CtaCuaca
                            v-for="(cuaca, index) in ctacuaca"
                            :key="'cuaca-' + index"
                            :location="cuaca.location"
                            :lastUpdate="cuaca.lastUpdate"
                            :temperature="cuaca.temperature"
                            :humidity="cuaca.humidity"
                            :windSpeed="cuaca.windSpeed"
                            :rainfall="cuaca.rainfall"
                        />
                    </div>
                </div>
            </section>

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
                        <a
                            href="tour-details.html"
                            class="inline-flex items-center rounded-lg bg-[#113d48] px-6 py-3 text-white transition-all duration-300 hover:-translate-y-1 hover:bg-[#0097b2] hover:shadow-lg"
                            data-wow-delay=".5s"
                        >
                            Lihat Semua
                            <i
                                class="fa-sharp fa-regular fa-arrow-right ml-2"
                            ></i>
                        </a>
                    </div>
                    <div class="row">
                        <div
                            v-for="(destination, index) in destinations"
                            :key="index"
                            class="col-xl-3 col-lg-6 col-md-6 wow fadeInUp"
                            :data-wow-delay="`0.${index + 2}s`"
                        >
                            <CardDestination
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

            <!-- INI BAGIAN ARTIKEL -->
            <section class="news-section section-padding fix">
                <div class="container">
                    <div class="section-title space-y-3 text-center">
                        <h3
                            class="wow fadeInUp mb-2 text-3xl font-bold uppercase tracking-wider text-gray-700"
                        >
                            News & Updates
                        </h3>
                        <span
                            class="wow fadeInUp block text-4xl font-semibold leading-tight text-gray-900"
                            data-wow-delay=".2s"
                        >
                            Our Latest News & Articles
                        </span>
                    </div>
                    <div class="row">
                        <div
                            v-for="(news, index) in newsItems"
                            :key="index"
                            class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp"
                            :data-wow-delay="`0.${(index % 3) * 2 + 3}s`"
                        >
                            <NewsCard
                                :type="news.type"
                                :image="news.image"
                                :date="news.date"
                                :tag="news.tag"
                                :title="news.title"
                                :with-popup="news.withPopup"
                            />
                        </div>
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
import CtaCuaca from '../Components/CtaCuaca.vue';
import HeaderBar from '@/Components/HeaderBar.vue';

const destinations = [
    {
        image: 'assets/img/destination/01.jpg',
        location: 'Indonesia',
        rating: '4.7',
        title: 'Brooklyn Beach Resort Tour',
        price: '120000',
    },
    {
        image: 'assets/img/destination/02.jpg',
        location: 'Indonesia',
        rating: '4.7',
        title: 'Pak Chumphon Town Tour',
        price: '120000',
    },
    {
        image: 'assets/img/destination/03.jpg',
        location: 'Indonesia',
        rating: '4.7',
        title: 'Java & Bali One Life Adventure',
        price: '120000',
    },
    {
        image: 'assets/img/destination/04.jpg',
        location: 'Indonesia',
        rating: '4.7',
        title: 'Places To Travel In November',
        price: '120000',
    },
    {
        image: 'assets/img/destination/05.jpg',
        location: 'Indonesia',
        rating: '4.7',
        title: 'Brooklyn Beach Resort Tour',
        price: '120000',
    },
    {
        image: 'assets/img/destination/06.jpg',
        location: 'Indonesia',
        rating: '4.7',
        title: 'Pak Chumphon Town Tour',
        price: '120000',
    },
    {
        image: 'assets/img/destination/07.jpg',
        location: 'Indonesia',
        rating: '4.7',
        title: 'Brooklyn Beach Resort Tour',
        price: '120000',
    },
    {
        image: 'assets/img/destination/08.jpg',
        location: 'Indonesia',
        rating: '4.7',
        title: 'Java & Bali One Life Adventure',
        price: '120000',
    },
];

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

const ctacuaca = [
    {
        location: 'Bandung',
        lastUpdate:
            'Update Terakhir: ' + new Date().toLocaleTimeString('id-ID'),
        temperature: '28°C',
        humidity: 'Kelembapan 70%',
        windSpeed: 'Angin 8 km/jam',
        rainfall: 'Curah Hujan 2 mm',
        image: 'assets/img/cuaca-bandung.png',
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
