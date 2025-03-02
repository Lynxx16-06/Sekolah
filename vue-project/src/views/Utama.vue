<template>
    <form action="" @submit.prevent="submit" class="bg-white shadow-2xl rounded-lg w-100 flex flex-col">
        <div class="flex flex-col">
            <label for="">Username</label>
            <input type="text" placeholder="Enter your name">
        </div>
        <div class="flex flex-col">
            <label for="">Password</label>
            <input type="password" placeholder="Enter your password">
        </div>
        <button type="submit" @click="login">Login</button>
        <div>
            <a href="">Buat akun?</a>
            <a href="" class="text-blue-500">Buat akun</a>
        </div>
    </form>
</template>

<script>
    export default {
        data() {
            return {
                username: '',
                password: '',
            }
        },
        methods: {
            login() {
                alert('Login button clicked');
            }
        }
    }
</script>