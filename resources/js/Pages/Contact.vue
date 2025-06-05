<template>
    <MainLayout @open-login-modal="showLoginModal = true">
        <!-- breadcrumb-wrappe-Section Start -->
        <section class="breadcrumb-wrapper fix bg-cover">
            <div
                class="container"
                :style="{
                    backgroundImage: 'url(/assets/img/contact-bnr.jpg)',
                    backgroundSize: 'cover',
                    backgroundPosition: 'center',
                    backgroundRepeat: 'no-repeat',
                }"
            >
                <div class="row">
                    <div class="page-heading">
                        <h2>Contact Us</h2>
                        <ul class="breadcrumb-list">
                            <li>
                                <a href="index.html">Home</a>
                            </li>
                            <li><i class="fa-solid fa-chevrons-right"></i></li>
                            <li>Contact Us</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>

        <!-- Contact-us Section Start -->
        <section class="contact-us-section fix section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-xl-4 col-lg-6 col-md-6">
                        <div class="contact-us-main">
                            <div class="contact-box-items">
                                <div class="icon">
                                    <img
                                        src="assets/img/icon/18.svg"
                                        alt="img"
                                    />
                                </div>
                                <div class="content">
                                    <h3>Alamat Kita</h3>
                                    <p>
                                        Jl. Veteran No 12 – 14, Ketawanggede,
                                        Malang, Jawa Timur, Indonesia
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-6 col-md-6">
                        <div class="contact-us-main style-2">
                            <div class="contact-box-items">
                                <div class="icon">
                                    <img
                                        src="assets/img/icon/19.svg"
                                        alt="img"
                                    />
                                </div>
                                <div class="content">
                                    <h3>
                                        <a href="mailto:info@tripco.com"
                                            >TripGo@gmail.com</a
                                        >
                                    </h3>
                                    <p>
                                        Email us anytime for anykind <br />
                                        ofquety.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-6 col-md-6">
                        <div class="contact-us-main">
                            <div class="contact-box-items">
                                <div class="icon">
                                    <img
                                        src="assets/img/icon/20.svg"
                                        alt="img"
                                    />
                                </div>
                                <div class="content">
                                    <h3>
                                        <a href="tel:Hot+208-666-0112"
                                            >Telphone: +62 123 456 789</a
                                        >
                                    </h3>
                                    <p>
                                        Call us any kind suppor,we will wait for
                                        it.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </MainLayout>
</template>

<script setup>
import MainLayout from '../Layouts/MainLayout.vue';
</script>
