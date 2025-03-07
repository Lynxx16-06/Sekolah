<template>
    <main class="">
        <!-- <main class="rounded-3xl bg-[url(https://images.unsplash.com/photo-1577125527890-475beedd75d3?q=80&w=2071&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D)]"> -->
            <Disclosure as="nav" class="bg-gray-800" v-slot="{ open }">
                <div class="mx-auto max-w-7xl px-5 sm:px-6 lg:px-8">
                  <div class="relative flex h-20 items-center justify-between">
                    <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
                      <!-- Mobile menu button-->
                      <DisclosureButton class="relative inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:ring-2 focus:ring-white focus:outline-hidden focus:ring-inset">
                        <span class="absolute -inset-0.5" />
                        <span class="sr-only">Open main menu</span>
                        <Bars3Icon v-if="!open" class="block size-6" aria-hidden="true" />
                        <XMarkIcon v-else class="block size-6" aria-hidden="true" />
                      </DisclosureButton>
                    </div>
                    <div class="flex flex-1 items-center justify-center sm:items-stretch sm:justify-start">
                      <div class="flex shrink-0 items-center">
                        <img class="h-10 w-20" src="../assets/img/Cuplikan layar 2025-03-07 122252_transparent_Craiyon.png" alt="Your Company" />
                      </div>
                      <div class="hidden sm:ml-6 sm:block">
                        <div class="flex space-x-4">
                          <a v-for="item in navigation" :key="item.name" :href="item.href" :class="[item.current ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white', 'rounded-md px-3 py-2 text-sm font-medium']" :aria-current="item.current ? 'page' : undefined">{{ item.name }}</a>
                        </div>
                      </div>
                    </div>
                    <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
                      <button type="button" class="relative rounded-full bg-gray-800 p-1 text-gray-400 hover:text-white focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800 focus:outline-hidden">
                        <span class="absolute -inset-1.5" />
                        <span class="sr-only">View notifications</span>
                        <BellIcon class="size-6" aria-hidden="true" />
                      </button>
                  
                      <!-- Profile dropdown -->
                      <Menu as="div" class="relative ml-3">
                        <div>
                          <MenuButton class="relative flex rounded-full bg-gray-800 text-sm focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800 focus:outline-hidden">
                            <span class="absolute -inset-1.5" />
                            <span class="sr-only">Open user menu</span>
                            <img class="size-8 rounded-full object-cover" src="../assets/img/img2.avif" alt="" />
                          </MenuButton>
                        </div>
                        <transition enter-active-class="transition ease-out duration-100" enter-from-class="transform opacity-0 scale-95" enter-to-class="transform opacity-100 scale-100" leave-active-class="transition ease-in duration-75" leave-from-class="transform opacity-100 scale-100" leave-to-class="transform opacity-0 scale-95">
                          <MenuItems class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 ring-1 shadow-lg ring-black/5 focus:outline-hidden">
                            <MenuItem v-slot="{ active }">
                              <a href="#" :class="[active ? 'bg-gray-100 outline-hidden' : '', 'block px-4 py-2 text-sm text-gray-700']">Your Profile</a>
                            </MenuItem>
                            <MenuItem v-slot="{ active }">
                              <a href="#" :class="[active ? 'bg-gray-100 outline-hidden' : '', 'block px-4 py-2 text-sm text-gray-700']">Settings</a>
                            </MenuItem>
                            <MenuItem v-slot="{ active }">
                              <a href="/loginadmin" :class="[active ? 'bg-gray-100 outline-hidden' : '', 'block px-4 py-2 text-sm text-gray-700']">Login Admin</a>
                            </MenuItem>
                            <MenuItem v-slot="{ active }">
                              <a href="#" :class="[active ? 'bg-gray-100 outline-hidden' : '', 'block px-4 py-2 text-sm text-gray-700']">Sign out</a>
                            </MenuItem>
                          </MenuItems>
                        </transition>
                      </Menu>
                    </div>
                  </div>
                </div>
            
                <DisclosurePanel class="sm:hidden">
                  <div class="space-y-1 px-2 pt-2 pb-3">
                    <DisclosureButton v-for="item in navigation" :key="item.name" as="a" :href="item.href" :class="[item.current ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white', 'block rounded-md px-3 py-2 text-base font-medium']" :aria-current="item.current ? 'page' : undefined">{{ item.name }}</DisclosureButton>
                  </div>
                </DisclosurePanel>
            </Disclosure>

      <!-- Content Utama -->
        <main class="p-10">
            <div class="relative w-full">
              <div class="overflow-hidden relative">
                <div class="flex transition-transform duration-500 ease-out" :style="{ transform: `translateX(-${currentIndex * 100}%)` }">
                  <div v-for="(image, index) in images" :key="index" class="w-full md:h-180 flex-shrink-0 rounded-3xl">
                    <img :src="image.src" :alt="image.alt" class="w-full h-64 md:h-180 rounded-3xl object-cover" />
                  </div>
                </div>
                <div class="absolute bottom-0 left-0 right-0 bg-opacity-50 text-white p-2 text-center rounded-3xl">
                  {{ images[currentIndex].caption }}
                </div>
                <button @click="prev" class="absolute left-2 top-1/2 transform -translate-y-1/2 bg-black bg-opacity-50 text-white p-2 rounded-full hover:bg-opacity-75">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                  </svg>
                </button>
                <button @click="next" class="absolute right-2 top-1/2 transform -translate-y-1/2 bg-black bg-opacity-50 text-white p-2 rounded-full hover:bg-opacity-75">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                  </svg>
                </button>
                <div class="absolute bottom-12 left-0 right-0 flex justify-center gap-2">
                  <button 
                    v-for="(_, index) in images" 
                    :key="index" 
                    @click="goToSlide(index)" 
                    class="w-3 h-3 rounded-full"
                    :class="index === currentIndex ? 'bg-white' : 'bg-white bg-opacity-50'"
                  ></button>
                </div>
              </div>
            </div>
        </main>
    <!-- </main> -->
