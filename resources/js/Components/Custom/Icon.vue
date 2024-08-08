<script setup>
import { computed } from "vue";
import {Bell, Menu, Home, Building, ArrowUp, Computer,ChevronUp, Star , Search} from "lucide-vue-next";

const props = defineProps({
    name: {
        type: String,
        default: "Menu",
    },
    size: Number,
    color: {
        type: String,
        default: "#737373",
    },
    strokeWidth: {
        type: Number,
        default: 2,
    },
    defaultClass: String,
});

const icons = {
    Bell, Menu, Home, Building, ArrowUp, Computer, ChevronUp, Star , Search
}
const icon = computed(() => icons[props.name] ||  Star);
</script>

<template>
    <component
        :is="icon"
        :size="size"
        :color="color"
        :stroke-width="strokeWidth"
        :default-class="defaultClass"
    />
</template>
