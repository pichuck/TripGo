<template>
    <div class="flex">
        <SidebarDashboard :is-sidebar-open="isSidebarOpen" />

        <div
            class="main-content flex-1 p-6"
            :class="{ 'md:ml-64': isSidebarOpen }"
        >
            <HeaderDashboard @toggle-sidebar="toggleSidebar" />

            <div class="main-content-inner">
                <slot />
            </div>
        </div>
    </div>
</template>

<script setup>
import { ref, onMounted, onBeforeUnmount } from 'vue';
import SidebarDashboard from '@/components/SidebarDashboard.vue';
import HeaderDashboard from '@/components/HeaderDashboard.vue';

const isSidebarOpen = ref(window.innerWidth >= 768);

const toggleSidebar = () => {
    isSidebarOpen.value = !isSidebarOpen.value;
    localStorage.setItem('sidebarOpen', isSidebarOpen.value);
};

const handleResize = () => {
    const isDesktop = window.innerWidth >= 768;
    isSidebarOpen.value = isDesktop;
};

onMounted(() => {
    const savedState = localStorage.getItem('sidebarOpen');
    if (savedState !== null) {
        isSidebarOpen.value = savedState === 'true';
    }
    window.addEventListener('resize', handleResize);
});

onBeforeUnmount(() => {
    window.removeEventListener('resize', handleResize);
});
</script>

<style>
.main-content {
    transition: margin-left 0.3s cubic-bezier(0.4, 0, 0.2, 1);
}
</style>
