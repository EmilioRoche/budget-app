<script setup>
import {useForm} from '@inertiajs/vue3';
import { defineProps } from 'vue';

const { expense } = defineProps(['expense']);
</script>

<template>
    <div>
      <h3>{{ expense.name }}</h3>
    </div>
</template>