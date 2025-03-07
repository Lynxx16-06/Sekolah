<template>
    <div class="bg-white">
      <div>
        <!-- Mobile filter dialog -->
        <TransitionRoot as="template" :show="mobileFiltersOpen">
          <Dialog class="relative z-40 lg:hidden" @close="mobileFiltersOpen = false">
            <TransitionChild as="template" enter="transition-opacity ease-linear duration-300" enter-from="opacity-0" enter-to="opacity-100" leave="transition-opacity ease-linear duration-300" leave-from="opacity-100" leave-to="opacity-0">
              <div class="fixed inset-0 bg-black/25" />
            </TransitionChild>
  
            <div class="fixed inset-0 z-40 flex">
              <TransitionChild as="template" enter="transition ease-in-out duration-300 transform" enter-from="translate-x-full" enter-to="translate-x-0" leave="transition ease-in-out duration-300 transform" leave-from="translate-x-0" leave-to="translate-x-full">
                <DialogPanel class="relative ml-auto flex size-full max-w-xs flex-col overflow-y-auto bg-white py-4  shadow-xl">
                  <div class="flex items-center justify-between px-4">
                    <h2 class="text-lg font-medium text-gray-900">Filters</h2>
                    <button type="button" class="-mr-2 flex size-10 items-center justify-center rounded-md bg-white p-2 text-gray-400" @click="mobileFiltersOpen = false">
                      <span class="sr-only">Close menu</span>
                      <XMarkIcon class="size-6" aria-hidden="true" />
                    </button>
                  </div>
  
                  <!-- Filters -->
                  <form class="mt-4 border-t border-gray-200">
                    <h3 class="sr-only">Categories</h3>
                    <ul role="list" class="px-2 py-3 font-medium text-gray-900">
                      <li v-for="category in subCategories" :key="category.name">
                        <a :href="category.href" class="block px-2 py-3">{{ category.name }}</a>
                      </li>
                    </ul>
  
                    <Disclosure as="div" v-for="section in filters" :key="section.id" class="border-t border-gray-200 px-4 py-6" v-slot="{ open }">
                      <h3 class="-mx-2 -my-3 flow-root">
                        <DisclosureButton class="flex w-full items-center justify-between bg-white px-2 py-3 text-gray-400 hover:text-gray-500">
                          <span class="font-medium text-gray-900">{{ section.name }}</span>
                          <span class="ml-6 flex items-center">
                            <PlusIcon v-if="!open" class="size-5" aria-hidden="true" />
                            <MinusIcon v-else class="size-5" aria-hidden="true" />
                          </span>
                        </DisclosureButton>
                      </h3>
                      <DisclosurePanel class="pt-6">
                        <div class="space-y-6">
                          <div v-for="(option, optionIdx) in section.options" :key="option.value" class="flex gap-3">
                            <div class="flex h-5 shrink-0 items-center">
                              <div class="group grid size-4 grid-cols-1">
                                <input :id="`filter-mobile-${section.id}-${optionIdx}`" :name="`${section.id}[]`" :value="option.value" type="checkbox" class="col-start-1 row-start-1 appearance-none rounded-sm border border-gray-300 bg-white checked:border-indigo-600 checked:bg-indigo-600 indeterminate:border-indigo-600 indeterminate:bg-indigo-600 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 disabled:border-gray-300 disabled:bg-gray-100 disabled:checked:bg-gray-100 forced-colors:appearance-auto" />
                                <svg class="pointer-events-none col-start-1 row-start-1 size-3.5 self-center justify-self-center stroke-white group-has-disabled:stroke-gray-950/25" viewBox="0 0 14 14" fill="none">
                                  <path class="opacity-0 group-has-checked:opacity-100" d="M3 8L6 11L11 3.5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                  <path class="opacity-0 group-has-indeterminate:opacity-100" d="M3 7H11" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                              </div>
                            </div>
                            <label :for="`filter-mobile-${section.id}-${optionIdx}`" class="min-w-0 flex-1 text-gray-500">{{ option.label }}</label>
                          </div>
                        </div>
                      </DisclosurePanel>
                    </Disclosure>
                  </form>
                </DialogPanel>
              </TransitionChild>
            </div>
          </Dialog>
        </TransitionRoot>
  
        <main class="w-full px-4 sm:px-6 lg:px-8">
          <div class="flex items-baseline justify-between border-b border-gray-200 pt-10 pb-10">
            <h1 class="text-4xl font-bold tracking-tight text-gray-900">Admin Dashboard</h1>
  
            <div class="flex items-center">
              <Menu as="div" class="relative inline-block text-left">
                <div class="flex gap-10 items-center">
                    <div class="md:flex hidden ">
                        <div class="absolute left-2 top-1.5">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: black;"><path d="M10 18a7.952 7.952 0 0 0 4.897-1.688l4.396 4.396 1.414-1.414-4.396-4.396A7.952 7.952 0 0 0 18 10c0-4.411-3.589-8-8-8s-8 3.589-8 8 3.589 8 8 8zm0-14c3.309 0 6 2.691 6 6s-2.691 6-6 6-6-2.691-6-6 2.691-6 6-6z"></path></svg>
                        </div>
                        <input type="text" name="" id="" class="px-10 py-1 outline-0 border rounded-full" placeholder="Cari..">
                    </div>
                  <MenuButton class="group inline-flex justify-center text-sm font-medium text-gray-700 hover:text-gray-900">
                    Sort
                    <ChevronDownIcon class="-mr-1 ml-1 size-5 shrink-0 text-gray-400 group-hover:text-gray-500" aria-hidden="true" />
                  </MenuButton>
                </div>
  
                <transition enter-active-class="transition ease-out duration-100" enter-from-class="transform opacity-0 scale-95" enter-to-class="transform opacity-100 scale-100" leave-active-class="transition ease-in duration-75" leave-from-class="transform opacity-100 scale-100" leave-to-class="transform opacity-0 scale-95">
                  <MenuItems class="absolute right-0 z-10 mt-2 w-40 origin-top-right rounded-md bg-white ring-1 shadow-2xl ring-black/5 focus:outline-hidden">
                    <div class="py-1">
                      <MenuItem v-for="option in sortOptions" :key="option.name" v-slot="{ active }">
                        <a :href="option.href" :class="[option.current ? 'font-medium text-gray-900' : 'text-gray-500', active ? 'bg-gray-100 outline-hidden' : '', 'block px-4 py-2 text-sm']">{{ option.name }}</a>
                      </MenuItem>
                    </div>
                  </MenuItems>
                </transition>
              </Menu>
  
              <button type="button" class="-m-2 ml-5 p-2 text-gray-400 hover:text-gray-500 sm:ml-7">
                <span class="sr-only">View grid</span>
                <Squares2X2Icon class="size-5" aria-hidden="true" />
              </button>
              <button type="button" class="-m-2 ml-4 p-2 text-gray-400 hover:text-gray-500 sm:ml-6 lg:hidden" @click="mobileFiltersOpen = true">
                <span class="sr-only">Filters</span>
                <FunnelIcon class="size-5" aria-hidden="true" />
              </button>
            </div>
          </div>
  
          <section aria-labelledby="products-heading" class="pt-6 ">
            <h2 id="products-heading" class="sr-only">Products</h2>
  
            <div class="grid grid-cols-1 gap-x-8 gap-y-10 lg:grid-cols-4">
              <!-- Filters -->
              <form class="hidden lg:block">
                <h3 class="sr-only">Categories</h3>
                <ul role="list" class="space-y-4 border-b border-gray-200 pb-6 text-sm font-medium text-gray-900">
                  <li v-for="category in subCategories" :key="category.name">
                    <a :href="category.href">{{ category.name }}</a>
                  </li>
                </ul>
  
                <Disclosure as="div" v-for="section in filters" :key="section.id" class="border-b border-gray-200 py-6" v-slot="{ open }">
                  <h3 class="-my-3 flow-root">
                    <DisclosureButton class="flex w-full items-center justify-between bg-white py-3 text-sm text-gray-400 hover:text-gray-500">
                      <span class="font-medium text-gray-900">{{ section.name }}</span>
                      <span class="ml-6 flex items-center">
                        <PlusIcon v-if="!open" class="size-5" aria-hidden="true" />
                        <MinusIcon v-else class="size-5" aria-hidden="true" />
                      </span>
                    </DisclosureButton>
                  </h3>
                  <DisclosurePanel class="pt-6">
                    <div class="space-y-4">
                      <div v-for="(option, optionIdx) in section.options" :key="option.value" class="flex gap-3">
                        <div class="flex h-5 shrink-0 items-center">
                          <div class="group grid size-4 grid-cols-1">
                            <input :id="`filter-${section.id}-${optionIdx}`" :name="`${section.id}[]`" :value="option.value" type="checkbox" :checked="option.checked" class="col-start-1 row-start-1 appearance-none rounded-sm border border-gray-300 bg-white checked:border-indigo-600 checked:bg-indigo-600 indeterminate:border-indigo-600 indeterminate:bg-indigo-600 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 disabled:border-gray-300 disabled:bg-gray-100 disabled:checked:bg-gray-100 forced-colors:appearance-auto" />
                            <svg class="pointer-events-none col-start-1 row-start-1 size-3.5 self-center justify-self-center stroke-white group-has-disabled:stroke-gray-950/25" viewBox="0 0 14 14" fill="none">
                              <path class="opacity-0 group-has-checked:opacity-100" d="M3 8L6 11L11 3.5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                              <path class="opacity-0 group-has-indeterminate:opacity-100" d="M3 7H11" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                          </div>
                        </div>
                        <a :href="option.href" :for="`filter-${section.id}-${optionIdx}`" class="text-sm text-gray-600">{{ option.label }}</a>
                      </div>
                    </div>
                  </DisclosurePanel>
                </Disclosure>
                <div class="absolute bottom-5">
                    <a href="/" class="bg-blue-400 px-5 py-2 rounded-lg text-white">Kembali</a>
                </div>
              </form>
  
              <!-- Product grid -->
              <div class="lg:col-span-3">
                <main class="flex gap-5">
                  <IPA />
                </main>
                <!-- IPS -->
                <main class="my-5 flex gap-5">
                  <IPS />
                </main>
                <main>
                  <DATASISWA />
                </main>
              </div>
            </div>
          </section>
        </main>
      </div>
    </div>

  </template>
  
  <script>
