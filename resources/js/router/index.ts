import { createRouter, createWebHistory } from 'vue-router'

import Home from '../views/Home.vue'
import Signup from '../views/Signup.vue'
import Addresses from '../views/Addresses.vue'

const routes = [
  {
    path: '/',
    name: 'Home',
    component: Home,
    props: { routeName: 'home' },
    meta: { requiresGuest: true }
  },
  {
    path: '/signup',
    name: 'Signup',
    component: Signup,
    props: { routeName: 'signup' }
  },
  {
    path: '/addresses',
    name: 'Addresses',
    component: Addresses,
    props: { routeName: 'Addresses' },
    meta: { requiresAuth: true }
  }
]

const router = createRouter({
  history: createWebHistory(),
  routes
})

router.beforeEach((to, from) => {
  const authenticated = localStorage.getItem('authenticated')

  if (to.meta.requiresGuest && authenticated) {
    console.log('top', authenticated)
    return {
      name: 'Addresses'
    }
  } else if (to.meta.requiresAuth && !authenticated) {
    console.log('bottom', authenticated)
    return {
      name: 'Home'
    }
  }
})

export default router
