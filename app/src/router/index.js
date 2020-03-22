import Vue from 'vue'
import VueRouter from 'vue-router'

import Home from '../views/Home.vue'
import Portfolios from '../views/Portfolios.vue'
import PersonalDetails from '../views/PersonalDetails.vue'
import ProjectsTab from '../views/ProjectsTab.vue'

Vue.use(VueRouter)

const routes = [
  {
    path: '/',
    name: 'Home',
    component: Home
  },
  {
    path: '/admin',
    name: 'Admin',
    // route level code-splitting
    // this generates a separate chunk (about.[hash].js) for this route
    // which is lazy-loaded when the route is visited.
    component: () => import(/* webpackChunkName: "about" */ '../views/Admin.vue'),

    children:[
      {
        path: 'portfolios',
        component: Portfolios
      },
      {
        path: 'personaldetails',
        component: PersonalDetails
      },
      {
        path: 'projects',
        component: ProjectsTab
      }
    ]
  },
  {
    path: '/login',
    name: 'Login',
    component: () => import('../views/Login.vue')
  },
  {
    path: '/register',
    name: 'Register',
    component: () => import('../views/Register.vue')
  },
  {
    path: '/view/:username',
    name: 'View',
    component: () => import('../views/Portfolio/PortfolioTemplate.vue')
  }
]

const router = new VueRouter({
  mode: 'history',
  base: process.env.BASE_URL,
  routes
})

export default router
