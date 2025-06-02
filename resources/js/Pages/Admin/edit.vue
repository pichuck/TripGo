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

        <!-- Edit User Form -->
        <div class="container mx-auto">
            <div class="card mx-auto w-full max-w-lg rounded-lg bg-white p-6">
                <div class="card-header mb-6 flex items-center justify-between">
                    <h2 class="text-lg font-semibold">Edit User</h2>
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
                                Update
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

// Receive 'user' and 'roles' props from Inertia
const props = defineProps({
    user: Object,
    roles: Array,
});

const form = ref({
    name: props.user.name,
    email: props.user.email,
    role_id: props.user.roles[0]?.id || '', // Assume the user has at least one role
});

const submitForm = () => {
    Inertia.put(`/admin/user/${props.user.id}`, form.value); // Send PUT request to update user
};
</script>
