<script setup>
defineProps({
    type: {
        type: String,
        default: 'submit',
    },
    label: {
        type: String,
        default: 'Submit',
    },
});
</script>

<template>
    <button :type="type"
     class="w-full py-2 bg-light-button-background dark:bg-dark-button-background rounded-md text-white dark:text-neutral-900 hover:bg-light-button-hover dark:hover:bg-dark-button-hover font-medium active:bg-light-button-active dark:active:bg-dark-button-active">{{ label }}
    </button>
</template>