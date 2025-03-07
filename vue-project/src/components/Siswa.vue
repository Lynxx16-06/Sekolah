<template>
    <div class="">
        <div class="overflow-x-auto bg-white p-10 shadow-xl">
          <table class="min-w-full border border-gray-300">
            <thead class="bg-gray-200 text-gray-700">
              <tr>
                <th class="border px-4 py-2">NIS</th>
                <th class="border px-4 py-2">Nama</th>
                <th class="border px-4 py-2">Alamat</th>
                <th class="border px-4 py-2">Kelas</th>
                <th class="border px-4 py-2">Jurusan</th>
                <th class="border px-4 py-2">Wali Kelas</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="user in users" :key="user.nis" class="hover:bg-gray-100">
                <td class="border px-4 py-2">{{ user.nis }}</td>
                <td class="border px-4 py-2">{{ user.nama }}</td>
                <td class="border px-4 py-2">{{ user.alamat }}</td>
                <td class="border px-4 py-2">{{ user.kelas }}</td>
                <td class="border px-4 py-2">{{ user.jurusan }}</td>
                <td class="border px-4 py-2">{{ user.walikelas }}</td>
              </tr>
            </tbody>
          </table>
          <Pagination/>
        </div>
    </div>
</template>



<script>
import axios from 'axios';

import Pagination from './Pagination.vue';
export default {
    components: { Pagination },
    data(){
        return {
            users: [],
        }
    },
    mounted() {
      this.ambildata()  
    },
    methods: {
        ambildata() {
            axios.get('http://localhost/coba-coba/php/datasiswa.php')
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
        }
    }
}
</script>