<template>
    <DashboardLayout>
        <div class="mb-4 flex justify-end">
            <a
                href="/admin/user/create"
                class="border-1 rounded-full border-black px-4 py-2 text-black"
            >
                Add User
            </a>
        </div>

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
                            Email
                        </th>
                        <th
                            scope="col"
                            class="border-b border-gray-200 px-6 py-3"
                        >
                            Role
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
                        v-for="user in props.users"
                        :key="user.id"
                        class="border-b bg-transparent hover:bg-gray-50"
                    >
                        <td class="border-b border-gray-200 px-6 py-2">
                            {{ user.id }}
                        </td>
                        <td class="border-b border-gray-200 px-6 py-2">
                            {{ user.name }}
                        </td>
                        <td class="border-b border-gray-200 px-6 py-2">
                            {{ user.email }}
                        </td>
                        <td class="border-b border-gray-200 px-6 py-2">
                            <span v-for="role in user.roles" :key="role.id">{{
                                role.display_name
                            }}</span>
                        </td>
                        <td class="border-b border-gray-200 px-6 py-2">
                            <div class="flex space-x-2">
                                <a
                                    :href="
                                        route('admin.user.edit', {
                                            id: user.id,
                                        })
                                    "
                                    class="border-1 rounded-full border-black px-4 py-2 text-black"
                                >
                                    Edit
                                </a>

                                <a
                                    @click="confirmDelete(user.id)"
                                    class="border-1 cursor-pointer rounded-full border-black px-4 py-2 text-black"
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
import { defineProps } from 'vue';
import { Inertia } from '@inertiajs/inertia'; // Import Inertia to send delete request
import DashboardLayout from '../../Layouts/DashboardLayouts.vue';

// Define the props passed from Inertia
const props = defineProps({
    users: Array, // Use the users directly from props
});

const confirmDelete = (id) => {
    if (confirm('Are you sure you want to delete this user?')) {
        // Send a DELETE request to the backend using Inertia
        Inertia.delete(`/admin/user/${id}`, {
            onSuccess: () => {
                alert(`User with ID ${id} deleted successfully.`);
                // You can add additional logic here (like reloading the page or showing a message)
            },
            onError: () => {
                alert('There was an error deleting the user.');
            },
        });
    }
};
</script>
