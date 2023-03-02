<script setup>
import { Head } from '@inertiajs/vue3';

import System from '@/Layouts/System.vue';
import UpdateTableForm from "@/Pages/Table/Partials/UpdateTableForm.vue";


defineProps(['table']);
</script>

<template>
    <Head>
        <title>Table</title>
    </Head>

    <System>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Tables / {{table.title}}</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <UpdateTableForm :table="table"/>
                </div>

                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                </div>


            </div>
        </div>
    </System>
</template>
