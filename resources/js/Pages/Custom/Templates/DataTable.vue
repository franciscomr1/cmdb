<script setup>
import { computed, onMounted, ref } from "vue";
import Search from "@/Functions/Search";
import Icon from "@/Components/Custom/Icon.vue";

const props = defineProps({
    title: {
        type: String,
        default: "New Title",
    },
    resource: {
        type: String,
        required: true,
    },
    attributes: {
        type: Object,
        required: true,
    },
    relationships: {
        type: Object,
        required: false,
    },
});

const dataReceived = ref({});

const sortBy = ref("-id");

const searchData = async () => {
    await Search(route(props.resource), sortBy.value).then((res) => {
        dataReceived.value = res.data;
    });
};

onMounted(() => {
    searchData();
});

const sort = (value) => {
    if (sortBy.value.startsWith("-")) {
        sortBy.value = sortBy.value.slice(1);
        if (value !== sortBy.value) {
            sortBy.value = value;
        }
    } else {
        if (value === sortBy.value) {
            sortBy.value = "-" + value;
        } else {
            sortBy.value = value;
        }
    }
    searchData();
};
</script>
<template>
    <div class="p-6 rounded-md bg-light-bgcolor-level1 dark:bg-dark-bgcolor-level3">
        <div class="flex items-center justify-between  py-3">


            <div class="inline-flex items-center justify-between space-x-2 w-full">
                <div class="inline-flex items-center justify-center space-x-2">
                    <div class="h-6 w-3 rounded-sm bg-blue-300"></div>
                <p class="font-medium text-lg text-light-color-neutral-primary dark:text-dark-color-neutral-primary">
                    {{ title }}
                </p>
                </div>
            </div>
        </div>
    </div>
</template>