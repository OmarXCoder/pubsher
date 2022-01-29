<template>
    <Head title="Reset Password" />

    <OxValidationErrors class="mb-4" />

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
                autocomplete="new-password"
            />
        </div>

        <div class="mt-4">
            <label for="password_confirmation" class="form-label">Confirm Password</label>
            <input
                id="password_confirmation"
                type="password"
                class="mt-1 form-control"
                v-model="form.password_confirmation"
                required
                autocomplete="new-password"
            />
        </div>

        <div class="flex items-center justify-end mt-4">
            <button
                type="submit"
                class="btn btn-md btn-dark"
                :class="{ 'opacity-25': form.processing }"
                :disabled="form.processing"
            >
                Reset Password
            </button>
        </div>
    </form>
</template>

<script>
import OxGuestLayout from '@/Layouts/Guest.vue';
import OxValidationErrors from '@/Components/ValidationErrors.vue';

export default {
    layout: OxGuestLayout,

    components: {
        OxValidationErrors,
    },

    props: {
        email: String,
        token: String,
    },

    data() {
        return {
            form: this.$inertia.form({
                token: this.token,
                email: this.email,
                password: '',
                password_confirmation: '',
            }),
        };
    },

    methods: {
        submit() {
            this.form.post(this.route('password.update'), {
                onFinish: () => this.form.reset('password', 'password_confirmation'),
            });
        },
    },
};
</script>
