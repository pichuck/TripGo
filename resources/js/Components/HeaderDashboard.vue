<template>
    <header
        class="right-0 mb-8 flex items-center justify-between bg-white p-4 shadow-md"
    >
        <div class="flex items-center gap-4">
            <button class="text-gray-600" @click="$emit('toggle-sidebar')">
                <img
                    src="/assets/img/Hamburger-Menu.png"
                    height="30"
                    width="30"
                    alt="Menu Icon"
                />
            </button>
            <h1 class="text-2xl font-bold text-gray-800">Dashboard</h1>
        </div>

        <div
            class="relative flex items-center gap-3"
            @click="toggleDropdown"
            style="cursor: pointer"
        >
            <img
                src="https://via.placeholder.com/40"
                alt="Profile"
                class="h-10 w-10 rounded-full"
            />
            <span class="font-semibold text-gray-800">{{ userName }}</span>

            <!-- Dropdown -->
            <div
                v-if="showDropdown"
                class="absolute right-0 mt-12 w-40 rounded-md border border-gray-200 bg-white shadow-lg"
            >
                <Link
                    :href="route('logout')"
                    method="post"
                    as="button"
                    class="w-full px-4 py-2 text-left text-gray-700 hover:bg-gray-100"
                >
                    Log Out
                </Link>
            </div>
        </div>
    </header>
</template>

<script setup>
import { ref } from 'vue';
import { usePage, Link } from '@inertiajs/vue3';

const showDropdown = ref(false);
const toggleDropdown = () => {
    showDropdown.value = !showDropdown.value;
};

const page = usePage();
const userName = page.props.auth?.user?.name || 'User';
</script>
