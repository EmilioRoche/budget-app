<script setup>
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import TextInput from '@/Components/TextInput.vue';
import { Link, useForm, usePage } from '@inertiajs/vue3';

defineProps({
});

//const user = usePage().props.auth.user;

const form = useForm({
    name: "",
    month: "",
    year: "",
    type: "",
    recurring: "",
    price: "",
});
</script>

<template>
    <section>
        <header>
            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">New Expense</h2>

            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                Fill out the information needed for the transaction record.
            </p>
        </header>
        <form class="mt-6 space-y-6">
            <div>
                <InputLabel for="name" value="Expense Name" />

                <TextInput
                    id="name"
                    type="text"
                    class="mt-1 block w-3/4"
                    v-model="form.name"
                    required
                    autofocus
                />

                <InputError class="mt-2" :message="form.errors.name" />
            </div>
            <div>
                <InputLabel for="month" value="Month" />
                <!--move this into a separate component-->
                <select class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                    <option disabled value="">Please select a month</option>
                    <option>January</option>
                    <option>February</option>
                    <option>March</option>
                    <option>April</option>
                    <option>May</option>
                    <option>June</option>
                    <option>July</option>
                    <option>August</option>
                    <option>September</option>
                    <option>October</option>
                    <option>November</option>
                    <option>December</option>
                </select>
            </div>
        </form>
    </section>
</template>
