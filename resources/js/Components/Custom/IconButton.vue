<script setup>
import { ref } from "vue";
import Icon from '@/Components/Custom/Icon.vue';

const props = defineProps({
    iconName: {
        type: String,
        default: "Menu",
    },
});
const ishover = ref(false);
</script>
<template>
    <button        
        @mouseover="ishover = true"
        @mouseleave="ishover = false"
        class="p-2 rounded-md bg-light-bgcolor-level1 hover:bg-light-bgcolor-level2 dark:bg-dark-bgcolor-level3 dark:hover:bg-dark-bgcolor-level2">
        <Icon
            :name="iconName"
            :stroke-width=2
            :class="ishover ? 'color-icon-hover' : 'color-icon'"
        />
        </button>
</template>