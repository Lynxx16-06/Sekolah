<template>
    <div>
      <h1>Daftar Pengguna</h1>
      
      <form @submit.prevent="tambahPengguna">
        <input type="text" v-model="nama" placeholder="Nama" required />
        <input type="email" v-model="email" placeholder="Email" required />
        <input type="password" v-model="pw" placeholder="Password" required />
        <button type="submit">Tambah</button>
      </form>
  
      <ul>
        <li v-for="user in users" :key="user.id">
          {{ user.nama }} - {{ user.email }} - <strong>{{ user.pw }}</strong>
          <button @click="hapusPengguna(user.id)">Hapus</button>
        </li>
      </ul>
    </div>
  </template>
  
  <script>
  import axios from "axios";
  
  export default {
    data() {
      return {
        users: [],
        nama: "",
        email: "",
        pw: ""
      };
    },
    mounted() {
      this.ambilData();
    },
    methods: {
      ambilData() {
        axios.get("http://localhost/coba-coba/php/data.php")
          .then(response => {
            this.users = response.data;
          })
          .catch(error => {
            console.error("Gagal mengambil data:", error);
          });
      },
      tambahPengguna() {
        axios.post("http://localhost/coba-coba/php/data.php", {
          nama: this.nama,
          email: this.email,
          pw: this.pw
        })
        .then(response => {
          alert(response.data.success || response.data.error);
          this.ambilData(); // Refresh data setelah tambah
        })
        .catch(error => {
          console.error("Gagal menambah data:", error);
        });
      },
      hapusPengguna(id) {
        if (confirm("Yakin ingin menghapus pengguna ini?")) {
          axios.delete(`http://localhost/coba-coba/php/data.php?id=${id}`)
          .then(response => {
            alert(response.data.success || response.data.error);
            this.ambilData(); // Refresh data setelah hapus
          })
          .catch(error => {
            console.error("Gagal menghapus data:", error);
          });
        }
      }
    }
  };
  </script>
  