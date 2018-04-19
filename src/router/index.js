import Vue from 'vue'
import Router from 'vue-router'
import admin from '@/views/admin/admin'
import home from '@/views/index/index'
import produce from '@/views/produce/produce'
import about from '@/views/about/about'
import contact from '@/views/contact/contact'

Vue.use(Router)

export default new Router({
	// mode:'history',
  routes: [
    {
      path: '/admin',
      name: 'admin',
      component: admin
    },
    {
      path: '/produce',
      name: 'produce',
      component: produce
    },
    {
      path: '/about',
      name: 'about',
      component: about
    },
    {
      path: '/contact',
      name: 'contact',
      component: contact
    },
    {
      path: '/',
      name: 'home',
      component: home
    }
  ]
})
