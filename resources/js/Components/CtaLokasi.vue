<template>
    <div class="col-lg-6 col-md-6 wow fadeInUp wow" data-wow-delay=".3s">
        <div class="cta-items">
            <div class="cta-text">
                <h2>LOKASI KAMU</h2>

                <p>
                    🏙️ {{ location }}
                    <br />
                    🏷️{{ street }}
                    <br />
                    📍{{ range }}
                    <br />
                    🚶{{ recomendation }} <br />
                </p>
            </div>
            <Link
                :href="route('maps')"
                class="theme-btn"
                style="color: #0097b2"
            >
                LIHAT TEMPAT WISATA DISEKITAR
                <i class="fa-sharp fa-regular fa-arrow-right"></i>
            </Link>
            <div class="cta-image">
                <img
                    src="assets/img/lokasi-bnr.png"
                    alt="peta-lokasi"
                    class="bnr"
                />
            </div>
        </div>
    </div>
</template>

<script setup>
import { Link } from '@inertiajs/vue3'; // Tambahkan import ini

defineProps({
    location: String,
    street: String,
    range: String,
    recomendation: String,
});
</script>
