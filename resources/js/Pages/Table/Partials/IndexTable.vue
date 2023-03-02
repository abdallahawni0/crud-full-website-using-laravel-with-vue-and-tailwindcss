<script setup>
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { useForm } from '@inertiajs/vue3';

const form = useForm({
    title: '',
    details: '',
});

const createTable = () => {
    form.post(route('table.store') , {
        onSuccess:() => form.reset('title' , 'details'),
    })
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

        <form @submit.prevent="createTable" class="mt-6 space-y-6">
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
                <PrimaryButton :disabled="form.processing">Save</PrimaryButton>

                <Transition enter-from-class="opacity-0" leave-to-class="opacity-0" class="transition ease-in-out">
                    <p v-if="form.recentlySuccessful" class="text-sm text-gray-600">Saved.</p>
                </Transition>
            </div>
        </form>
    </section>
</template>
