<template>
    <div class="flex justify-center mt-50">
        <div class="bg-white w-130 shadow-2xl p-10">
            <h1 class="font-bold text-3xl my-5 text-center">Login Admin</h1>
            <form @submit.prevent="login" class="flex flex-col" method="post">
                <label class="text-lg">Username</label>
                <input type="text" v-model="username" placeholder="Nama" required class="p-3 outline-none border rounded-lg"/>
                
                <label class="text-lg mt-4">Password</label>
                <input type="password" v-model="pass" placeholder="Password" required class="p-3 outline-none border rounded-lg"/>
                
                <div class="flex flex-col items-center justify-center mt-5">
                    <button type="submit" class="bg-blue-400 p-3 text-white rounded-lg my-3 w-full cursor-pointer">Login</button>
                </div>
            </form>
        </div>
    </div>

    <div class="absolute bottom-5 ml-5 bg-blue-400 text-white px-5 py-2 rounded-lg cursor-pointer">
        <a href="/">Kembali</a>
    </div>
</template>

<script>
import axios from "axios";
import Swal from "sweetalert2";
export default {
    data() {
        return {
            username: "",
            pass: ""
        };
    },
    methods: {
        async login() {
            try {
                console.log("Mengirim data:", { username: this.username, pass: this.pass });

                const response = await axios.post(
                    "http://localhost/coba-coba/php/admin/admin.php",
                    { username: this.username, pass: this.pass },
                    { headers: { "Content-Type": "application/json" } }
                );

                console.log("Response dari server:", response.data);

                if (response.data.success) {
                    Swal.fire({
                        title: "Berhasil!",
                        text: 'Login Berhasil',
                        icon: "success",
                        confirmButtonText: "OK"
                    }).then(() => {
                        localStorage.setItem("isAdmin", JSON.stringify(true));
                        this.$router.push("/admin");
                    });
                } else {
                    Swal.fire({
                        title: "Gagal!",
                        text: response.data.message,
                        icon: "error",
                        confirmButtonText: "Coba Lagi"
                    });
                }
            } catch (error) {
                console.error("Login gagal:", error);
                Swal.fire({
                    title: "Error!",
                    text: "Terjadi kesalahan saat login!",
                    icon: "error",
                    confirmButtonText: "OK"
                });
            }
        }
    }
};
</script>
