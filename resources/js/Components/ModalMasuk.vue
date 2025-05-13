<template>
    <div
        class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 p-4"
        @click.self="closeModal"
    >
        <div class="w-full max-w-md rounded-lg bg-white px-10 py-4">
            <div class="mb-4 flex items-center justify-between">
                <div class="flex w-1/3 justify-start"></div>
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
                        src="\assets\img\Logo_TripGo.svg"
                        class="h-16 w-auto flex-shrink-0"
                    />
                    <h2 class="flex-1 text-xl font-semibold text-gray-800">
                        Masuk untuk Experience lebih baik dari
                        <span class="font-bold text-[#0097b2]">tripGo</span>
                    </h2>
                </div>
            </div>

            <!-- Modal Body -->
            <div class="space-y-4 p-10">
                <!-- Google Login Button -->
                <button
                    @click="handleGoogleLogin"
                    class="flex w-full items-center justify-center gap-10 rounded-lg border border-gray-300 bg-white p-3 transition-colors hover:bg-gray-50"
                >
                    <img
                        src="/assets/img/goggle.jpg"
                        alt="goggle-logo"
                        style="height: 19px"
                    />
                    <span class="font-medium text-gray-700"
                        >Continue with Google</span
                    >
                </button>

                <!-- Email Login Button -->
                <button
                    @click="handleEmailLogin"
                    class="flex w-full items-center justify-center gap-10 rounded-lg border border-gray-300 bg-white p-3 transition-colors hover:bg-gray-50"
                >
                    <svg
                        class="h-5 w-5 text-gray-600"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"
                        />
                    </svg>
                    <span class="font-medium text-gray-700"
                        >Continue with email</span
                    >
                </button>
            </div>

            <!-- Modal Footer -->
            <div class="border-t p-6 text-sm text-gray-500">
                <p class="text-center">
                    By proceeding you agree to our
                    <a href="#" class="text-blue-600 hover:underline"
                        >Terms of Use</a
                    >
                    and confirm you how to add our
                    <a href="#" class="text-blue-600 hover:underline"
                        >Privacy</a
                    >
                    and
                    <a href="#" class="text-blue-600 hover:underline"
                        >Google Resources</a
                    >.
                </p>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    methods: {
        handleGoogleLogin() {
            // Implement Google login logic
            console.log('Google login clicked');
        },
        handleEmailLogin() {
            this.$emit('open-email-login');
        },
        closeModal() {
            this.$emit('close'); // Kirim event close
        },
    },
};
</script>
