<script setup></script>
<template>
    <div class="form">
        <slot name="header" />
        <div class="space-y-2">
            <slot name="content" />
        </div>
    </div>
</template>