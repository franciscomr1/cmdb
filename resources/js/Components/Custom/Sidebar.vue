<script setup>
import { computed } from "vue";
const props = defineProps({
    size: {
        type: String,
        default: "md",
    },
});
const width = {
    xs: "w-16",
    sm: "w-24",
    md: "w-32",
    lg: "w-40",
    xl: "w-48",
    "2xl": "w-56",
    "3xl": "w-64",
    "4xl": "w-72",
    "5xl": "w-80",
    "6xl": "w-96",
};

const widthSize = computed(() => width[props.size] || "48");
</script>
<template>
    <div class="z-50 h-full bg-light-bgcolor-level1 dark:bg-dark-bgcolor-level3 fixed md:static overflow-auto"
    :class="widthSize">
        <nav class="px-4 space-y-3 py-6">
            <slot name="content" />
        </nav>
    </div>
</template>