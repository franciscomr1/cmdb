<script setup>
import { Head, Link, useForm } from '@inertiajs/vue3';
import FormCard from '@/Components/Custom/FormCard.vue';
import Logo from '@/Components/Custom/Logo.vue';
import InputLabel from '@/Components/Custom/InputLabel.vue';
import TextInput from '@/Components/Custom/TextInput.vue';
import InputError from '@/Components/Custom/InputError.vue';
import Checkbox from '@/Components/Custom/Checkbox.vue';
import FormButton from '@/Components/Custom/FormButton.vue';

defineProps({
    canResetPassword: Boolean,
    fortifyUsername: {
        type: String,
        required: true,
    },
});

const form = useForm({
    email: '',
    username: "",
    password: '',
    remember: false,
});

const submit = () => {
    form.transform(data => ({
        ...data,
        remember: form.remember ? 'on' : '',
    })).post(route('login'), {
        onFinish: () => form.reset('password'),
    });
};
</script>

<template>
 <Head title="Log in" />
    <div class="min-h-screen flex flex-col justify-center items-center px-4 sm:px-0 bg-light-bgcolor-level1 dark:bg-dark-bgcolor-level1">
        <FormCard>
            <template #header>
                <Logo class="mx-auto" />
            </template>

            <template #content>
                <form @submit.prevent="submit">
                    <div class="space-y-2">
                        <div v-if="fortifyUsername === 'email'">
                            <InputLabel for="email" label="Email"/>
                            <TextInput
                                id="email"
                                v-model="form.email"
                                type="email"
                                required="true"
                                autofocus
                                autocomplete="email"
                            />
                            <InputError :message="form.errors.email" />
                        </div>

                        <div v-else >
                            <InputLabel for="username" label="User Name"/>
                            <TextInput
                                id="username"
                                v-model="form.username"
                                type="text"
                                required="true"
                                autofocus
                                autocomplete="username"
                            />
                            <InputError :message="form.errors.username" />
                        </div>

                        <div>
                            <InputLabel for="password" label="Password" />
                            <TextInput
                                id="password"
                                v-model="form.password"
                                type="password"
                                required="true"
                                autocomplete="current-password"
                            />
                            <InputError :message="form.errors.password" />
                        </div>

                        <div class="block pb-2">
                            <label class="flex items-center">
                                <Checkbox v-model:checked="form.remember" name="remember" />
                                <span class="ms-2 text-sm text-neutral-700 dark:text-neutral-300">Remember me</span>
                            </label>
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <Link v-if="canResetPassword" :href="route('password.request')" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                Forgot your password?
                            </Link>

                            <FormButton :label="'Iniciar Sesión'" :class="{ 'opacity-25': form.processing }" :disabled="form.processing" />
                        </div>
                    </div>
                </form>
            </template>
        </FormCard>
    </div>
</template>