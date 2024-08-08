<script setup>
import Dashboard from '@/Pages/Custom/Dashboard.vue';
import ResourceTable from '@/Pages/Custom/Templates/ResourceTable.vue';
defineProps({
    title: {
        type: String,
        default: "New Title",
    },
    route: {
        type: String,
        required:true
    },
    columns: {
        type: Array,
        required:true
    },
});
</script>
<template>
    <Dashboard :title="title">
        <template #content>
            <ResourceTable :title="title" :route="route" :columns="columns" >

            </ResourceTable>
        </template>
    </Dashboard>
</template>