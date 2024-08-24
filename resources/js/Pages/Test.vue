<script setup>
import { onMounted, ref } from 'vue';
import { Head, Link, useForm } from '@inertiajs/vue3';
import AuthenticationCard from '@/Components/AuthenticationCard.vue';
import AuthenticationCardLogo from '@/Components/AuthenticationCardLogo.vue';
import Checkbox from '@/Components/Checkbox.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import AppLayout from '@/Layouts/AppLayout.vue';

const props = defineProps({
    title:{
        type: String,
    },
    resource:{
        type: String,
    },
    fieldPropierties :{
        type: Object
    },
    formFields :{
        type: Object
    }
});

const form = useForm(
    props.formFields
);
 const isNewRcord = ref(true);

onMounted(() => {
    if(route().current() === props.resource + '.create'){
        isNewRcord.value = true;
    } else if(route().current() === props.resource + '.edit'){
        isNewRcord.value = false;
    }
});

const submit = () => {
    if (route().current() === props.resource + '.create') {
        form.post(route('companies.store'));
    } else if(route().current() === props.resource + '.edit'){
       form.patch(route('companies.update',route().params.id))
    }
};

</script>

<template>
    <AppLayout title="Profile">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ title }}
            </h2>
        </template>
        <AuthenticationCard>
        <template #logo>
            <AuthenticationCardLogo />
        </template>
        <div v-if="$page.props.flash.message" class="alert">
        {{ $page.props.flash.message }}
      </div>
      
      <form @submit.prevent="submit">
          <div v-for="field in fieldPropierties">
              <InputLabel :for="field.id" :value="field.label" />
              <TextInput
                  :id="field.id"
                  v-model="form[field.id]"
                  type="text"
                  class="mt-1 block w-full"
                  required
              />
              <InputError class="mt-2" :message="form.errors[field.id]" />
          </div>

          <div class="flex items-center justify-end mt-4">
              <PrimaryButton class="ms-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                  <span v-if="isNewRcord">Create</span>
                  <span v-else>update</span>
              </PrimaryButton>
          </div>
      </form>
    
    </AuthenticationCard>
    </AppLayout>
</template>