<template>
    <MainLayout @open-login-modal="showLoginModal = true">
        <main>
            <WisataDetailCard :destination="destination" />
        </main>
    </MainLayout>
</template>

<script setup>
import MainLayout from '../Layouts/MainLayout.vue';
import WisataDetailCard from '@/Components/WisataDetailCard.vue';

defineProps({
    destination: {
        type: Object,
        required: true,
    },
});
</script>
