<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import ExpenseRecord from './Partials/ExpenseRecord.vue';
import { Head, usePage } from '@inertiajs/vue3';
import { ref, defineProps } from 'vue';

const { expense } = usePage().props; // Assuming you're passing transactions from the controller

const { Expenses } = defineProps(['Expenses']);
</script>

<template>
    <Head title="Expenses" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Expenses</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">Welcome to your expenses! Here you can view
                        previously added expenses you have made.
                    </div>
                </div>
            </div>
        </div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div v-for="expense in Expenses" :key="expense.id">
                <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                    <ExpenseRecord :expense="expense" class="max-w-xl"/>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>