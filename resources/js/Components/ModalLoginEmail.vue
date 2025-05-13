<template>
    <div
        class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 p-4"
        @click.self="closeModal"
    >
        <div class="w-full max-w-md rounded-lg bg-white px-10 py-4">
            <div class="mb-4 flex items-center justify-between">
                <div class="flex w-1/3 justify-start">
                    <button
                        @click="handleBack"
                        class="left-4 top-4 text-gray-500 hover:text-[#0097b2]"
                    >
                        <svg
                            class="h-5 w-5"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M15 19l-7-7 7-7"
                            />
                        </svg>
                    </button>
                </div>
                <!-- Tombol back -->
                <div class="flex w-1/3 justify-end">
                    <button
                        @click="closeModal"
                        class="text-2xl text-gray-500 hover:text-[#0097b2]"
                    >
                        &times;
                    </button>
                </div>
                <!-- Tombol close -->
            </div>

            <!-- Modal Header -->
            <div class="border-b p-6">
                <div class="flex items-center gap-4">
                    <img
                        src="/assets/img/Logo_TripGo.svg"
                        class="h-16 w-auto flex-shrink-0"
                    />
                    <h1 class="text-xl font-semibold text-gray-800">
                        Welcome back to
                        <span class="font-bold text-[#0097b2]">tripGo</span>
                    </h1>
                </div>
            </div>

            <!-- Modal Body -->
            <div class="space-y-6 p-6">
                <!-- Email Input -->
                <div class="space-y-2">
                    <label class="block text-sm font-medium text-gray-700">
                        Email address
                    </label>
                    <input
                        type="email"
                        placeholder="Enter your email"
                        class="w-full rounded-lg border border-gray-300 px-4 py-3 focus:border-[#0097b2] focus:ring-2 focus:ring-[#0097b2]/50"
                    />
                </div>

                <!-- Password Input -->
                <div class="space-y-2">
                    <label class="block text-sm font-medium text-gray-700">
                        Password
                    </label>
                    <input
                        type="password"
                        placeholder="Enter your password"
                        class="w-full rounded-lg border border-gray-300 px-4 py-3 focus:border-[#0097b2] focus:ring-2 focus:ring-[#0097b2]/50"
                    />
                </div>

                <!-- Forgot Password -->
                <div class="text-right">
                    <a href="#" class="text-sm text-[#0097b2] hover:underline">
                        Forgot password?
                    </a>
                </div>

                <!-- Sign In Button -->
                <button
                    class="w-full rounded-lg bg-[#0097b2] py-3 text-white transition-colors hover:bg-[#007a91]"
                >
                    Sign in
                </button>

                <!-- Sign Up Link -->
                <div class="text-center text-sm text-gray-600">
                    Not a member?
                    <a
                        href="#"
                        class="text-[#0097b2] hover:underline"
                        @click.prevent="$emit('open-regist')"
                    >
                        Join now
                    </a>
                </div>
            </div>

            <!-- Modal Footer -->
            <div class="border-t p-6 text-center text-xs text-gray-500">
                <p>
                    By proceeding, you agree to our
                    <a href="#" class="text-[#0097b2] hover:underline">
                        Terms of Use
                    </a>
                    and confirm
                </p>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    methods: {
        closeModal() {
            this.$emit('close');
        },

        handleBack() {
            this.$emit('back');
        },
    },
};
</script>

<style scoped>
input:focus {
    outline: none;
    box-shadow: 0 0 0 2px rgba(0, 151, 178, 0.2);
}
</style>
