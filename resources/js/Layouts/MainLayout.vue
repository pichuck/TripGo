<template>
    <div>
        <div>
            <Head :pageTitle="pageTitle" />
            <Navbar @open-login-modal="showLoginModal = true" />
            <main>
                <slot></slot>
            </main>
        </div>

        <!-- Modal Login Utama -->
        <ModalMasuk
            v-if="showLoginModal"
            @close="showLoginModal = false"
            @open-email-login="openEmailLogin"
        />

        <!-- Modal Login Email -->
        <ModalLoginEmail
            v-if="showEmailLoginModal"
            @close="showEmailLoginModal = false"
            @back="handleBackToMainLogin"
            @open-regist="openRegistModal"
        />

        <!-- Modal Registrasi Email -->
        <ModalRegistEmail
            v-if="showRegistModal"
            @close="showRegistModal = false"
            @back="handleBackToEmailLogin"
            @open-login="handleBackToEmailLogin"
        />

        <Footer />
    </div>
</template>

<script setup>
import { ref } from 'vue';
import Head from '../Components/Head.vue';
import Navbar from '../Components/Navbar.vue';
import Footer from '../Components/Footer.vue';
import ModalMasuk from '../Components/ModalMasuk.vue';
import ModalLoginEmail from '../Components/ModalLoginEmail.vue';
import ModalRegistEmail from '../Components/ModalRegistEmail.vue';

const pageTitle = 'TripGo - Beranda';
const showLoginModal = ref(false);
const showEmailLoginModal = ref(false);
const showRegistModal = ref(false);

const openEmailLogin = () => {
    showLoginModal.value = false;
    showEmailLoginModal.value = true;
};

const handleBackToMainLogin = () => {
    showEmailLoginModal.value = false;
    showLoginModal.value = true;
};

const openRegistModal = () => {
    showEmailLoginModal.value = false;
    showRegistModal.value = true;
};

const handleBackToEmailLogin = () => {
    showRegistModal.value = false;
    showEmailLoginModal.value = true;
};
</script>
<style scoped>
main {
    padding: 20px;
}
</style>
