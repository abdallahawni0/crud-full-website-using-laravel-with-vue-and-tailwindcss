<script setup>
import { Head } from '@inertiajs/vue3';

import System from '@/Layouts/System.vue';
import CreateTableForm from "@/Pages/Table/Partials/CreateTableForm.vue";
import IndexTablesTable from "@/Pages/Table/Partials/IndexTablesTable.vue";

defineProps(['tables']);
</script>

<template>
    <Head>
        <title>Table</title>
    </Head>

    <System>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Tables</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <CreateTableForm/>
                </div>

                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <IndexTablesTable :tables="tables"/>
                </div>


            </div>
        </div>
    </System>
</template>
