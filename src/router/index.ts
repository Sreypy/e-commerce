import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'
import CategoryView from '@/views/CategoryView.vue' // <-- Note: There is a typo here in the original code
import ProductView from '@/views/ProductView.vue' // <-- Note: There is a typo here in the original code


const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'home',
      component: () => import("../views/HomeView.vue"),
    },
    {
      path: "/Categories/:categoryId",
      name: "Category",
      component: () => import("../views/CategoryView.vue"),
    },
    {
      path: "/products/:productId",
      name: "product",
      component: () => import("../views/ProductView.vue"),
    },
    {
      path: '/about',
      name: 'About',
      // route level code-splitting
      // this generates a separate chunk (About.[hash].js) for this route
      // which is lazy-loaded when the route is visited.
      component: () => import('../views/AboutView.vue'),
    },
  ],
})

export default router