</main>

<div class="md:absolute md:gap-40 md:p-15 md:flex bg-white md:shadow-2xl rounded-xl hidden md:left-73 md:top-230">
    <div @click="openSelected" class="bg-white md:px-5 py-2 flex md:gap-2 border rounded-lg">
        <button>Daftar Siswa</button>
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: black;"><path d="M16.293 9.293 12 13.586 7.707 9.293l-1.414 1.414L12 16.414l5.707-5.707z"></path></svg>
    </div>
    <div v-if="isSelect" class="absolute top-30 left-17 flex flex-col gap-5 bg-white shadow-2xl">
            <button class="hover:bg-blue-500 px-10 hover:text-white py-2 cursor-pointer">Kelas-10</button>
            <button class="hover:bg-blue-500 px-10 hover:text-white py-2 cursor-pointer">Kelas-11</button>
            <button class="hover:bg-blue-500 px-10 hover:text-white py-2 cursor-pointer">Kelas-12</button>
        </div>
        <div @click="openSelected2" class="bg-white px-5 py-2 flex gap-2 border rounded-lg">
            <button href="">Kegiatan</button>
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: black;"><path d="M16.293 9.293 12 13.586 7.707 9.293l-1.414 1.414L12 16.414l5.707-5.707z"></path></svg>
        </div>
        <div v-if="isSelect2" class="absolute top-30 left-89 flex flex-col gap-5 bg-white shadow-2xl">
            <div v-for="kegiatan in kegiatan" :key="kegiatan.id" class="">
                <button class="hover:bg-blue-500 px-15 inline-flex w-50 hover:text-white py-2 cursor-pointer">{{ kegiatan.name }}</button>
            </div>
        </div>
        <div @click="openSelected3" class="bg-white px-5 py-2 flex gap-2 border rounded-lg">
            <button href="">Pengetahuan</button>
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: black;"><path d="M16.293 9.293 12 13.586 7.707 9.293l-1.414 1.414L12 16.414l5.707-5.707z"></path></svg>
        </div>
        <div v-if="isSelect3" class="absolute top-30 left-165 flex flex-col gap-5 text-center bg-white shadow-2xl">
            <div v-for="pengetahuan in pengetahuan" :key="pengetahuan.id" class="">
                <button class="hover:bg-blue-500 px-15 inline-flex w-50 hover:text-white py-2 cursor-pointer">{{ pengetahuan.name }}</button>
            </div>
        </div>
        <div class="bg-white px-5 py-2 flex gap-1 items-center border rounded-lg">
            <input type="text" class="outline-none" placeholder="Cari...">
           <svg class="cursor-pointer" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: black;"><path d="M10 18a7.952 7.952 0 0 0 4.897-1.688l4.396 4.396 1.414-1.414-4.396-4.396A7.952 7.952 0 0 0 18 10c0-4.411-3.589-8-8-8s-8 3.589-8 8 3.589 8 8 8zm0-14c3.309 0 6 2.691 6 6s-2.691 6-6 6-6-2.691-6-6 2.691-6 6-6z"></path></svg>
        </div>
    </div>

    <!-- Content About-->
     <section id="about" class="hidden md:block">
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
                <h1 class="font-bold text-4xl">SMA N 2 Nusa Bangsa</h1>
                <p class="w-150 my-5 text-justify">Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio, itaque unde. At, facere provident et esse, qui perferendis obcaecati totam nisi atque eligendi quasi doloremque consequatur, voluptas quisquam iusto eius. Lorem ipsum, dolor sit amet consectetur adipisicing elit. Architecto, esse blanditiis, aspernatur magni reiciendis voluptatem voluptatibus quod repellat quas magnam nobis. Ullam iure in ut mollitia possimus optio fuga voluptatibus?</p>
                <button class="bg-blue-500 px-5 py-2 rounded-lg text-white">Selengkapnya</button>
            </div>
        </div>
        <img class="relative -top-77 left-50 w-130 h-90 translate-z-2 rotate-x-50 rotate-z-45 rounded-xl opacity-15" src="https://images.unsplash.com/photo-1625111381856-5cdedf9ae7a4?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="">
        <hr>
     </section>

     <!-- Content Kegiatan -->
     <section class="md:block mt-20" id="kegiatan">
        <div class="flex items-center ml-20">
            <div class="border border-black w-15"></div>
            <h1 class="font-bold rounded-full border inline-flex px-5 py-2 ml-3">Kegiatan</h1>
        </div>

            <div class="md:flex block gap-10 md:ml-10 md:p-0 p-3 mt-5 mb-10">
                <div class="flex flex-col gap-5">
                    <div v-for="item in content" :key="item" class="flex gap-10 items-center text-justify">
                        <img class="w-40 h-40 object-cover" :src="item.src" alt="">
                        <h1 class="font-light text-md w-80">{{ item.isi }}</h1>
                    </div>
                </div>
                <div class="flex flex-col gap-5">
                    <div v-for="item in content2" :key="item" class="flex gap-10 items-center text-justify">
                        <img class="w-40 h-40 object-cover" :src="item.src" alt="">
                        <h1 class="font-light text-md w-80">{{ item.isi }}</h1>
                    </div>
                </div>
                <div class="border border-gray-400 md:mt-0 mt-5"></div>
                <div>
                    <h1 class="my-5 text-2xl font-bold">Kegiatan Yang Akan Berlangsung</h1>
                    <div class="flex flex-col gap-5"> 
                        <div v-for="items in users" :key="items.id" class="flex gap-10 items-center cursor-pointer">
                            <input type="radio" name="" id="">
                            <h1 for="">{{ items.nama }} ({{ items.hari_jam }})</h1>
                        </div>
                    </div>
                </div>
            </div>
     </section>

     <!-- Content Kalender -->
      <section id="kalender">
          <div class="flex flex-col md:flex-row h-200 p-4 bg-gray-100" >
            <!-- Sidebar -->
            <div class="w-full md:w-1/4 p-4 bg-white shadow-lg rounded-lg mb-4 md:mb-0 md:h-190 mr-1">
              <h2 class="text-lg font-bold">{{ monthNames[currentMonth] }}</h2>
              <div class="grid grid-cols-7 gap-1 mt-4 text-center">
                <span v-for="day in days" :key="day" class="font-bold text-gray-600">{{ day }}</span>
                <button v-for="date in dates" :key="date" class="w-8 h-8 flex items-center justify-center rounded-full hover:bg-blue-300" :class="{'bg-blue-500 text-white': selectedDate === date}" @click="selectDate(date)">
                  {{ date }}
                </button>
              </div>
              <div class="mt-4">
                <h3 class="font-semibold mb-2">Today's Events</h3>
                <ul>
                  <li v-for="event in filteredEvents" :key="event.id" class="p-2 border-b text-gray-700">
                    {{ event.title }} - {{ event.time }}
                  </li>
                </ul>
              </div>
              <!-- Add Event Form -->
              <div class="mt-4">
                <h3 class="font-semibold mb-2">Add Event</h3>
                <input v-model="newEvent.title" type="text" placeholder="Event Title" class="w-full p-2 border rounded mb-2">
                <input v-model="newEvent.time" type="text" placeholder="Time (e.g. 3:00 PM)" class="w-full p-2 border rounded mb-2">
                <button @click="addEvent" class="w-full bg-blue-500 text-white p-2 rounded">Add Event</button>
              </div>
            </div>
            
            <!-- Main Calendar -->
            <div class="w-full md:w-3/4 p-4 md:h-190 bg-white shadow-lg rounded-lg">
              <div class="flex justify-between items-center">
                <button @click="prevMonth" class="px-4 py-2 bg-gray-200 rounded-lg">&lt;</button>
                <h1 class="text-2xl font-bold">{{ monthNames[currentMonth] }}</h1>
                <button @click="nextMonth" class="px-4 py-2 bg-gray-200 rounded-lg">&gt;</button>
              </div>
              <div class="grid grid-cols-7 gap-2 mt-4 text-center text-gray-600">
                <span v-for="day in days" :key="day" class="font-bold">{{ day }}</span>
                <div v-for="date in dates" :key="date" class="md:p-4 p-2 border rounded-lg h-10 md:h-24 relative text-gray-700" @click="selectDate(date)">
                  <span class="absolute top-1 left-1">{{ date }}</span>
                  <div v-for="event in events.filter(e => e.date === date && e.month === currentMonth)" :key="event.id" class="absolute bottom-1 left-1 text-xs bg-blue-500 text-white px-2 py-1 rounded">
                    {{ event.title }}
                  </div>
                </div>
              </div>
            </div>
        
            <div class="ml-1 h-190 p-4 bg-white shadow-lg rounded-lg w-full md:w-120" >
                <h3 class="text-lg font-bold mb-2">Upcoming Events</h3>
                <ul>
                  <li v-for="event in upcomingEvents" :key="event.id" class="p-5 text-gray-700 bg-blue-400 gap-10 mb-2 flex hover:bg-blue-300 cursor-pointer">
                    {{ event.title }} - {{ event.time }} ({{ monthNames[event.month] }} {{ event.date }})
                  </li>
                </ul>
              </div>
          </div>
      </section>
