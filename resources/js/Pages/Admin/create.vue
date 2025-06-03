<template>
    <DashboardLayout>
        <!-- Back Button -->
        <div class="mb-4 flex justify-end">
            <a
                href="/admin/user"
                class="border-1 rounded-full border-black px-4 py-2 text-black"
            >
                Back
            </a>
        </div>

        <!-- Create User Form -->
        <div class="container mx-auto">
            <div class="card mx-auto w-full max-w-lg rounded-lg bg-white p-6">
                <div class="card-header mb-6 flex items-center justify-between">
                    <h2 class="text-lg font-semibold">Create User</h2>
                </div>

                <div class="card-body">
                    <form @submit.prevent="submitForm">
                        <div class="mb-4">
                            <label
                                for="name"
                                class="mb-2 block text-sm text-gray-400"
                                >Name</label
                            >
                            <input
                                id="name"
                                v-model="form.name"
                                type="text"
                                class="block w-full rounded-sm border-gray-200 px-4 py-3 text-sm focus:border-blue-600 focus:ring-0"
                                required
                            />
                        </div>

                        <div class="mb-4">
                            <label
                                for="email"
                                class="mb-2 block text-sm text-gray-400"
                                >Email</label
                            >
                            <input
                                id="email"
                                v-model="form.email"
                                type="email"
                                class="block w-full rounded-sm border-gray-200 px-4 py-3 text-sm focus:border-blue-600 focus:ring-0"
                                required
                            />
                        </div>

                        <div class="mb-4">
                            <label
                                for="password"
                                class="mb-2 block text-sm text-gray-400"
                                >Password</label
                            >
                            <input
                                id="password"
                                v-model="form.password"
                                type="password"
                                class="block w-full rounded-sm border-gray-200 px-4 py-3 text-sm focus:border-blue-600 focus:ring-0"
                                required
                            />
                        </div>

                        <div class="mb-4">
                            <label
                                for="password_confirmation"
                                class="mb-2 block text-sm text-gray-400"
                                >Confirm Password</label
                            >
                            <input
                                id="password_confirmation"
                                v-model="form.password_confirmation"
                                type="password"
                                class="block w-full rounded-sm border-gray-200 px-4 py-3 text-sm focus:border-blue-600 focus:ring-0"
                                required
                            />
                        </div>

                        <div class="mb-4">
                            <label
                                for="role_id"
                                class="mb-2 block text-sm text-gray-400"
                                >Role</label
                            >
                            <select
                                id="role_id"
                                v-model="form.role_id"
                                class="block w-full rounded-sm border-gray-200 px-4 py-3 text-sm focus:border-blue-600 focus:ring-0"
                                required
                            >
                                <option value="">Select Role</option>
                                <!-- Loop through the roles passed from Inertia -->
                                <option
                                    v-for="role in roles"
                                    :key="role.id"
                                    :value="role.id"
                                >
                                    {{ role.display_name }}
                                </option>
                            </select>
                        </div>

                        <div class="flex justify-end">
                            <button
                                type="submit"
                                class="border-1 rounded-full border-black px-4 py-2 text-black"
                            >
                                Register
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </DashboardLayout>
</template>

<script setup>
import { ref } from 'vue';
import { Inertia } from '@inertiajs/inertia'; // Import Inertia for submitting form
import DashboardLayout from '../../Layouts/DashboardLayouts.vue';

// Receive 'roles' from Inertia props
const props = defineProps({
    roles: Array, // 'roles' passed from the controller
});

const form = ref({
    name: '',
    email: '',
    password: '',
    password_confirmation: '',
    role_id: '',
});

const submitForm = () => {
    Inertia.post('/admin/user', form.value); // Submit form data to the backend
};
</script>
