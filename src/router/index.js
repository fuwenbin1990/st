import Vue from 'vue'
import Router from 'vue-router'
import admin from '@/views/admin/admin'

Vue.use(Router)

export default new Router({
	mode:'history',
  routes: [
    {
      path: '/',
      name: 'admin',
      component: admin
    }
  ]
})
