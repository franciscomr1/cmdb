<script setup>
import { ref } from "vue";
import { Head } from "@inertiajs/vue3";
import Logo from "@/Components/Custom/Logo.vue";
import Topbar from "@/Components/Custom/Topbar.vue";
import Icon from "@/Components/Custom/Icon.vue";
import IconButton from "@/Components/Custom/IconButton.vue";
import Sidebar from "@/Components/Custom/Sidebar.vue";
import Dropdown from "@/Components/Custom/Dropdown.vue";
defineProps({
    title: {
        type: String,
        default: "Title",
    },
});

const showMenu = ref(false);
</script>
<template>
    <div class="h-screen flex flex-col">
        <Head :title="title" />
        <Topbar>
            <template #left>
               <IconButton @click="showMenu = !showMenu" /> 
            </template>
            <template #center>
                <Logo size="sm" />
            </template>
            <template #right>
                <Icon name="Bell" />
                <img
                src="/images/avatar.jpg"
                class="h-10 w-auto rounded-full"
                alt="avatar"
            />
            </template>
        </Topbar>

        <div class="flex-1 flex overflow-hidden">
            <Sidebar  size="3xl"    
            :class="
                    showMenu
                        ? ''
                        : 'hidden md:block'
                "             
>
                <template #content>
                    <Dropdown label="Home" icon-name="Home">
                        <template #content>
                                <h1 class="w-full ml-2 sidebar__dropdown-link">Organizacion</h1>
                                <h1 class="w-full ml-2 sidebar__dropdown-link">hola</h1>
                                <h1 class="w-full ml-2 sidebar__dropdown-link">hola</h1>
                        </template>
                    </Dropdown>
                    <Dropdown label="Home" icon-name="Home">
                        <template #content>
                                <h1 class="w-full ml-2 sidebar__dropdown-link">Organizacion</h1>
                                <h1 class="w-full ml-2 sidebar__dropdown-link">hola</h1>
                                <h1 class="w-full ml-2 sidebar__dropdown-link">hola</h1>
                        </template>
                    </Dropdown>
                    <Dropdown label="Home" icon-name="Home">
                        <template #content>
                                <h1 class="w-full ml-2 sidebar__dropdown-link">Organizacion</h1>
                                <h1 class="w-full ml-2 sidebar__dropdown-link">hola</h1>
                                <h1 class="w-full ml-2 sidebar__dropdown-link">hola</h1>
                        </template>
                    </Dropdown>
                    <Dropdown label="Home" icon-name="Home">
                        <template #content>
                                <h1 class="w-full ml-2 sidebar__dropdown-link">Organizacion</h1>
                                <h1 class="w-full ml-2 sidebar__dropdown-link">hola</h1>
                                <h1 class="w-full ml-2 sidebar__dropdown-link">hola</h1>
                        </template>
                    </Dropdown>
                    <Dropdown label="Home" icon-name="Home">
                        <template #content>
                                <h1 class="w-full ml-2 sidebar__dropdown-link">Organizacion</h1>
                                <h1 class="w-full ml-2 sidebar__dropdown-link">hola</h1>
                                <h1 class="w-full ml-2 sidebar__dropdown-link">hola</h1>
                        </template>
                    </Dropdown>
                </template>
            </Sidebar>
            <div class="flex-1 p-4 bg-light-bgcolor-level2 dark:bg-dark-bgcolor-level4 overflow-auto">
                <slot name="content" />
            </div>
        </div>
    </div>
</template>