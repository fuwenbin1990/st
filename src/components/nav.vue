<template>
	<div class="appnav">
		<el-button type="primary" @click="show">123</el-button>
	</div>
</template>

<script>
	export default{
		name:'appnav',
		methods:{
			show(){
				this.$message('hello')
			}
		}
	}
</script>