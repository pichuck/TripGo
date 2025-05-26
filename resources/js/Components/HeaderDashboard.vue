<template>
    <header
        class="right-0 mb-8 flex items-center justify-between bg-white p-4 shadow-md"
    >
        <div class="flex items-center gap-4">
            <button class="text-gray-600" @click="$emit('toggle-sidebar')">
                <span class="material-icons text-3xl"
                    ><img
                        src="/assets/img/Hamburger-Menu.png"
                        height="30"
                        width="30"
                        alt="Menu Icon"
                /></span>
            </button>
            <h1 class="text-2xl font-bold text-gray-800">Dashboard</h1>
        </div>

        <div class="flex items-center gap-3">
            <img
                src="https://via.placeholder.com/40"
                alt="Profile"
                class="h-10 w-10 rounded-full"
            />
            <span class="font-semibold text-gray-800">John Doe</span>
        </div>
    </header>
</template>

<script setup>
defineEmits(['toggle-sidebar']);
</script>
