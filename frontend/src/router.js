import Vue from 'vue'
import Router from 'vue-router'
import Home from './views/Home.vue'

Vue.use(Router)

export default new Router({
  mode: 'history',
  base: process.env.BASE_URL,
  routes: [
    {
      path: '/',//主页
      name: 'home',
      component: Home
    },
    {
      path: '/show/:id',//文章展示
      name: 'detailShow',
      component: () => import('./views/Detail.vue')
    },
    {
      path: '/apply',//写文章
      name: 'apply',
      component: () => import('./views/New.vue')
    },
    {
      path: '/myrecommendations',//我的推荐
      name: 'myrecommendations',
      component: () => import('./views/MyRecommendations.vue')
    },
    {
      path: '/updateinfo',//更新个人信息
      name: 'updateinfo',
      component: Home
    },
    {
      path: '/about',
      name: 'about',
      // route level code-splitting
      // this generates a separate chunk (about.[hash].js) for this route
      // which is lazy-loaded when the route is visited.
      component: () => import(/* webpackChunkName: "about" */ './views/About.vue')
    },
    {
      path: '*',
      name: '404',
      component: Home
    }
  ]
})
