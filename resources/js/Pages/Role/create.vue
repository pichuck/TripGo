<template>
    <DashboardLayout>
        <!-- Back Button -->
        <div class="mb-4 flex justify-end">
            <a
                href="/admin/role"
                class="border-1 rounded-full border-black px-4 py-2 text-black"
            >
                Back
            </a>
        </div>

        <!-- Create Role Form -->
        <div class="container mx-auto">
            <div class="card mx-auto w-full max-w-lg rounded-lg bg-white p-6">
                <div class="card-header mb-6 flex items-center justify-between">
                    <h2 class="text-lg font-semibold">Create Role</h2>
                </div>

                <div class="card-body">
                    <form @submit.prevent="submitForm">
                        <!-- Name Field -->
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

                        <!-- Display Name Field -->
                        <div class="mb-4">
                            <label
                                for="display_name"
                                class="mb-2 block text-sm text-gray-400"
                                >Display Name</label
                            >
                            <input
                                id="display_name"
                                v-model="form.display_name"
                                type="text"
                                class="block w-full rounded-sm border-gray-200 px-4 py-3 text-sm focus:border-blue-600 focus:ring-0"
                                required
                            />
                        </div>

                        <!-- Description Field -->
                        <div class="mb-4">
                            <label
                                for="description"
                                class="mb-2 block text-sm text-gray-400"
                                >Description</label
                            >
                            <input
                                id="description"
                                v-model="form.description"
                                type="text"
                                class="block w-full rounded-sm border-gray-200 px-4 py-3 text-sm focus:border-blue-600 focus:ring-0"
                                required
                            />
                        </div>

                        <!-- Permissions Field -->
                        <div class="mb-6">
                            <label
                                for="permissions"
                                class="mb-2 block text-sm text-gray-400"
                                >Permissions</label
                            >
                            <div class="grid grid-cols-3 gap-4">
                                <div
                                    v-for="permission in permissions"
                                    :key="permission.id"
                                    class="form-check form-check-inline"
                                >
                                    <input
                                        type="checkbox"
                                        v-model="form.permissions_id"
                                        :value="permission.id"
                                        class="form-check-input"
                                    />
                                    <label class="text-gray-500">{{
                                        permission.display_name
                                    }}</label>
                                </div>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="mb-6 flex justify-end">
                            <button
                                type="submit"
                                class="border-1 rounded-full border-black px-4 py-2 text-black"
                            >
                                Submit
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
import DashboardLayout from '@/Layouts/DashboardLayouts.vue'; // Make sure the import path is correct

// Props passed from Laravel via Inertia.js
const props = defineProps({
    permissions: Array, // Permissions will be passed as an array
});

const form = ref({
    name: '',
    display_name: '',
    description: '',
    permissions_id: [],
});

const submitForm = async () => {
    try {
        // Submit form data to create a new role
        await axios.post('/admin/role', form.value);

        // Redirect to the roles index page after successful submission
        window.location.href = '/admin/role';
    } catch (error) {
        console.error('Error submitting form:', error);
    }
};
</script>
