<script setup>
import { onMounted, ref } from 'vue';

defineProps({
    modelValue: String,
    required:{
        type:Boolean,
        default:false
    }
});

defineEmits(['update:modelValue']);

const input = ref(null);

onMounted(() => {
    if (input.value.hasAttribute('autofocus')) {
        input.value.focus();
    }
});

defineExpose({ focus: () => input.value.focus() });
</script>

<template>
    <input
        ref="input"
        class="form__input"
        :value="modelValue"
        :required="required"
        @input="$emit('update:modelValue', $event.target.value)"
    >
</template>
