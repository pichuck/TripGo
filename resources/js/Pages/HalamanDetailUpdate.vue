<template>
    <MainLayout @open-login-modal="showLoginModal = true">
        <main>
            <UpdateDetailCard />
        </main>
    </MainLayout>
</template>
<script setup>
import MainLayout from '../Layouts/MainLayout.vue';
import UpdateDetailCard from '@/Components/UpdateDetailCard.vue';
</script>
