<template>
    <aside
        class="sidebar hs-overlay fixed h-screen w-64 bg-white p-0 transition-transform"
        :class="{
            '-translate-x-full': !isSidebarOpen,
            'translate-x-0': isSidebarOpen,
        }"
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

                <li class="menu-item">
                    <a
                        class="text-default-700 hover:bg-default-900/5 group flex items-center gap-x-3.5 rounded-md px-3 py-2 text-sm font-medium transition-all"
                        href="app-calendar.html"
                    >
                        <i class="material-symbols-rounded text-2xl">group</i>
                        <!-- Sama dengan Total Users -->
                        Manage Users
                    </a>
                </li>

                <li class="menu-item">
                    <a
                        href="starter-page.html"
                        class="text-default-700 hover:bg-default-900/5 hs-accordion-active:bg-default-900/5 group flex items-center gap-x-3.5 rounded-md px-3 py-2 text-sm font-medium transition-all"
                    >
                        <i class="material-symbols-rounded text-2xl"
                            >landscape</i
                        >
                        <!-- Sama dengan Total Wisata -->
                        <span class="menu-text">Manage Wisata</span>
                    </a>
                </li>

                <li class="menu-item">
                    <a
                        href="maps-vector.html"
                        class="text-default-700 hover:bg-default-900/5 group flex items-center gap-x-3.5 rounded-md px-3 py-2 text-sm font-medium transition-all"
                    >
                        <i class="material-symbols-rounded text-2xl">comment</i>
                        <!-- Sama dengan Total Comments -->
                        <span class="menu-text">Manage Comments</span>
                    </a>
                </li>
            </ul>
        </div>
    </aside>
</template>

<script setup>
defineProps({
    isSidebarOpen: Boolean,
});
</script>

<style scoped>
.sidebar {
    transition: transform 0.3s cubic-bezier(0.4, 0, 0.2, 1);
}
</style>
