<template>
    <Head title="Forgot Password" />

    <div class="mb-4 text-sm text-gray-600">
        Forgot your password? No problem. Just let us know your email address and we will email you a password reset
        link that will allow you to choose a new one.
    </div>

    <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
        {{ status }}
    </div>

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

        <div class="flex items-center justify-end mt-4">
            <button
                type="submit"
                class="btn btn-md btn-dark"
                :class="{ 'opacity-25': form.processing }"
                :disabled="form.processing"
            >
                Email Password Reset Link
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
        status: String,
    },

    data() {
        return {
            form: this.$inertia.form({
                email: '',
            }),
        };
    },

    methods: {
        submit() {
            this.form.post(this.route('password.email'));
        },
    },
};
</script>
