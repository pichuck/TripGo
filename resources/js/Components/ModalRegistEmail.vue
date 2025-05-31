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
            <div class="border-b p-4">
                <div class="flex flex-col items-center gap-2">
                    <h1 class="text-center text-2xl font-bold text-gray-800">
                        Join to unlock the best of TripGo
                    </h1>
                </div>
            </div>

            <!-- Modal Body -->
            <div class="space-y-2 p-2">
                <!-- Name -->
                <div class="space-y-2">
                    <label class="block text-sm font-medium text-gray-700"
                        >Name</label
                    >
                    <input
                        type="text"
                        v-model="form.name"
                        placeholder="Name"
                        class="w-full rounded-lg border border-gray-300 px-4 py-3 text-black focus:border-[#0097b2] focus:ring-2 focus:ring-[#0097b2]/50"
                        autocomplete="name"
                    />
                    <p v-if="form.errors.name" class="text-sm text-red-500">
                        {{ form.errors.name }}
                    </p>
                </div>

                <!-- Email -->
                <div class="space-y-2">
                    <label class="block text-sm font-medium text-gray-700"
                        >Email address</label
                    >
                    <input
                        type="email"
                        v-model="form.email"
                        placeholder="Email"
                        class="w-full rounded-lg border border-gray-300 px-4 py-3 text-black focus:border-[#0097b2] focus:ring-2 focus:ring-[#0097b2]/50"
                        autocomplete="username"
                    />
                    <p v-if="form.errors.email" class="text-sm text-red-500">
                        {{ form.errors.email }}
                    </p>
                </div>

                <!-- Password -->
                <div class="space-y-2">
                    <label class="block text-sm font-medium text-gray-700"
                        >Password</label
                    >
                    <input
                        type="password"
                        v-model="form.password"
                        placeholder="Password"
                        class="w-full rounded-lg border border-gray-300 px-4 py-3 text-black focus:border-[#0097b2] focus:ring-2 focus:ring-[#0097b2]/50"
                        autocomplete="new-password"
                    />
                    <p v-if="form.errors.password" class="text-sm text-red-500">
                        {{ form.errors.password }}
                    </p>
                </div>

                <!-- Confirm Password -->
                <div class="space-y-2">
                    <label class="block text-sm font-medium text-gray-700"
                        >Confirm Password</label
                    >
                    <input
                        type="password"
                        v-model="form.password_confirmation"
                        placeholder="Confirm Password"
                        class="w-full rounded-lg border border-gray-300 px-4 py-3 text-black focus:border-[#0097b2] focus:ring-2 focus:ring-[#0097b2]/50"
                        autocomplete="new-password"
                    />
                    <p
                        v-if="form.errors.password_confirmation"
                        class="text-sm text-red-500"
                    >
                        {{ form.errors.password_confirmation }}
                    </p>
                </div>

                <!-- Join Button -->
                <button
                    @click="submit"
                    :disabled="form.processing"
                    class="mt-4 w-full rounded-lg bg-[#0097b2] py-3 text-white transition-colors hover:bg-[#007a91]"
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

<script setup>
import { useForm } from '@inertiajs/vue3';

const emit = defineEmits(['close', 'back', 'open-login']);

const form = useForm({
    name: '',
    email: '',
    password: '',
    password_confirmation: '',
});

const submit = () => {
    form.post(route('register'), {
        onFinish: () => form.reset('password', 'password_confirmation'),
    });
};

const closeModal = () => emit('close');
const handleBack = () => emit('back');
const handleLogin = () => emit('open-login');
</script>

<style scoped></style>
