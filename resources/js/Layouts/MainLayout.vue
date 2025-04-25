<template>
    <div>
        <Head :pageTitle="pageTitle" />
        <Navbar />
        <main>
            <slot></slot>
        </main>
        <Footer />
    </div>
</template>

<script setup>
// Mengimpor komponen Vue
import Head from '../Components/Head.vue';
import Navbar from '../Components/Navbar.vue';
import Footer from '../Components/Footer.vue';

import '../../../public/assets/js/jquery-3.7.1.min.js';
// import 'public/assets/js/jquery-3.7.1.min.js';
// import 'public/assets/js/viewport.jquery.js';
// import 'public/assets/js/bootstrap.bundle.min.js';
// import 'public/assets/js/jquery.nice-select.min.js';
// import 'public/assets/js/jquery.waypoints.js';
// import 'public/assets/js/jquery.counterup.min.js';
// import 'public/assets/js/swiper-bundle.min.js';
// import 'public/assets/js/jquery.meanmenu.min.js';
// import 'public/assets/js/bootstrap-datepicker.js';
// import 'public/assets/js/jquery.magnific-popup.min.js';
// import 'public/assets/js/wow.min.js';
// import 'public/assets/js/main.js';

// Variabel halaman
const pageTitle = 'TripGo - Beranda';

// Jika perlu, Anda bisa memindahkan semua skrip JavaScript eksternal ke dalam file public dan tidak mengimpor di sini.
</script>

<!-- Semua skrip eksternal yang sebelumnya berada di bawah <script src="..."> -->

<style scoped>
main {
    padding: 20px;
}
</style>
