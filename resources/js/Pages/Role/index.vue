<template>
    <DashboardLayout>
        <!-- Back Button -->
        <div class="mb-4 flex justify-end">
            <a
                href="/admin/role/create"
                class="border-1 rounded-full border-black px-4 py-2 text-black"
            >
                Add Role
            </a>
        </div>

        <!-- Roles Table -->
        <div class="relative overflow-x-auto sm:rounded-lg">
            <table
                class="min-w-full border-separate border border-gray-200 text-left text-sm text-gray-500"
            >
                <thead class="bg-transparent text-xs uppercase text-gray-700">
                    <tr>
                        <th
                            scope="col"
                            class="border-b border-gray-200 px-6 py-3"
                        >
                            ID
                        </th>
                        <th
                            scope="col"
                            class="border-b border-gray-200 px-6 py-3"
                        >
                            Name
                        </th>
                        <th
                            scope="col"
                            class="border-b border-gray-200 px-6 py-3"
                        >
                            Display Name
                        </th>
                        <th
                            scope="col"
                            class="border-b border-gray-200 px-6 py-3"
                        >
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr
                        v-for="role in roles"
                        :key="role.id"
                        class="border-b bg-transparent hover:bg-gray-50"
                    >
                        <td class="border-b border-gray-200 px-6 py-2">
                            {{ role.id }}
                        </td>
                        <td class="border-b border-gray-200 px-6 py-2">
                            {{ role.name }}
                        </td>
                        <td class="border-b border-gray-200 px-6 py-2">
                            {{ role.display_name }}
                        </td>
                        <td class="border-b border-gray-200 px-6 py-2">
                            <div class="flex space-x-2">
                                <!-- Corrected Edit URL Format -->
                                <a
                                    :href="`/admin/role/${role.id}/edit`"
                                    class="border-1 rounded-full border-black px-4 py-2 text-black"
                                >
                                    Edit
                                </a>
                                <a
                                    @click="confirmDelete(role.id)"
                                    class="border-1 rounded-full border-black px-4 py-2 text-black"
                                >
                                    Delete
                                </a>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </DashboardLayout>
</template>

<script setup>
import { ref } from 'vue';
import { Inertia } from '@inertiajs/inertia'; // Import Inertia for sending requests
import DashboardLayout from '@/Layouts/DashboardLayouts.vue';

// Props from Laravel via Inertia.js
const props = defineProps({
    roles: Array, // Array of roles passed from Laravel
});

// Local state to manage roles
const roles = ref(props.roles);

// Confirm delete logic
const confirmDelete = (id) => {
    if (confirm('Are you sure you want to delete this role?')) {
        // Send DELETE request to the backend using Inertia
        Inertia.delete(`/admin/role/${id}`, {
            onSuccess: () => {
                alert(`Role with ID ${id} deleted successfully.`);
                // Optionally, you can reload the page or remove the role from the UI
            },
            onError: () => {
                alert('There was an error deleting the role.');
            },
        });
    }
};
</script>
