<template>
    <Head title="Register" />

    <OxValidationErrors class="mb-4" />

    <form @submit.prevent="submit">
        <div>
            <label for="name" class="form-label">Name</label>
            <input
                id="name"
                type="text"
                class="mt-1 form-control"
                v-model="form.name"
                required
                autofocus
                autocomplete="name"
            />
        </div>

        <div class="mt-4">
            <label for="email" class="form-label">Email</label>
            <input
                id="email"
                type="email"
                class="mt-1 form-control"
                v-model="form.email"
                required
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
            <Link :href="route('login')" class="underline text-sm text-gray-600 hover:text-gray-900">
                Already registered?
            </Link>

            <button
                type="submit"
                class="btn btn-md btn-dark ml-4"
                :class="{ 'opacity-25': form.processing }"
                :disabled="form.processing"
            >
                Register
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
                name: '',
                email: '',
                password: '',
                password_confirmation: '',
                terms: false,
            }),
        };
    },

    methods: {
        submit() {
            this.form.post(this.route('register'), {
                onFinish: () => this.form.reset('password', 'password_confirmation'),
            });
        },
    },
};
</script>
