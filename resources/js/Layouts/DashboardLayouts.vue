<template>
    <div class="page-content">
        <!-- Sidebar akan muncul di sini -->
        <SidebarDashboard />

        <!-- Header akan muncul di sini -->
        <HeaderDashboard />
        <!-- Konten halaman akan di-render di slot ini -->
        <main>
            <slot></slot>
        </main>
    </div>
</template>

<script>
import SidebarDashboard from '../Components/SidebarDashboard.vue';
import HeaderDashboard from '../Components/HeaderDashboard.vue';

export default {
    components: {
        SidebarDashboard,
        HeaderDashboard,
    },
};
</script>
