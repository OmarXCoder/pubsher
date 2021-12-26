<template>
    <div class="guest-wrap">
        <slot />
    </div>
</template>

<script>
export default {};
</script>

<style lang="scss">
.guest-wrap {
    background: #eee;
    height: 100vh;
    width: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
}

.auth-form {
    width: 500px;
    padding: 24px;
    background: #fff;
    border-radius: 4px;
}
</style>