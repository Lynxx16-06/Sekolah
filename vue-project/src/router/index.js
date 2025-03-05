import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/home',
      name: 'home',
      component: () => import('../views/Utama.vue'),
    },
    {
      path: '/',
      name: 'utama',
      component: HomeView,
    },
    {
      path: '/about',
      name: 'about',
      component: () => import('../views/AboutView.vue'),
    },
    {
      path: '/admin',
      name: 'admin',
      component: () => import('../views/Admin.vue'),
    },
    {
      path: '/kegiatan',
      name: 'kegiatan',
      component: () => import('../views/Kegiatan.vue'),
    },
    {
      path: '/daftarsiswa',
      name: 'daftarsiswa',
      component: () => import('../views/DaftarSiswa.vue'),
    },
    {
      path: '/kelas10',
      name: 'kelas10',
      component: () => import('../views/Kelas10.vue'),
    },
    {
      path: '/:pathWacht(.*)*',
      name: 'not-found',
      component: () => import('../views/404.vue'),
    },
  ],
})

export default router
