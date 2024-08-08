<script setup>
import { ref } from "vue";
import Icon from '@/Components/Custom/Icon.vue';

const props = defineProps({
    label: {
        type: String,
        default: "New Label",
    },
    iconName: String,
});

const ishover = ref(false);
const showItems = ref(false);
</script>
<template>
    <button class="w-full" @click="showItems = !showItems">
        <div             
            @mouseover="ishover = true"
            @mouseleave="ishover = false" class="sidebar__dropdown">
            <div>
                <Icon
                    :name="iconName"
                    :size=20
                    :class="ishover ? 'color-icon-hover' : 'color-icon'"
                />
            </div>
            <span class="w-full  ">{{ label }}</span>
            <div>
                <Icon
                        :name="'ChevronUp'"
                        :size=20
                        :class="[
                            ishover ? 'color-icon-hover' : 'color-icon',
                            showItems
                                ? 'rotate-180 transition-transform transform duration-300'
                                : 'transition-transform transform duration-300',
                        ]"
                />
            </div>
        </div>
    </button>
    <transition
        enter-active-class="transition ease-out duration-200"
        enter-from-class="transform opacity-0 scale-95"
        enter-to-class="transform opacity-100 scale-100"
        leave-active-class="transition ease-in duration-75"
        leave-from-class="transform opacity-100 scale-100"
        leave-to-class="transform opacity-0 scale-95"
    >
    <div
            v-show="showItems"
            class="border-l-2 border-light-color-secondary dark:border-dark-color-neutral-secondary ml-4 space-y-2"
        >
            <slot name="content" />
        </div>
    </transition>

</template>