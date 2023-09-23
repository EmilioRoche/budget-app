<script setup>
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import TextInput from '@/Components/TextInput.vue';
import { Link, useForm, usePage } from '@inertiajs/vue3';
import { ref } from 'vue';

defineProps({
});

//const user = usePage().props.auth.user;

const form = useForm({
    name: "",
    amount: "",
    type: "",
    month: "",
    year: "",
    recurring: "",
});

const formattedPrice = ref('');

const formatAmount = (event) => {
    const key = event.key;
    const currentInput = formattedPrice.value;
    // Allow numbers, backspace, and a single decimal point
    if (/[\d.]/.test(key) || key === 'Backspace') {
        if (key === '.') {
        // Check if adding another decimal point
        if (currentInput.includes('.')) {
            event.preventDefault();
        } else if (currentInput.includes('.') && currentInput.split('.')[1]?.length >= 2) {
            // Prevent adding more than 2 decimal places
            event.preventDefault();
        } else {
            // Append the key to the current input
            formattedPrice.value = currentInput + key;
        }
        } else {
        // Check if there are more than 2 digits after the decimal point
        const parts = currentInput.split('.');
        if (parts[1]?.length >= 2) {
            event.preventDefault();
        } else {
            formattedPrice.value = currentInput + key;
        }
        }
    } else {
        event.preventDefault();
    }
}
</script>

<template>
    <section>
        <header>
            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">New Expense</h2>

            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                Fill out the information needed for the expense record.
            </p>
        </header>
        <form @submit.prevent="form.put(route('profile.update'))" class="mt-6 space-y-6">
            <div>
                <InputLabel for="name" value="Expense Name" />

                <TextInput
                    id="name"
                    type="text"
                    class="mt-1 block w-3/5"
                    v-model="form.name"
                    required
                    autofocus
                    placeholder="Brunch with parents"
                />

                <InputError class="mt-2" :message="form.errors.name" />
            </div>
            <div>
                <InputLabel for="name" value="Amount" />

                <TextInput
                    id="amount"
                    type="text"
                    class="mt-1 block w-1/5"
                    v-model="form.amount"
                    @keypress="formatAmount"
                    required
                    autofocus
                    style="text-align: right;"
                    placeholder="0.00"
                />

                <InputError class="mt-2" :message="form.errors.price" />
            </div>
            <div>
                <InputLabel for="type" value="Type" />
                <!--move this into a separate component-->
                <select class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                    <option disabled value="">Please select a type</option>
                    <option>Entertainment</option>
                    <option>Investments</option>
                    <option>Health</option>
                    <option>Home</option>
                    <option>Miscellaneous</option>
                    <option>Savings</option>
                    <option>Transportation</option>
                    <option>Utilities</option>
                </select>
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
            <div>
                <InputLabel for="year" value="Year" />
                <!--move this into a separate component-->
                <select class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                    <option disabled value="">Please select a year</option>
                    <option>{{ new Date().getFullYear() }}</option>
                </select>
            </div>
            <!--change to checkbox afterwards-->
            <div>
                <InputLabel for="recurring" value="recurring" />
                <!--move this into a separate component-->
                <select class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                    <option disabled value="">Please select a choice</option>
                    <option>No</option>
                    <option>Yes</option>
                </select>
            </div>
        </form>
    </section>
</template>
