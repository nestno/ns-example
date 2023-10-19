import { createRouter, createWebHistory } from 'vue-router'
import Home from './views/Home.vue'
import Login from './views/Login.vue'
import ColumnDetail from './views/ColumnDetail.vue'
import PostDetail from './views/PostDetail.vue'
import CreatePost from './views/CrearePost.vue'
import store from './store'

const routerHistory = createWebHistory()
const router = createRouter({
  history: routerHistory,
  routes: [
    {
      path: '/',
      name: 'home',
      component: Home
    },
    {
      path: '/login',
      name: 'login',
      component: Login,
      meta: {
        redirectAlreadyLogin: true
      }
    },
    {
      path: '/column/:id',
      name: 'column',
      component: ColumnDetail
    },
    {
      path: '/post/:id',
      name: 'post',
      component: PostDetail
    },
    {
      path: '/create',
      name: 'create',
      component: CreatePost,
      meta: {
        requireLogin: true
      }
    }
  ]
})
router.beforeEach((to, from, next) => {
  if (to.meta.requireLogin && !store.state.userInfo.isLogin) {
    next({ name: 'login' })
  } else if (to.meta.redirectAlreadyLogin) {
    next('/')
  }
  next()
})
export default router
