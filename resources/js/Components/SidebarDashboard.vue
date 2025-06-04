<template>
    <aside
        class="sidebar hs-overlay fixed h-screen w-64 bg-white p-0 transition-transform"
    >
        <!-- Sidenav Logo -->
        <div
            class="border-default-200 bg-primary/5 flex h-16 items-center justify-center border-b px-6"
        >
            <a href="index.html">
                <img
                    src="/assets/img/Tripgo-logo-dashboard.png"
                    alt="logo"
                    class="h-12"
                />
            </a>
        </div>

        <div class="p-4 pt-16" data-simplebar>
            <ul
                class="admin-menu hs-accordion-group flex w-full flex-col gap-1.5"
            >
                <li class="menu-item">
                    <a
                        class="text-default-700 hover:bg-default-900/5 group flex items-center gap-x-3.5 rounded-md px-3 py-2 text-sm font-medium transition-all"
                        href="index.html"
                    >
                        <i class="i-solar-home-smile-bold-duotone text-2xl"></i>
                        Dashboard
                    </a>
                </li>

                <!-- Cek role menggunakan data dari API -->
                <li
                    v-if="userRole.includes('superadministrator')"
                    class="menu-item"
                >
                    <a
                        class="text-default-700 hover:bg-default-900/5 group flex items-center gap-x-3.5 rounded-md px-3 py-2 text-sm font-medium transition-all"
                        href="/admin/user"
                    >
                        <i class="material-symbols-rounded text-2xl">group</i>
                        Manage Users
                    </a>
                </li>

                <li
                    v-if="userRole.includes('superadministrator')"
                    class="menu-item"
                >
                    <a
                        class="text-default-700 hover:bg-default-900/5 group flex items-center gap-x-3.5 rounded-md px-3 py-2 text-sm font-medium transition-all"
                        href="/admin/role"
                    >
                        <i class="material-symbols-rounded text-2xl">group</i>
                        Manage Roles
                    </a>
                </li>

                <li
                    v-if="userRole.includes('superadministrator')"
                    class="menu-item"
                >
                    <a
                        class="text-default-700 hover:bg-default-900/5 group flex items-center gap-x-3.5 rounded-md px-3 py-2 text-sm font-medium transition-all"
                        href="/admin/permission"
                    >
                        <i class="material-symbols-rounded text-2xl">group</i>
                        Manage Permissions
                    </a>
                </li>

                <!-- Menu lainnya -->
                <li class="menu-item">
                    <a
                        href="starter-page.html"
                        class="text-default-700 hover:bg-default-900/5 hs-accordion-active:bg-default-900/5 group flex items-center gap-x-3.5 rounded-md px-3 py-2 text-sm font-medium transition-all"
                    >
                        <i class="material-symbols-rounded text-2xl"
                            >landscape</i
                        >
                        <span class="menu-text">Manage Wisata</span>
                    </a>
                </li>

                <li class="menu-item">
                    <a
                        href="maps-vector.html"
                        class="text-default-700 hover:bg-default-900/5 group flex items-center gap-x-3.5 rounded-md px-3 py-2 text-sm font-medium transition-all"
                    >
                        <i class="material-symbols-rounded text-2xl">comment</i>
                        <span class="menu-text">Manage Comments</span>
                    </a>
                </li>
            </ul>
        </div>
    </aside>
</template>

<script setup>
import { ref, onMounted } from 'vue';

const userRole = ref([]);

onMounted(async () => {
    const response = await fetch('/api/user');
    const data = await response.json();
    userRole.value = data.role; // Menyimpan role pengguna
    console.log(userRole.value);
});
</script>

<style scoped>
.sidebar {
    transition: transform 0.3s cubic-bezier(0.4, 0, 0.2, 1);
}
</style>
