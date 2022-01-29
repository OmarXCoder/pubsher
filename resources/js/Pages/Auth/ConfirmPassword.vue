<template>
    <Head title="Confirm Password" />

    <div class="mb-4 text-sm text-gray-600">
        This is a secure area of the application. Please confirm your password before continuing.
    </div>

    <OxValidationErrors class="mb-4" />

    <form @submit.prevent="submit">
        <div>
            <label for="password" class="form-label">Password</label>
            <input
                id="password"
                type="password"
                class="mt-1 form-control"
                v-model="form.password"
                required
                autocomplete="current-password"
                autofocus
            />
        </div>

        <div class="flex justify-end mt-4">
            <button
                type="submit"
                class="btn btn-dark"
                :class="{ 'opacity-25': form.processing }"
                :disabled="form.processing"
            >
                Confirm
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

    data() {
        return {
            form: this.$inertia.form({
                password: '',
            }),
        };
    },

    methods: {
        submit() {
            this.form.post(this.route('password.confirm'), {
                onFinish: () => this.form.reset(),
            });
        },
    },
};
</script>
