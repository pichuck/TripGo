<template>
    <MainLayout @open-login-modal="showLoginModal = true">
        <!-- breadcrumb-wrappe-Section Start -->
        <section class="breadcrumb-wrapper fix border-lg">
            <div class="container">
                <div class="row">
                    <div class="page-heading">
                        <h2>About Us</h2>
                        <ul class="breadcrumb-list">
                            <li>
                                <Link href="/">Home</Link>
                            </li>
                            <li>-</li>

                            <li>About Us</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>

        <AboutSection />
    </MainLayout>
</template>

<script setup>
import { Link } from '@inertiajs/vue3';
import MainLayout from '../Layouts/MainLayout.vue';
import AboutSection from '../Components/AboutSection.vue';
</script>
