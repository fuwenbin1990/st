<template>
	<div class="container-fluid Search">
		<div class="row row1">
			<div class="col-xs-4">
				<ol class="breadcrumb">
			    <li><a href="#">上涂广告</a></li>
			    <li class="active">{{way}}</li>
				</ol>
			</div>
			<div class="col-xs-4"></div>
			<div class="col-xs-4 search">
				<div class="input-group">
          <input type="text" class="form-control">
          <span class="input-group-btn">
            <button class="btn btn-default" type="button">搜索  <span class="el-icon-search"></span></button>
          </span>
     		</div>
			</div>
			<div style="clear:both"></div>
		</div>
	</div>
</template>

<script>
	
export default{
	name:'search',
	data(){
		return {
			path:'',
		}
	},
	created(){
		this.path = this.$route.path
	},
	computed:{
		way(){
			switch(this.path){
				case '/produce':
					return '产品展示';
				break;
				case '/contact':
					return '留言板';
				break;
				case '/about':
					return '关于我们';
				break;
				default:
				break;
			}
		},
	},
}
	
</script>

<style scoped>
	.Search{
		width: 110%;
		min-width: 1378px;
		margin: 0px;
		padding: 0px;
		position: relative;
		left: -5%;
	}
	.search{
		float: right;
	}
	.row1{
		/*background: red;*/
		margin-top: 15px;
	}
</style>