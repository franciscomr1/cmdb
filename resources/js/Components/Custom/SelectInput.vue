<script setup>
import { onMounted, ref } from 'vue';

defineProps({
    data:Object,
    modelValue: String,
});

defineEmits(['update:modelValue']);


</script>

<template>
        <select :value="modelValue" @change="$emit('update:modelValue', ($event.target.value))" 
        class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
            <option v-for="(select, index) in data" :value="index">
                {{ select }}
            </option>
        </select>

</template>
