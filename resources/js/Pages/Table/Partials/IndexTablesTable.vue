<script setup>
import {Link} from "@inertiajs/vue3";

const props = defineProps(['tables'])

</script>

<template>
    <section>
        <header>
            <h2 class="text-lg font-medium text-gray-900">Index Table</h2>

            <p class="mt-1 text-sm text-gray-600">
                Show all data from the database.
            </p>
        </header>


        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th class="px-6 py-3">
                    #
                </th>
                <th class="px-6 py-3">
                    Title
                </th>
                <th class="px-6 py-3">
                    Details
                </th>
                <th class="px-6 py-3">
                    Status
                </th>
                <th class="px-6 py-3 text-center">
                    Actions
                </th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="table in tables" class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                <th class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{table.id}}
                </th>
                <td class="px-6 py-4">
                    {{table.title}}
                </td>
                <td class="px-6 py-4">
                    {{table.details}}
                </td>
                <td class="px-6 py-4" :class="{
                    'text-red-600' : table.status === 'Deleted',
                    'text-green-600' : table.status === 'Available'}">
                    {{table.status}}
                </td>
                <td class="px-6 py-4 text-center">
                    <Link :href="route('table.show' , table.id)" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Show</Link>
                </td>
            </tr>
            </tbody>
        </table>

    </section>
</template>
