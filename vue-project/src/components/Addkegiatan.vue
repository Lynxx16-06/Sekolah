<template>
    <div>
        <button @click="showForm = !showForm" class="bg-blue-400 px-5 py-2 rounded-lg text-white hover:bg-blue-300 cursor-pointer">
            Tambah+
        </button>

        <div v-if="showForm" class="mt-5 p-5 border bg-gray-100 rounded-lg">
            <h3 class="mb-2 font-bold">Tambah Kegiatan</h3>
            <input v-model="kegiatan.nama" placeholder="Nama Kegiatan" class="border p-2 w-full mb-2">
            <input v-model="kegiatan.hari_jam" placeholder="Mulai (YYYY-MM-DD HH:MM:SS)" class="border p-2 w-full mb-2">
            <input v-model="kegiatan.selesai" placeholder="Selesai (YYYY-MM-DD HH:MM:SS)" class="border p-2 w-full mb-2">
            <input v-model="kegiatan.keterangan" placeholder="Keterangan" class="border p-2 w-full mb-2">
            
            <button @click="tambahData" class="bg-green-500 px-4 py-2 text-white rounded hover:bg-green-400">
                Simpan
            </button>
            <button @click="showForm = false" class="ml-2 bg-red-500 px-4 py-2 text-white rounded hover:bg-red-400">
                Batal
            </button>
        </div>
    </div>
</template>

<script>
import axios from 'axios';
import Swal from 'sweetalert2';

export default {
    data() {
        return {
            showForm: false,
            kegiatan: {
                nama: '',
                hari_jam: '',
                selesai: '',
                keterangan: ''
            }
        }
    },
    methods: {
        tambahData() {
            axios.post('http://localhost/coba-coba/php/api/tambah_kegiatan.php', this.kegiatan)
                .then(response => {
                    if (response.data.success) {
                        Swal.fire ({
                            title: 'Berhasil',
                            text: 'Data berhasil ditambahkan',
                            icon: 'success',
                            timer: 1500,
                            confirmButtonText: 'Oke'
                        })
                        
                        // Emit event ke parent dan kirim data baru
                        this.$emit("tambahKegiatan", {
                            id: response.data.id, // ID dari database
                            ...this.kegiatan
                        });

                        // Reset form
                        this.kegiatan = { nama: '', hari_jam: '', selesai: '', keterangan: '' };
                        this.showForm = false;
                    }
                })
                .catch(error => console.error("Gagal menambah data:", error));
        }
    }
}
</script>
