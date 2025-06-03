<template>
    <DashboardLayout>
        <!-- Back Button -->
        <div class="mb-4 flex justify-end">
            <a
                href="/admin/permission/create"
                class="border-1 rounded-full border-black px-4 py-2 text-black"
            >
                Add Permission
            </a>
        </div>

        <!-- Permissions Table -->
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
                        v-for="permission in permissions"
                        :key="permission.id"
                        class="border-b bg-transparent hover:bg-gray-50"
                    >
                        <td class="border-b border-gray-200 px-6 py-2">
                            {{ permission.id }}
                        </td>
                        <td class="border-b border-gray-200 px-6 py-2">
                            {{ permission.name }}
                        </td>
                        <td class="border-b border-gray-200 px-6 py-2">
                            {{ permission.display_name }}
                        </td>
                        <td class="border-b border-gray-200 px-6 py-2">
                            <div class="flex space-x-2">
                                <!-- Edit Permission Button -->
                                <a
                                    :href="`/admin/permission/${permission.id}/edit`"
                                    class="border-1 rounded-full border-black px-4 py-2 text-black"
                                >
                                    Edit
                                </a>
                                <!-- Delete Permission Button -->
                                <a
                                    @click="confirmDelete(permission.id)"
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
    permissions: Array, // Array of permissions passed from Laravel
});

// Local state to manage permissions
const permissions = ref(props.permissions);

// Confirm delete logic
const confirmDelete = (id) => {
    if (confirm('Are you sure you want to delete this permission?')) {
        // Send DELETE request to the backend using Inertia
        Inertia.delete(`/admin/permission/${id}`, {
            onSuccess: () => {
                alert(`Permission with ID ${id} deleted successfully.`);
                // Optionally, you can reload the page or remove the permission from the UI
            },
            onError: () => {
                alert('There was an error deleting the permission.');
            },
        });
    }
};
</script>
