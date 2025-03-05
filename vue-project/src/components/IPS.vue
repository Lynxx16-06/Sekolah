<template>
    <div
      v-for="user in users"
      :key="user.id"
      class="bg-white shadow-xl flex gap-8 py-7 w-70"
    >
      <div class="border border-green-500 h-20 ml-3 w-0"></div>
      <div class="">
        <div class="">
          <h1 class="font-bold">{{ user.kelas }} - {{ user.jurusan }}</h1>
          <p class="">{{ user.jumlah }}</p>
          <button class="text-green-400 cursor-pointer text-xs">Lainnya</button>
        </div>
      </div>
    </div>
  </template>
  
  <script>
  import axios from "axios";
  
  export default {
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
          .get("http://localhost/coba-coba/php/ips.php")
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
  