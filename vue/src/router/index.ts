import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'
import CreateFile from '../views/CreateFile.vue'
import ViewDocument from '../views/ViewDocument.vue'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'home',
      component: HomeView
    },
    {
      path: '/create',
      name: 'createFile',
      component: CreateFile
    },
    {
      path: '/document/:id',
      name: 'viewDocument',
      component: ViewDocument
    }
  ]
})

export default router
