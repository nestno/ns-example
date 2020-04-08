import Vue from 'vue'
import VueRouter from 'vue-router'
import Home from 'views/home/Home.vue'
import news from 'components/category/news'
import message from 'components/category/message'
const category = () => import('views/category/category')

Vue.use(VueRouter)

const routes = [
  {
    path: '',
    name: 'Home',
    component: Home,
    meta: {
      title: '首页'
    }
  },
  {
    path: '/about',
    name: 'About',
    meta: {
      title: '关于'
    },
    // route level code-splitting
    // this generates a separate chunk (about.[hash].js) for this route
    // which is lazy-loaded when the route is visited.
    component: () => import(/* webpackChunkName: "about" */ 'views/About.vue')
  },
  {
    path: '/category',
    name: 'Category',
    component: category,
    beforeEnter: (to, from, next) => {
      next()
    },
    meta: {
      title: '分类'
    },
    children: [
      {
        path: '',
        redirect: 'news'
      },
      {
        path: 'news',
        component: news
      },
      {
        path: 'message',
        component: message
      }
    ]
  }
]

const router = new VueRouter({
  mode: 'history',
  base: process.env.BASE_URL,
  routes,
  linkActiveClass: 'active'
})

router.beforeEach((to, from, next) => {
  document.title = to.matched[0].meta.title
  next()
})
export default router
