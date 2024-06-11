import { createRouter, createWebHistory } from 'vue-router'
import UsersList from '@/components/Users/UsersList.vue'
import UserCreateForm from '@/components/Users/UserCreateForm.vue'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'users-list',
      component: UsersList,
    },
    {
      path: '/new-user',
      name: 'new-user-form',
      component: UserCreateForm,
    }
  ]
})

export default router
