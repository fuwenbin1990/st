import Vue from 'vue'
import Router from 'vue-router'
import admin from '@/views/admin/admin'
import home from '@/views/index/index'

Vue.use(Router)

export default new Router({
	mode:'history',
  routes: [
    {
      path: '/admin',
      name: 'admin',
      component: admin
    },
    {
      path: '/',
      name: 'home',
      component: home
    }
  ]
})
