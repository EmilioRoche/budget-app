<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import SubmitNewExpense from './Partials/SubmitNewExpense.vue';
import { Head } from '@inertiajs/vue3';
</script>

<template>
    <Head title="Create a Expense" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Expenses</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <!--data binding of users name -->
                    <div class="p-6 text-gray-900 dark:text-gray-100">Welcome to 'Create a Expense'! Here you can add new Expense.</div>
                </div>
            </div>
        </div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <SubmitNewExpense
                    class="max-w-xl"
                />
            </div>

        </div>
    </AuthenticatedLayout>
</template>