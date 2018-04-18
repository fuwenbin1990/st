<template>
	<div class="home">
		<el-row>
			<el-col :span="24">
				<h3>做会展 做广告 找上涂</h3>
			</el-col>
			<el-col :span="24">
				<el-input placeholder="请输入内容" v-model="searchWord" class="searchBtn">
			  </el-input>
			  <el-button type="info">搜索  <span class="el-icon-search"></span></el-button>
			</el-col>
		</el-row>
		<el-row>
			<el-carousel :interval="5000"  height="800px" trigger="click">
		    <el-carousel-item v-for="item in cardImg" :key="item.id">
		      <img :src="`https://wbtc.tech/${item.file}/${item.name}.png`" :alt="item.title" class="cardImg">
		    </el-carousel-item>
		  </el-carousel>
	  </el-row>
	</div>
</template>



<script>
	import {allImgs} from '@/api/index'

	export default{

		name:'home',
		data(){
			return {
				allImg:[],
				cardImg:[],
				showImg:[],
				searchWord:''
			}
		},
		methods:{
			getdata(){
				var query = {action:'st_home'};
				allImgs(query).then(res => {
					this.allImg = res.data;
					this.allImg.sort(function(a,b){
						return a.showIndex - b.showIndex
					})
					this.cardImg = this.allImg.filter(val => {
						return val.part == '首页轮播图'
					});
					this.showImg = this.allImg.filter(val => {
						return val.part == '首页产品展示'
					});
					console.log(this.cardImg)
				})
			}
		},
		created(){
			this.getdata();
		}
	}
</script>


<style scoped>
	
	.cardImg{
		height: 100%;
		width: 100%;
	}
	.searchBtn{
		width: 30%;
	}
</style>