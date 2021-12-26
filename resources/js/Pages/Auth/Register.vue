<template>
    <Head title="Register" />

    <form class="auth-form" @submit.prevent="submit">
        <div class="text-center mb-4">
            <Link href="/" class="text-decoration-none">
                <i class="fab fa-wordpress fa-2x me-1"></i>
                <span class="fs-4">Inertia App</span>
            </Link>
        </div>
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input
                type="text"
                id="name"
                class="form-control"
                placeholder="Full Name"
                v-model="form.name"
            />
            <div v-if="form.errors.name" class="text-danger mt-2">
                {{ form.errors.name }}
            </div>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input
                type="text"
                id="email"
                class="form-control"
                placeholder="Email address"
                v-model="form.email"
            />
            <div v-if="form.errors.email" class="text-danger mt-2">
                {{ form.errors.email }}
            </div>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input
                type="password"
                id="password"
                class="form-control"
                placeholder="Password"
                v-model="form.password"
            />
            <div v-if="form.errors.password" class="text-danger mt-2">
                {{ form.errors.password }}
            </div>
        </div>
        <div class="mb-3">
            <label for="password_confirmation" class="form-label"
                >Confirm Password</label
            >
            <input
                type="password"
                id="password_confirmation"
                class="form-control"
                placeholder="Password"
                v-model="form.password_confirmation"
            />
            <div
                v-if="form.errors.password_confirmation"
                class="text-danger mt-2"
            >
                {{ form.errors.password_confirmation }}
            </div>
        </div>
        <div class="mb-3">
            <Link href="login" class="fw-lighter">
                Already have an account?
            </Link>
        </div>
        <input
            type="submit"
            value="Create account"
            class="btn btn-primary w-100"
        />
    </form>
</template>
<script>
import GuestLayout from "@/Layouts/GuestLayout.vue";
export default {
    layout: GuestLayout,
};
</script>

<script setup>
import { useForm } from "@inertiajs/inertia-vue3";

const form = useForm({
    name: "",
    email: "",
    password: "",
    password_confirmation: "",
});

const submit = () => {
    form.submit("post", "register");
};
</script>