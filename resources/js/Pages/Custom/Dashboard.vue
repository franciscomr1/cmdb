<script setup>
import AppLayout from '@/Layouts/Custom/AppLayout.vue';
defineProps({
    title: {
        type: String,
        default: "Title",
    },
});
</script>
<template>
   <AppLayout :title="title">
    <template #content>
            <div>
                <slot name="content" />
            </div>
        </template>
   </AppLayout>
</template>