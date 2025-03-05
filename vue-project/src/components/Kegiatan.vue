<template>
    <main class="bg-white shadow-2xl p-10">
        <div class="overflow-x-auto">
            <table class="min-w-full border border-gray-300">
                <thead class="bg-gray-200 text-gray-700">
                    <tr>
                        <th class="border px-10 py-2">Nama Kegiatan</th>
                        <th class="border px-10 py-2">Mulai</th>
                        <th class="border px-10 py-2">Selesai</th>
                        <th class="border px-10 py-2">Keterangan</th>
                        <th class="border px-10 py-2">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="user in users" :key="user.id" class="hover:bg-gray-100">
                        <td class="border px-10 py-2">{{ user.nama }}</td>
                        <td class="border px-10 py-2">{{ user.hari_jam }}</td>
                        <td class="border px-10 py-2">{{ user.selesai }}</td>
                        <td class="border px-10 py-2">{{ user.keterangan }}</td>
                        <td class="border px-10 py-2">
                            <button @click="editData(user)" class="text-blue-600"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: aqua;"><path d="m18.988 2.012 3 3L19.701 7.3l-3-3zM8 16h3l7.287-7.287-3-3L8 13z"></path><path d="M19 19H8.158c-.026 0-.053.01-.079.01-.033 0-.066-.009-.1-.01H5V5h6.847l2-2H5c-1.103 0-2 .896-2 2v14c0 1.104.897 2 2 2h14a2 2 0 0 0 2-2v-8.668l-2 2V19z"></path></svg></button>
                            <button @click="hapusData(user.id)" class="text-red-600"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: red;"><path d="M6 7H5v13a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V7H6zm10.618-3L15 2H9L7.382 4H3v2h18V4z"></path></svg></button>
                        </td>
                    </tr>
                </tbody>
            </table>
            <Pagination/>
        </div>

        <!-- Form Edit -->
        <div v-if="isEdit" class="mt-5 p-5 bg-gray-100">
            <h2 class="text-lg font-semibold mb-3">Edit Kegiatan</h2>
            <label class="block">Nama Kegiatan</label>
            <input v-model="editUser.nama" type="text" class="border p-2 w-full mb-3" />

            <label class="block">Mulai</label>
            <input v-model="editUser.hari_jam" type="datetime-local" class="border p-2 w-full mb-3" />

            <label class="block">Selesai</label>
            <input v-model="editUser.selesai" type="datetime-local" class="border p-2 w-full mb-3" />

            <label class="block">Keterangan</label>
            <textarea v-model="editUser.keterangan" class="border p-2 w-full mb-3"></textarea>

            <button @click="simpanEdit" class="bg-blue-600 text-white px-4 py-2">Simpan</button>
            <button @click="batalEdit" class="ml-2 bg-gray-600 text-white px-4 py-2">Batal</button>
        </div>
    </main>
</template>

<script>
import axios from 'axios';
import Pagination from './Pagination.vue';

export default {
    components : { Pagination },
    data() {
        return {
            users: [],
            isEdit: false,
            editUser: {
                id: null,
                nama: '',
                hari_jam: '',
                selesai: '',
                keterangan: ''
            }
        }
    },
    mounted() {
        this.ambildata();
    },
    methods: {
        ambildata() {
            axios.get('http://localhost/coba-coba/php/kegiatan.php')
                .then(response => {
                    if (Array.isArray(response.data)) {
                        this.users = response.data;
                    } else {
                        console.error("Data yang diterima bukan array:", response.data);
                    }
                })
                .catch(error => {
                    console.error(error);
                });
        },
        editData(user) {
            this.isEdit = true;
            this.editUser = { ...user };
        },
        simpanEdit() {
            axios.post('http://localhost/coba-coba/php/api/edit_kegiatan.php', this.editUser)
                .then(() => {
                    this.ambildata();
                    this.isEdit = false;
                })
                .catch(error => {
                    console.error("Gagal menyimpan perubahan:", error);
                });
        },
        batalEdit() {
            this.isEdit = false;
        },
        hapusData(id) {
            if (confirm("Apakah Anda yakin ingin menghapus data ini?")) {
                axios.post('http://localhost/coba-coba/php/api/hapus_kegiatan.php', { id })
                    .then(() => {
                        this.ambildata();
                    })
                    .catch(error => {
                        console.error("Gagal menghapus data:", error);
                    });
            }
        }
    }
}
</script>
