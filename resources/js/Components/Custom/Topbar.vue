<script setup></script>
<template>
    <div class="topbar">
        <div class="flex items-center justify-center md:hidden w-16 md:w-64"><slot name="left" /></div>
        <div class="flex items-center justify-center"><slot name="center" /></div>
        <div class="flex items-center justify-center space-x-4"><slot name="right" /></div>
    </div>
</template>