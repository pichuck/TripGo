<template>
    <nav class="bg-white font-nunito">
        <div class="mx-auto max-w-7xl px-4 py-3">
            <div class="flex items-center justify-between">
                <Link href="/" class="text-4xl font-bold text-[#1ba9c9]">
                    <img
                        src="/assets/img/Logo_TripGo.svg"
                        style="height: 90px"
                        alt="TripGo Logo"
                    />
                </Link>

                <!-- Hamburger Menu for Mobile -->
                <div class="md:hidden">
                    <button
                        @click="isMenuOpen = !isMenuOpen"
                        class="text-2xl text-gray-600"
                    >
                        <i class="fas fa-bars"></i>
                    </button>
                </div>

                <!-- Desktop Menu -->
                <div class="main-menu hidden gap-10 space-x-4 md:flex">
                    <Link
                        href="/"
                        class="nav-link"
                        :class="{ 'active-nav-link': $page.url === '/' }"
                    >
                        Homepage
                    </Link>

                    <Link
                        href="/about-us"
                        class="nav-link"
                        :class="{
                            'active-nav-link': $page.url === '/about-us',
                        }"
                    >
                        About us
                    </Link>

                    <Link
                        href="/contact-us"
                        class="nav-link"
                        :class="{
                            'active-nav-link': $page.url === '/contact-us',
                        }"
                    >
                        Contact us
                    </Link>
                </div>

                <!-- Right Side Button -->
                <div class="flex items-center space-x-4">
                    <template v-if="$page.props.auth.user">
                        <!-- Logout -->
                        <form @submit.prevent="logout" method="post">
                            <button
                                type="submit"
                                class="rounded-full bg-red-500 px-6 py-3 text-lg text-white hover:bg-red-600"
                            >
                                Logout
                            </button>
                        </form>
                    </template>
                    <template v-else>
                        <!-- Login -->
                        <button
                            @click="$emit('open-login-modal')"
                            class="rounded-full bg-[#1ba9c9] px-6 py-3 text-lg text-white hover:bg-[#14819c]"
                        >
                            Masuk
                        </button>
                    </template>
                </div>
            </div>
        </div>
    </nav>
</template>

<script>
import { Link } from '@inertiajs/vue3';

export default {
    components: {
        Link,
    },
    data() {
        return {
            isMenuOpen: false,
        };
    },
    methods: {
        logout() {
            this.$inertia.post('/logout');
        },
    },
};
</script>

<style>
.nav-link {
    @apply relative text-xl text-gray-600 transition-all duration-300 hover:text-[#1ba9c9];
}

.nav-link::after {
    @apply absolute bottom-0 left-0 h-[2px] w-0 bg-[#1ba9c9] transition-all duration-300 content-[''];
}

.nav-link:hover::after {
    @apply w-full;
}

.active-nav-link {
    @apply font-medium text-[#1ba9c9];
}

.active-nav-link::after {
    @apply absolute bottom-0 left-0 h-[2px] w-full bg-[#1ba9c9] content-[''];
}
</style>
