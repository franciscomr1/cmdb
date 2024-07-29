<script setup>
defineProps({
    label: String,
    required:{
        type:String,
        default:false
    }
});
</script>

<template>
    <label class="form__label">
        <div v-if="label"><span>{{ label }} </span> <span v-if="required" class="text-red-600 dark:text-red-300">*</span></div>
        <span v-else><slot /></span>
    </label>
</template>
