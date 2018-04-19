<template>
	<div class="appnav">
		<el-menu
		  class="el-menu-demo"
		  :default-active="active"
		  mode="horizontal"
		  @select="handleSelect"
		  background-color="#545c64"
		  text-color="#fff"
		  :router="true"
		  active-text-color="#ffd04b">
		  <el-menu-item index="/"><router-link to="/">主页</router-link></el-menu-item>
		  <el-menu-item index="/produce"><router-link to="/produce">产品</router-link></el-menu-item>
		  <el-menu-item index="/contact"><router-link to="/contact">留言板</router-link></el-menu-item>
		  <el-menu-item index="/about"><router-link to="/about">关于我们</router-link></el-menu-item>
		  <el-menu-item index="/admin" class="admin"><router-link to="/admin">管理员入口</router-link></el-menu-item>
		</el-menu>
	</div>
</template>

<script>
import {roundShowImg} from '@/api/index'

	export default{
		name:'appnav',
		created(){
			
		},
		computed:{
			active(){
				return this.$route.path
			}
		},
		methods:{
			handleSelect(index,indexpath){
				// console.log(index+'---'+indexpath)
			}
		}
	}
</script>


<style scoped>
	.appnav{
		width: 100%;
		min-width: 1378px
	}
	.el-menu-demo .el-menu-item{
		position: relative;
		left: 10%;
	}
	.el-menu-demo .admin{
		left: 70%;
	}
</style>