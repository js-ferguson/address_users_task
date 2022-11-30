import { createRouter, createWebHistory } from 'vue-router'

import Home from '../views/Home.vue'
import Signup from '../views/Signup.vue'
import Addresses from '../views/Addresses.vue'

const routes = [
  {
    path: '/',
    name: 'Home',
    component: Home,
    props: { routeName: 'home' }
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
    props: { routeName: 'signup' }
  }
]

const router = createRouter({
  history: createWebHistory(),
  routes
})

export default router
