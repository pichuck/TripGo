<template>
    <div class="col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".5s">
        <div class="cta-items style-2">
            <div class="cta-text">
                <h2>PREDIKSI CUACA HARI INI</h2>
                <p>
                    📍 {{ location }}<br />
                    🔄 {{ lastUpdate }}<br />
                    🌡️ {{ temperature }} | 💧 {{ humidity }}<br />
                    🌬️ {{ windSpeed }} | ☔ {{ rainfall }}
                </p>
            </div>
            <a
                href="tour-details.html"
                class="theme-btn"
                style="color: #0097b2"
            >
                LIHAT PREDIKSI 7 HARI KEDEPAN
                <i class="fa-sharp fa-regular fa-arrow-right"></i>
            </a>
            <div class="cta-image">
                <img
                    src="assets/img/cuaca-bnr.png"
                    class="bnr"
                    alt="ikon-cuaca"
                />
            </div>
        </div>
    </div>
</template>

<script setup>
defineProps({
    location: String,
    lastUpdate: String,
    temperature: String,
    humidity: String,
    windSpeed: String,
    rainfall: String,
});
</script>
