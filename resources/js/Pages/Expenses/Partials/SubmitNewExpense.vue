<script setup>
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Link, useForm, usePage } from '@inertiajs/vue3';
import axios from 'axios';
import { validatePrice, priceMagnitude } from '@/utils/helper';

defineProps({
});

//const user = usePage().props.auth.user;

const form = useForm({
    name: "",
    price: "",
    type: "",
    month: "",
    year: "",
    recurring: "",
});


const submitForm = () => {
    const yearInt = parseInt(form.year);
    const priceString = form.price;
    const priceValidation = validatePrice(priceString); 

    if(!priceValidation) {
        form.errors.price = 'Invalid price format. Use digits and up to 2 decimal places.';
        return;
    }
    const fieldsToValidate = ['type', 'month', 'year', 'recurring'];
    for(const field of fieldsToValidate) {
        if (form[field] === '') {
            form.errors[field] = `Please select a valid ${field}.`;
        return; // Prevent form submission
        } else {
            // Clear the error message if the field is valid
            form.errors[field] = '';
        }
    }
    const priceInteger = priceMagnitude(priceString);
    const data = {
        "expense": {
            "name": form.name,
            "month": form.month,
            "year": yearInt,
            "type": form.type,
            "recurring": form.recurring,
            "price": priceInteger
        }
    }; 
    axios.post(route('api.expense.store'), data, {
        headers: {
            'Content-Type': 'application/json'
        }
    }).then(data => {
                    //update potentially?
                    window.location.href = "/expenses";
                })
                .catch(error=>{
                    console.log(error.response);
                })
}

const currentYear = () => {
    return new Date().getFullYear();
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
        <form @submit.prevent="submitForm" class="mt-6 space-y-6">
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
                    id="price"
                    type="text"
                    class="mt-1 block w-1/5"
                    v-model="form.price"
                    required
                    autofocus
                    style="text-align: right;"
                    placeholder="0.00"
                />

                <InputError class="mt-2" :message="form.errors.price" />
            </div>
            <div>
                <InputLabel
                    id="type"
                    for="type"
                    value="Type"
                />
                <!--move this into a separate component-->
                <select
                    class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm"
                    v-model="form.type"
                >
                    <option disabled value="">Please select a type</option>
                    <option value="Entertainment">Entertainment</option>
                    <option value="Investments">Investments</option>
                    <option value="Health">Health</option>
                    <option value="Home">Home</option>
                    <option value="Miscellaneous">Miscellaneous</option>
                    <option value="Savings">Savings</option>
                    <option value="Transportation">Transportation</option>
                    <option value="Utilities">Utilities</option>
                </select>
                <InputError class="mt-2" :message="form.errors.type" />
            </div>
            <div>
                <InputLabel
                    id="month"
                    for="month"
                    value="Month"
                />
                <!--move this into a separate component-->
                <select
                    class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm"
                    v-model="form.month"
                >
                    <option disabled value="">Please select a month</option>
                    <option value="January">January</option>
                    <option value="February">February</option>
                    <option value="March">March</option>
                    <option value="April">April</option>
                    <option value="May">May</option>
                    <option value="June">June</option>
                    <option value="July">July</option>
                    <option value="August">August</option>
                    <option value="September">September</option>
                    <option value="October">October</option>
                    <option value="November">November</option>
                    <option value="December">December</option>
                </select>
                <InputError class="mt-2" :message="form.errors.month" />
            </div>
            <div>
                <InputLabel
                    id="year"
                    for="year"
                    value="Year"
                />
                <!--move this into a separate component-->
                <select
                    class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm"
                    v-model="form.year"
                >
                    <option disabled value="">Please select a year</option>
                    <option :value="currentYear()">{{ currentYear() }}</option>
                </select>
                <InputError class="mt-2" :message="form.errors.year" />
            </div>
            <!--change to checkbox afterwards-->
            <div>
                <InputLabel
                    id="recurring"
                    for="recurring"
                    value="Recurring?"
                />
                <!--move this into a separate component-->
                <select
                    class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm"
                    v-model="form.recurring"
                >
                    <option disabled value="">Please select a choice</option>
                    <option value=false>No</option>
                    <option value=true>Yes</option>
                </select>
                <InputError class="mt-2" :message="form.errors.recurring" />
            </div>
            <div class="flex items-center gap-4">
                <PrimaryButton :disabled="form.processing">Save</PrimaryButton>

                <Transition
                    enter-active-class="transition ease-in-out"
                    enter-from-class="opacity-0"
                    leave-active-class="transition ease-in-out"
                    leave-to-class="opacity-0"
                >
                    <p v-if="form.recentlySuccessful" class="text-sm text-gray-600 dark:text-gray-400">Saved.</p>
                </Transition>
            </div>
        </form>
    </section>
</template>
