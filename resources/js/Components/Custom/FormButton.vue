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
     class="form__button">{{ label }}
    </button>
</template>