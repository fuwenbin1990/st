<template>
  <div id="app">
    <appnav></appnav>
    <router-view></router-view>
  </div>
</template>

<script>

import appnav from '@/components/nav'

export default {
  name: 'App',
  components:{
    appnav
  }
}
</script>

<style>
#app {
	background: #ccc
}
</style>
