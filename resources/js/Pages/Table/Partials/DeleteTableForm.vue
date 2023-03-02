<script setup>
import DangerButton from '@/Components/DangerButton.vue';
import Modal from '@/Components/Modal.vue';
import SecondaryButton from '@/Components/SecondaryButton.vue';
import Checkbox from "@/Components/Checkbox.vue";

import { useForm } from '@inertiajs/vue3';
import { ref } from 'vue';

const props = defineProps(['table'])


const confirmingTableDeletion = ref(false);

const form = useForm({
    type: false,
});

const deleteUser = () => {
    form.delete(route('table.destroy' , props.table));
};

const closeModal = () => {
    confirmingTableDeletion.value = false;

    form.reset();
};
</script>

<template>
    <section class="space-y-6">
        <header>
            <h2 class="text-lg font-medium text-gray-900">Delete Table</h2>

            <p class="mt-1 text-sm text-gray-600">
                This process will lead to the deletion of this data, either permanently or not, according to what you want.
            </p>
        </header>

        <DangerButton @click="confirmingTableDeletion = !confirmingTableDeletion">Delete Table</DangerButton>

        <Modal :show="confirmingTableDeletion" @close="closeModal">
            <div class="p-6">
                <h2 class="text-lg font-medium text-gray-900">
                    Are you sure abo ut that ?
                </h2>

                <p class="mt-1 text-sm text-gray-600">
                    Do you want to permanently delete this table, or delete it and keep a copy in the Recycle Bin ?
                </p>
                <div class="block mt-4">
                    <label class="flex items-center">
                        <Checkbox name="remember" v-model:checked="form.type" />
                        <span class="ml-2 text-sm text-red-600">Permanently delete</span>
                    </label>
                </div>
                <p v-if="form.type" class="mt-1 text-sm text-red-600">
                    Enabling this option means that you will never be able to recover this data !
                </p>

                <div class="mt-6 flex justify-end">
                    <SecondaryButton @click="closeModal"> Cancel </SecondaryButton>

                    <DangerButton
                        class="ml-3"
                        :class="{ 'opacity-25': form.processing }"
                        :disabled="form.processing"
                        @click="deleteUser"
                    >
                        Delete Table
                    </DangerButton>
                </div>
            </div>
        </Modal>
    </section>
</template>
