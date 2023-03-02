<script setup>
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { useForm } from '@inertiajs/vue3';

const props = defineProps(['table'])

const form = useForm({
    title: props.table.title,
    details: props.table.details,
});

const updateTable = () => {
    if (form.isDirty){
        form.put(route('table.update' , props.table) , {
        })
    }
};

</script>

<template>
    <section>
        <header>
            <h2 class="text-lg font-medium text-gray-900">Create Table</h2>

            <p class="mt-1 text-sm text-gray-600">
                Create new data to be added to the table.
            </p>
        </header>

        <form @submit.prevent="updateTable" class="mt-6 space-y-6">
            <div>
                <InputLabel for="title" value="Title" />

                <TextInput
                    id="title"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.title"
                    required
                    autofocus
                    autocomplete="title"
                />

                <InputError class="mt-2" :message="form.errors.title" />
            </div>

            <div>
                <InputLabel for="details" value="Details" />

                <TextInput
                    id="details"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.details"
                    required
                    autocomplete="details"
                />

                <InputError class="mt-2" :message="form.errors.details" />
            </div>

            <div class="flex items-center gap-4">
                <PrimaryButton :disabled="form.processing || !form.isDirty">Save</PrimaryButton>

                <Transition enter-from-class="opacity-0" leave-to-class="opacity-0" class="transition ease-in-out">
                    <p v-if="form.recentlySuccessful" class="text-sm text-gray-600">Saved.</p>
                </Transition>
            </div>
        </form>
    </section>
</template>
