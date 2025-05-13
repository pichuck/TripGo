<template>
    <section class="about-section section-padding fix">
        <div class="container">
            <div class="about-wrapper-2">
                <div class="row g-4">
                    <div class="col-lg-6">
                        <div class="about-image">
                            <img
                                src="\assets\img\bnr_abt.png"
                                alt="Sistem AI"
                                class="wow img-custom-anim-left"
                            />
                            <div class="shape-image float-bob-y">
                                <img
                                    src="assets/img/about/04.png"
                                    alt="Ramalan Cuaca"
                                />
                            </div>
                            <div class="group-image float-bob-x">
                                <img
                                    src="assets\img\tripgo_ai.png"
                                    alt="Travelers"
                                />
                            </div>
                            <div class="about-image-2">
                                <img
                                    src="\assets\img\Mockup.png"
                                    alt="Antarmuka Rekomendasi"
                                    class="wow img-custom-anim-top"
                                    data-wow-duration="1.5s"
                                    data-wow-delay="0.3s"
                                />
                                <div class="plane-shape">
                                    <img
                                        src="assets/img/about/plane.png"
                                        alt="AI Technology"
                                    />
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 text-xl">
                        <div class="about-content">
                            <div class="section-title">
                                <h3
                                    class="wow fadeInUp mb-2 text-3xl font-bold uppercase tracking-wider text-gray-700"
                                >
                                    <strong> About Us </strong>
                                </h3>
                                <h2 class="wow fadeInUp" data-wow-delay=".3s">
                                    Rekomendasi berbasis Kecerdasan Buatan Untuk
                                    Petualangan Terbaikmu
                                </h2>
                            </div>

                            <p class="wow fadeInUp" data-wow-delay=".5s">
                                Sistem kami menggunakan kecerdasan buatan untuk
                                menganalisis preferensi Anda dan kondisi terkini
                                untuk merekomendasikan destinasi wisata ideal.
                                Dengan mempertimbangkan:
                            </p>

                            <div
                                class="about-items wow fadeInUp"
                                data-wow-delay=".3s"
                            >
                                <div class="about-icon-items">
                                    <div class="icon">
                                        <img
                                            src="/assets/img/ai-logo.svg"
                                            style="height: 50px"
                                            alt="AI"
                                        />
                                    </div>
                                    <div class="content">
                                        <h5>
                                            Rekomendasi Personal<br />Berdasarkan
                                            input
                                        </h5>
                                    </div>
                                </div>
                                <div class="text">
                                    <p>
                                        Analisis minat, budget, durasi trip,<br />
                                        dan riwayat kunjungan sebelumnya
                                    </p>
                                </div>
                            </div>

                            <div
                                class="about-items wow fadeInUp"
                                data-wow-delay=".5s"
                            >
                                <div class="about-icon-items">
                                    <div class="icon">
                                        <img
                                            src="/assets/img/cuaca-logo.svg"
                                            style="height: 50px"
                                            alt="Cuaca"
                                        />
                                    </div>
                                    <div class="content">
                                        <h5>Prediksi Cuaca<br />Cerdas</h5>
                                    </div>
                                </div>
                                <div class="text">
                                    <p>
                                        Ramalan cuaca 7 hari kedepan dan<br />
                                        kondisi real-time di lokasi tujuan
                                    </p>
                                </div>
                            </div>

                            <a
                                href="/recommendation"
                                class="inline-flex items-center rounded-lg bg-[#113d48] px-6 py-3 text-white transition-all duration-300 hover:-translate-y-1 hover:bg-[#0097b2] hover:shadow-lg"
                                data-wow-delay=".9s"
                            >
                                Coba Sekarang
                                <i
                                    class="fa-sharp fa-regular fa-arrow-right ml-2"
                                ></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
export default {
    name: 'AboutSystem',
};
</script>
