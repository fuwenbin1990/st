<template>
	<div class="home">
		<el-carousel :interval="4000"  height="700px">
	    <el-carousel-item v-for="item in cardImg" :key="item.id">
	      <img :src="`https://wbtc.tech/${item.file}/${item.name}.png`" :alt="item.title" class="cardImg">
	    </el-carousel-item>
	  </el-carousel>
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
</style>