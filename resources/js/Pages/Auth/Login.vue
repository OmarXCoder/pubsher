<template>
    <Head title="Log in" />

    <OxValidationErrors class="mb-4" />

    <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
        {{ status }}
    </div>

    <form @submit.prevent="submit">
        <div>
            <label for="email" class="form-label">Email</label>
            <input
                id="email"
                type="email"
                class="mt-1 form-control"
                v-model="form.email"
                required
                autofocus
                autocomplete="username"
            />
        </div>

        <div class="mt-4">
            <label for="password" class="form-label">Password</label>
            <input
                id="password"
                type="password"
                class="mt-1 form-control"
                v-model="form.password"
                required
                autocomplete="current-password"
            />
        </div>

        <div class="block mt-4">
            <label class="flex items-center">
                <OxCheckbox name="remember" v-model:checked="form.remember" />
                <span class="ml-2 text-sm text-gray-600">Remember me</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            <Link
                v-if="canResetPassword"
                :href="route('password.request')"
                class="underline text-sm text-gray-600 hover:text-gray-900"
            >
                Forgot your password?
            </Link>

            <button
                type="submit"
                class="btn btn-md btn-dark ml-4"
                :class="{ 'opacity-25': form.processing }"
                :disabled="form.processing"
            >
                Log in
            </button>
        </div>
    </form>
</template>

<script>
import OxCheckbox from '@/Components/OxCheckbox.vue';
import OxGuestLayout from '@/Layouts/Guest.vue';
import OxValidationErrors from '@/Components/ValidationErrors.vue';

export default {
    layout: OxGuestLayout,

    components: {
        OxCheckbox,
        OxValidationErrors,
    },

    props: {
        canResetPassword: Boolean,
        status: String,
    },

    data() {
        return {
            form: this.$inertia.form({
                email: '',
                password: '',
                remember: false,
            }),
        };
    },

    methods: {
        submit() {
            this.form.post(this.route('login'), {
                onFinish: () => this.form.reset('password'),
            });
        },
    },
};
</script>
