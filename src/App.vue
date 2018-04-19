<template>
  <div id="app">
    <appnav></appnav>
    <router-view></router-view>
    <appfoot></appfoot>
  </div>
</template>

<script>

import appnav from '@/components/nav'
import appfoot from '@/components/AppFoot'

export default {
  name: 'App',
  components:{
    appnav,
    appfoot
  }
}
</script>

<style scoped>
#app {
	
}
</style>
