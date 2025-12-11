import { createRouter, createWebHistory } from 'vue-router'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'home',
      component: () => import('../views/HomeView.vue'),
    },
    {
      path: '/categories/:categoryId',
      name: 'category',
      component: () => import('../views/CategoryView.vue'),
      props: true
    },
    {
      path: '/products/:productId',
      name: 'product',
      component: () => import('../views/ProductView.vue'),
      props: true
    },
    {
      path: '/about',
      name: 'about',
      component: () => import('../views/AboutView.vue'),
    },
    {
      path: "/category/:id",
      name: "categoryDetail",
      component: () => import("@/views/CategoryView.vue"),
    },

    {
      path: "/product/:id",
      name: "productDetail",
      component: () => import("@/views/ProductView.vue"),
    },

  ],
})

export default router
