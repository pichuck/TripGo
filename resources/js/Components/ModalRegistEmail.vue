<template>
    <div
        class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 p-4"
        @click.self="closeModal"
    >
        <div class="w-full max-w-md rounded-lg bg-white px-10 py-5">
            <!-- Navigation Controls -->
            <div class="mb-4 flex items-center justify-between">
                <div class="flex w-1/3 justify-start">
                    <button
                        @click="handleBack"
                        class="text-gray-500 hover:text-[#0097b2]"
                    >
                        <svg
                            class="h-6 w-6"
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
                <div class="flex w-1/3 justify-end">
                    <button
                        @click="closeModal"
                        class="text-2xl text-gray-500 hover:text-[#0097b2]"
                    >
                        &times;
                    </button>
                </div>
            </div>

            <!-- Modal Header -->
            <div class="border-b p-6">
                <div class="flex flex-col items-center gap-4">
                    <h1 class="text-center text-2xl font-bold text-gray-800">
                        Join to unlock the best of TripGo
                    </h1>
                </div>
            </div>

            <!-- Modal Body -->
            <div class="space-y-6 p-6">
                <!-- Name Inputs -->
                <!-- Name Inputs -->
                <div class="grid grid-cols-2 gap-4">
                    <!-- First Name -->
                    <div class="space-y-2">
                        <label class="block text-sm font-medium text-gray-700">
                            First Name
                        </label>
                        <input
                            type="text"
                            placeholder="First Name"
                            class="w-full rounded-lg border-gray-300 px-4 py-3 text-gray-900 focus:border-[#0097b2] focus:ring-2 focus:ring-[#0097b2]/50"
                        />
                    </div>

                    <!-- Last Name -->
                    <div class="space-y-2">
                        <label class="block text-sm font-medium text-gray-700">
                            Last Name
                        </label>
                        <input
                            type="text"
                            placeholder="Last Name"
                            class="w-full rounded-lg border border-gray-300 px-4 py-3 text-gray-900 focus:border-[#0097b2] focus:ring-2 focus:ring-[#0097b2]/50"
                        />
                    </div>
                </div>

                <!-- Email Input -->
                <div class="grid grid-cols-2 gap-4">
                    <div class="col-span-2 space-y-2">
                        <!-- Gunakan col-span-2 -->
                        <label class="block text-sm font-medium text-gray-700">
                            Email address
                        </label>
                        <input
                            type="email"
                            placeholder="Email"
                            class="w-full rounded-lg border border-gray-300 px-4 py-3 focus:border-[#0097b2] focus:ring-2 focus:ring-[#0097b2]/50"
                        />
                    </div>
                </div>
                <!-- Password Input -->
                <div class="space-y-2">
                    <label class="block text-sm font-medium text-gray-700">
                        Create a password
                    </label>
                    <input
                        type="password"
                        placeholder="Password"
                        class="w-full rounded-lg border border-gray-300 px-4 py-3 focus:border-[#0097b2] focus:ring-2 focus:ring-[#0097b2]/50"
                    />
                </div>

                <!-- Join Button -->
                <button
                    class="w-full rounded-lg bg-[#0097b2] py-3 text-white transition-colors hover:bg-[#007a91]"
                >
                    Join
                </button>

                <!-- Existing Member Link -->
                <div class="text-center text-sm text-gray-600">
                    Already a member?
                    <a
                        href="#"
                        class="text-[#0097b2] hover:underline"
                        @click.prevent="handleLogin"
                    >
                        Sign in
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
        handleLogin() {
            this.$emit('open-login');
        },
    },
};
</script>

<style scoped></style>
