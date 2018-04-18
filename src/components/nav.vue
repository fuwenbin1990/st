<template>
	<div class="appnav">
		<el-menu
		  class="el-menu-demo"
		  mode="horizontal"
		  @select="handleSelect"
		  background-color="#545c64"
		  text-color="#fff"
		  :router="true"
		  active-text-color="#ffd04b">
		  <el-menu-item index="/">主页</el-menu-item>
		  <el-menu-item index="4">产品</el-menu-item>
		  <el-menu-item index="6">留言板</el-menu-item>
		  <el-menu-item index="5">关于我们</el-menu-item>
		  <el-menu-item index="/admin">管理员入口</el-menu-item>
		</el-menu>
	</div>
</template>

<script>
import {roundShowImg} from '@/api/index'

	export default{
		name:'appnav',
		created(){
			// this.getRoundImg()
		},
		methods:{
			handleSelect(index,indexpath){
				console.log(index+'---'+indexpath)
			}
		}
	}
</script>


<style scoped>
	
</style>