<template>
        <header class="md:flex bg-blue-400 md:items-center hidden text-white md:justify-around md:p-5 w-full">
            <h1 class="font-bold text-4xl">Sekolah</h1>
            <div class="flex gap-10">
                <div class="font-normal flex gap-20 w-full">
                    <a href="/">Home</a>
                    <a href="#about">About</a>
                    <a href="#kegiatan">Kegiatan</a>
                    <a href="/contact">Contact</a>
                </div>
            </div>
            <div>
                <a href="/admin" class="bg-blue-600 px-5 py-2 rounded-xl hover:bg-blue-400 transition-all duration-300">Admin</a>
            </div>
        </header>
    
        <!-- PHONE -->
         <header>
            <div class="flex justify-between items-center p-3 md:hidden bg-blue-400">
                <h1 class="font-bold text-3xl md:hidden">Sekolah</h1>
                <button id="navbar">
                    <svg class="md:hidden" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: black;"><path d="M4 6h16v2H4zm0 5h16v2H4zm0 5h16v2H4z"></path></svg>
                </button>
            </div>
         </header>
        
           <!-- Content Utama -->
    <main>
        <div class="text-center my-93">
            <h1 class="font-bold text-7xl my-4">LynxxDev</h1>
            <p class="text-xl my-3 font-light">Hai Kembali lagi bersama saya</p>
            <button onclick="window.location.href = '' " class="bg-blue-500 px-5 py-2 text-white rounded-xl cursor-pointer">Explore</button>
        </div>
        <hr>
    </main>
    
    <div class="md:absolute md:gap-40 md:p-15 md:flex bg-white md:shadow-2xl hidden rounded-xl md:left-73 md:top-230">
        <div class="bg-white px-5 py-2 flex gap-2 border rounded-lg">
            <a href="">Daftar Siswa</a>
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: black;"><path d="M16.293 9.293 12 13.586 7.707 9.293l-1.414 1.414L12 16.414l5.707-5.707z"></path></svg>
        </div>
        <div class="bg-white px-5 py-2 flex gap-2 border rounded-lg">
            <a href="">Kegiatan</a>
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: black;"><path d="M16.293 9.293 12 13.586 7.707 9.293l-1.414 1.414L12 16.414l5.707-5.707z"></path></svg>
        </div>
        <div class="bg-white px-5 py-2 flex gap-2 border rounded-lg">
            <a href="">Pengetahuan</a>
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: black;"><path d="M16.293 9.293 12 13.586 7.707 9.293l-1.414 1.414L12 16.414l5.707-5.707z"></path></svg>
        </div>
        <div class="bg-white px-5 py-2 flex gap-1 items-center border rounded-lg">
           <input type="text" class="outline-none" placeholder="Cari...">
           <svg class="cursor-pointer" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: black;"><path d="M10 18a7.952 7.952 0 0 0 4.897-1.688l4.396 4.396 1.414-1.414-4.396-4.396A7.952 7.952 0 0 0 18 10c0-4.411-3.589-8-8-8s-8 3.589-8 8 3.589 8 8 8zm0-14c3.309 0 6 2.691 6 6s-2.691 6-6 6-6-2.691-6-6 2.691-6 6-6z"></path></svg>
        </div>
    </div>

    <!-- Content About-->
     <section id="about">
        <div class="mt-100">
            <div class="flex items-center ml-20">
                <div class="border border-black w-15"></div>
                <h1 class="font-bold rounded-full border inline-flex px-5 py-2 ml-3">About</h1>
            </div>
            <div class="flex flex-col gap-10 justify-center">
                <div class="flex justify-center">
                    <div class="flex justify-around w-150">
                        <p>Tentang Sekolah</p>
                        <p>Deskripsi Sekolah</p>
                        <p>Akreditasi Sekolah</p>
                    </div>
                </div>
                <form action="" class="flex justify-center -ml-55">
                    <div class="flex justify-around w-150">
                        <div class="items-center flex">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" style="fill: black;"><path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2z"></path></svg>
                            <div class="border border-gray-500 w-45"></div>
                            <input class="size-4" type="radio" name="" id="">
                            <div class="border border-gray-500 w-45"></div>
                        </div>
                        <div class="items-center flex">
                            <input class="size-4" type="radio" name="" id="">
                            <div class="border border-gray-500 w-45"></div>
                        </div>
                        <div class="items-center flex">
                            <input class="size-4" type="radio" name="" id="">
                            <div class="border border-gray-500 w-45"></div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" style="fill: black;"><path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2z"></path></svg>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="flex justify-around mt-50 items-center">
            <div class="">
                <img class="w-130 h-90 translate-z-2 rotate-x-50 rotate-z-45 rounded-xl translate-2 backdrop-blur-3xl" src="https://images.unsplash.com/photo-1625111381856-5cdedf9ae7a4?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="">
            </div>
            <div>
                <p class="w-150 my-5 text-justify">Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio, itaque unde. At, facere provident et esse, qui perferendis obcaecati totam nisi atque eligendi quasi doloremque consequatur, voluptas quisquam iusto eius. Lorem ipsum, dolor sit amet consectetur adipisicing elit. Architecto, esse blanditiis, aspernatur magni reiciendis voluptatem voluptatibus quod repellat quas magnam nobis. Ullam iure in ut mollitia possimus optio fuga voluptatibus?</p>
                <button class="bg-blue-500 px-5 py-2 rounded-lg text-white">Selengkapnya</button>
            </div>
        </div>
        <img class="relative -top-77 left-50 w-130 h-90 translate-z-2 rotate-x-50 rotate-z-45 rounded-xl opacity-15" src="https://images.unsplash.com/photo-1625111381856-5cdedf9ae7a4?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="">
     </section>

     <section>
        <div class="flex items-center justify-center gap-30">
            <div>
                <p class="w-150 text-justify">Lorem ipsum dolor sit amet consectetur adipisicing elit. Autem ex ducimus hic possimus excepturi consequatur deserunt error voluptates totam quia, vel maxime laborum fuga animi? Exercitationem quae animi quo quos. Lorem ipsum dolor sit amet consectetur, adipisicing elit. Commodi illo saepe cum, officiis, libero ipsam modi inventore sequi eius fugit enim numquam error eos accusantium, nemo vitae. Veritatis, ipsam voluptatibus!</p>
                <button>Lihat</button>
            </div>
            <div>
                <div class="flex gap-10">
                    <div class="">
                        <img class="w-90 h-70 object-cover" src="https://images.unsplash.com/photo-1625111381887-458fce74a923?q=80&w=2071&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="">
                        <p class="w-90 text-justify">Lorem ipsum dolor sit amet consectetur adipisicing elit. Placeat, sint odit aperiam adipisci maiores impedit quasi ratione, autem ullam saepe delectus similique labore voluptatem, consequuntur commodi. Accusamus quaerat ipsam fugit!</p>
                        <button>Lainnya</button>
                    </div>
                    <div>
                        <img class="w-90 h-70 object-cover" src="https://images.unsplash.com/photo-1663247455965-b63fa4048b29?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="">
                        <p class="w-90 text-justify">Lorem ipsum dolor sit amet consectetur adipisicing elit. Placeat, sint odit aperiam adipisci maiores impedit quasi ratione, autem ullam saepe delectus similique labore voluptatem, consequuntur commodi. Accusamus quaerat ipsam fugit!</p>
                        <button>Lainnya</button>
                    </div>
                </div>
            </div>
        </div>
     </section>
</template>
    
<script>
import CRUD from '../components/CRUD.vue'
export default {
  components : { CRUD },
  data() {
    return {

    }
  }
}
</script>