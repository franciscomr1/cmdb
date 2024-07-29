<script setup>
defineProps({
    message: String,
});
</script>

<template>
    <div  class="h-4">
        <p v-show="message" class="form__error">
            {{ message }}
        </p>
    </div>
</template>