</template>

<script>
import Kegiatan from '../components/kegiatansiswa.vue';
import { Disclosure, DisclosureButton, DisclosurePanel, Menu, MenuButton, MenuItem, MenuItems } from '@headlessui/vue'
import { Bars3Icon, BellIcon, XMarkIcon } from '@heroicons/vue/24/outline'
import axios from 'axios';
export default {
  components : { Kegiatan, Disclosure, DisclosureButton, DisclosurePanel, Menu, MenuButton, MenuItem, MenuItems, Bars3Icon, BellIcon, XMarkIcon},
  data() {
    return {
        isSelect: '',
        isSelect2: '',
        isSelect3: '',
        currentIndex: 0,
        autoplayInterval: null,
        navbar: '',
        users: [],
        days: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],
        monthNames: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
        currentMonth: new Date().getMonth(),
        selectedDate: null,
        events: [
          { id: 1, title: 'Upacara', time: '3:00 PM', date: 2, month: 3 },
          { id: 2, title: 'Discovery Meeting', time: '10:00 AM', date: 23, month: 3 },
          { id: 3, title: 'Plan website', time: '2 hours', date: 20, month: 3 }
        ],
        newEvent: {
          title: '',
          time: ''
        },
        content: [
            {src: 'https://images.unsplash.com/photo-1605507048708-0616d21f35e5?q=80&w=2069&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D', isi: 'Bersemangatlah Menuntut Ilmu, Raih Prestasi, dan Jadilah Generasi yang Membanggakan Keluarga dan Bangsa!'},
            {src: 'https://images.unsplash.com/photo-1640480920935-c9d02c060d1d?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D', isi: 'Sekolah adalah Tempat Kami Berkarya: Berpikir Kritis, Berkreativitas, dan Membangun Jiwa Kolaborasi untuk Masa Depan Gemilang!'},
            {src: 'https://images.unsplash.com/photo-1640480920935-c9d02c060d1d?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D', isi: 'Dari Ruang Kelas ke Kehidupan Nyata: Ilmu yang Bermanfaat, Akhlak yang Mulia, dan Semangat Pantang Menyerah!'},
        ],
        content2: [
            {src: 'https://images.unsplash.com/photo-1605507048708-0616d21f35e5?q=80&w=2069&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D', isi: 'Bersemangatlah Menuntut Ilmu, Raih Prestasi, dan Jadilah Generasi yang Membanggakan Keluarga dan Bangsa!'},
            {src: 'https://images.unsplash.com/photo-1640480920935-c9d02c060d1d?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D', isi: 'Sekolah adalah Tempat Kami Berkarya: Berpikir Kritis, Berkreativitas, dan Membangun Jiwa Kolaborasi untuk Masa Depan Gemilang!'},
            {src: 'https://images.unsplash.com/photo-1640480920935-c9d02c060d1d?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D', isi: 'Dari Ruang Kelas ke Kehidupan Nyata: Ilmu yang Bermanfaat, Akhlak yang Mulia, dan Semangat Pantang Menyerah!'},
        ],
        navigation: [
            { name: 'Home', href: '#', current: true },
            { name: 'About', href: '#about', current: false },
            { name: 'Kegiatan', href: '#kegiatan', current: false },
            { name: 'Calendar', href: '#kalender', current: false },
        ],
        images: [
        {
          src: "https://images.unsplash.com/photo-1577125527890-475beedd75d3?q=80&w=2071&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D",
          alt: "Nature Image",
          caption: "Halaman Sekolah"
        },
        {
          src: "https://images.unsplash.com/photo-1605507048708-0616d21f35e5?q=80&w=2069&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D",
          alt: "City Image",
          caption: "Tempat Olahraga1"
        },
        {
          src: "https://plus.unsplash.com/premium_photo-1663050763436-818382a24bb8?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D",
          alt: "Beach Image",
          caption: "Belajar Mengajar"
        },
        {
          src: "https://images.unsplash.com/photo-1640480920935-c9d02c060d1d?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D",
          alt: "Mountain Image",
          caption: "Lapangan Futsal"
        }
      ],
        kelas: [
            {id: 1, nama: 'Kelas 10'},
            {id: 2, nama: 'Kelas 11'},
            {id: 3, nama: 'Kelas 12'},
        ],
        kegiatan: [
            {id: 1, name: 'Upacara Bendera', href:'/upacara'},
            {id: 2, name: 'Kegiatan Olahraga', href: '/olahraga'},
            {id: 2, name: 'Kegiatan Jalan Sehat', href: '/jalan'}
        ],
        pengetahuan: [
            {id: 1, name: 'MIPA', href:'/mipa'},
            {id: 2, name: 'IPS', href: '/ips'},
            {id: 2, name: 'Teknologi', href: '/teknologi'}
        ],
    }
  },
  computed: {
    dates() {
      return Array.from({ length: 30 }, (_, i) => i + 1);
    },
    filteredEvents() {
      return this.selectedDate ? this.events.filter(event => event.date === this.selectedDate && event.month === this.currentMonth) : [];
    },
    upcomingEvents() {
      return this.events.filter(event => event.month >= this.currentMonth);
    }
  },
  methods: {
    selectDate(date) {
      this.selectedDate = date;
    },
    prevMonth() {
      this.currentMonth = this.currentMonth === 0 ? 11 : this.currentMonth - 1;
    },
    nextMonth() {
      this.currentMonth = this.currentMonth === 11 ? 0 : this.currentMonth + 1;
    },
    addEvent() {
      if (this.newEvent.title && this.newEvent.time && this.selectedDate) {
        this.events.push({
          id: this.events.length + 1,
          title: this.newEvent.title,
          time: this.newEvent.time,
          date: this.selectedDate,
          month: this.currentMonth
        });
        this.newEvent.title = '';
        this.newEvent.time = '';
      }
    },
    openSelected() {
        this.isSelect = !this.isSelect;
    },
    openSelected2() {
        this.isSelect2 = !this.isSelect2;
    },
    openSelected3() {
        this.isSelect3 = !this.isSelect3;
    },
    openNavbar() {
        this.navbar = !this.navbar;
    },
    next() {
      this.currentIndex = (this.currentIndex + 1) % this.images.length;
      this.resetAutoplay();
    },
    prev() {
      this.currentIndex = (this.currentIndex - 1 + this.images.length) % this.images.length;
      this.resetAutoplay();
    },
    goToSlide(index) {
      this.currentIndex = index;
      this.resetAutoplay();
    },
    startAutoplay() {
      this.autoplayInterval = setInterval(() => {
        this.next();
      }, 3000); // Ganti slide setiap 5 detik
    },
    stopAutoplay() {
      clearInterval(this.autoplayInterval);
    },
    resetAutoplay() {
      this.stopAutoplay();
      this.startAutoplay();
    },
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
    }
  },
  mounted() {
    this.startAutoplay();
},
    beforeUnmount() {
        this.stopAutoplay();
    },
mounted() {
    this.ambildata();
}
  
}
</script>