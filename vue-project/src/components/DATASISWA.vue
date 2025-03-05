<template>
    <div class="overflow-x-auto">
      <table class="min-w-full border border-gray-300">
        <thead class="bg-gray-200 text-gray-700">
          <tr>
            <th class="border px-4 py-2">Nama</th>
            <th class="border px-4 py-2">Kelas</th>
            <th class="border px-4 py-2">Alamat</th>
            <th class="border px-4 py-2">Jurusan</th>
            <th class="border px-4 py-2">Ranking</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="user in users" :key="user.id" class="hover:bg-gray-100">
            <td class="border px-4 py-2">{{ user.nama }}</td>
            <td class="border px-4 py-2">{{ user.kelas }}</td>
            <td class="border px-4 py-2">{{ user.alamat }}</td>
            <td class="border px-4 py-2">{{ user.jurusan }}</td>
            <td class="border px-4 py-2">{{ user.ranking }}</td>
          </tr>
        </tbody>
      </table>
      <Pagination/>
    </div>
  </template>
  

<script>
import axios from "axios";
import Pagination from "./Pagination.vue";

export default {
    components: { Pagination },
  data() {
    return {
      users: [],
    };
  },
  mounted() {
    this.ambilData();
  },
  methods: {
    ambilData() {
      axios
        .get("http://localhost/coba-coba/php/siswa.php")
        .then((response) => {
          if (Array.isArray(response.data)) {
            this.users = response.data;
          } else {
            console.error("Data yang diterima bukan array:", response.data);
          }
        })
        .catch((error) => {
          console.error("Gagal mengambil data:", error);
        });
    },
  },
};
</script>