import { ref } from 'vue'
import {
  Dialog,
  DialogPanel,
  Disclosure,
  DisclosureButton,
  DisclosurePanel,
  Menu,
  MenuButton,
  MenuItem,
  MenuItems,
  TransitionChild,
  TransitionRoot,
} from '@headlessui/vue'
import { XMarkIcon } from '@heroicons/vue/24/outline'
import { ChevronDownIcon, FunnelIcon, MinusIcon, PlusIcon, Squares2X2Icon } from '@heroicons/vue/20/solid'
import DATASISWA from '../components/DATASISWA.vue'
import IPA from '../components/IPA.vue'
import IPS from '../components/IPS.vue'

export default {
  components: {
    Dialog,
    DialogPanel,
    Disclosure,
    DisclosureButton,
    DisclosurePanel,
    Menu,
    MenuButton,
    MenuItem,
    MenuItems,
    TransitionChild,
    TransitionRoot,
    XMarkIcon,
    ChevronDownIcon,
    FunnelIcon,
    MinusIcon,
    PlusIcon,
    Squares2X2Icon,
    DATASISWA,
    IPA,
    IPS,
  },
  data() {
    return {
      users: [],
      sortOptions: [
        { name: 'Most Popular', href: '#', current: true },
        { name: 'Best Rating', href: '#', current: false },
        { name: 'Newest', href: '#', current: false },
        { name: 'Price: Low to High', href: '#', current: false },
        { name: 'Price: High to Low', href: '#', current: false },
      ],
      subCategories: [
        { name: 'Dashboard', href: '/admin' },
        { name: 'Add Kegiatan', href: '/kegiatan' },
        { name: 'Daftar Siswa', href: '/daftarsiswa' },
        { name: 'Daftar Guru', href: '#' },
      ],
      filters: [
        {
          id: 'color',
          name: 'Jurusan',
          options: [
            { value: 'mipa', label: 'MIPA', checked: false, href: '/' },
            { value: 'ips', label: 'IPS', checked: false, href: '#' },
            { value: 'sains', label: 'SAINS & TEKNOLOGI', checked: false, href: '#' },
          ],
        },
        {
          id: 'category',
          name: 'Kegiatan',
          options: [
            { value: 'new-arrivals', label: 'Lomba 17an', checked: false, href: '#' },
            { value: 'sale', label: 'Pesantren Kilat', checked: false, href: '#' },
            { value: 'travel', label: 'Upacara Bendera', checked: false, href: '#' },
            { value: 'organization', label: 'Extrakulikuler', checked: false, href: '#' },
          ],
        },
        {
          id: 'size',
          name: 'Daftar Siswa',
          options: [
            { value: 'kelas-10', label: 'Kelas-10', checked: false, href: '#' },
            { value: 'kelas-11', label: 'Kelas-11', checked: false, href: '#' },
            { value: 'kelas-12', label: 'Kelas-12', checked: false, href: '#' },
          ],
        },
      ],
      mobileFiltersOpen: false,
    }
  },

}
</script>
