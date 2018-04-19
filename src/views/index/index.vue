<template>
	<div class="home" v-loading="loading" element-loading-text="拼命加载中" element-loading-spinner="el-icon-loading" element-loading-background="rgba(0, 0, 0, 0.8)">
		<el-row class="row_1">
			<el-col :span="24">
				<h3>做会展 做广告 找上涂</h3>
			</el-col>
			<el-col :span="24">
				<div class="input-group searchBtn">
					<input type="text" class="form-control">
					<span class="input-group-btn">
						<button class="btn btn-default" type="button">
							搜索  <span class="el-icon-search"></span>
						</button>
					</span>
				</div>
			</el-col>
		</el-row>
		<el-row>
			<el-carousel :interval="3000"  height="300px" trigger="click" type="card">
		    <el-carousel-item v-for="item in cardImg" :key="item.id" class="cardImg">
		      <img :src="`https://wbtc.tech/${item.file}/${item.name}.png`" :alt="item.title" class="img-responsive">
		    </el-carousel-item>
		  </el-carousel>
	  </el-row>

		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<h2 class="title">最新案列</h2>
				</div>

				<div class="col-xs-3" v-for="item in showImg" :key="item.id">
					<div class="panel panel-success">
						<div class="panel-body showImg">
							<img :src="`https://wbtc.tech/${item.file}/${item.name}.png`" :alt="item.title" class="img-responsive">
						</div>
						<div class="panel-footer">
							<h4 class="showImgTit"><router-link to="">{{item.title}}</router-link></h4>
						</div>
					</div>
				</div>
			</div>
		
			<div class="row">
				<div class="col-md-12">
					<h2 class="title">公司介绍</h2>
				</div>
			</div>

			<div class="row row3">
				<div class="col-md-12">
					<div class="col-xs-3 homeAbout">
						<ul class="list-group">
							<li class="list-group-item">上海上涂广告图文有限公司</li>
							<li class="list-group-item" v-if="text.user">联系人：{{text.user}}</li>
							<li class="list-group-item" v-if="text.wx">微信：{{text.wx}}</li>
							<li class="list-group-item" v-if="text.QQ1">QQ1：{{text.QQ1}}</li>
							<li class="list-group-item" v-if="text.QQ2">QQ2：{{text.QQ2}}</li>
							<li class="list-group-item" v-if="text.QQ3">QQ3：{{text.QQ3}}</li>
							<li class="list-group-item" v-if="text.tel1">联系电话1：{{text.tel1}}</li>
							<li class="list-group-item" v-if="text.tel2">联系电话2：{{text.tel2}}</li>
							<li class="list-group-item" v-if="text.tel3">联系电话3：{{text.tel3}}</li>
							<li class="list-group-item" v-if="text.adress">地址：{{text.adress}}</li>
							<li class="list-group-item" v-if="text.email">邮箱：{{text.email}}</li>
						</ul>
					</div>
					<div class="col-xs-6 homeAbout">
						<div class="panel panel-default">
							<div class="panel-body">
								<p v-if="text.introduce1">{{text.introduce1}}</p>
								<p v-if="text.introduce2">{{text.introduce2}}</p>
								<p v-if="text.introduce3">{{text.introduce3}}</p>
								<p v-if="text.introduce4">{{text.introduce4}}</p>
							</div>
						</div>
					</div>
					<div class="col-xs-3 homeAbout" v-if="WXImg.length">
						<div class="WXImg">
							<img :src="`https://wbtc.tech/${WXImg[0].file}/${WXImg[0].name}.png`" :alt="WXImg[0].title" class="img-responsive">
						</div>
					</div>
				</div>
			</div>
		</div>

	</div>
</template>



<script>
	import { allImgs , text } from '@/api/index'

	export default{

		name:'home',
		data(){
			return {
				allImg:[],
				cardImg:[],
				showImg:[],
				WXImg:[],
				text:{},
				searchWord:'',
				loading:true,
			}
		},
		methods:{
			getdata(){
				var query = {action:'st_home'};
				var queryText = {action:'st_text'};
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
					this.WXImg = this.allImg.filter(val => {
						return val.part == '微信二维码'
					});
					this.loading = false;
				})
				text(queryText).then(res => {
					this.text = res.data[0];
				})
			}
		},
		created(){
			this.getdata();
		}
	}
</script>


<style scoped>
	.container-fluid{
		width: 90%
	}
	.cardImg{
		min-height: 300px;
		min-width: 760px;
	}
	.searchBtn{
		width: 30%;
		margin: 0 auto 0;
	}
	.row_1{
		text-align: center;
		margin-bottom: 30px;
	}
	img{
		width: 100%;
		height: 100%;
	}
	.showImg{
		padding: 0px;
		cursor: pointer;
	}
	.showImgTit{
		margin-top: 10px;
		margin-bottom: 0px;
		display: inline-block;
		text-align: center;
		height: 30px;
		width: 100%;
		line-height: 30px;
		font-weight: 400;
		letter-spacing: 10px;
	}
	.title{
		height: 100%;
		text-align: center;
		letter-spacing: 20px;
	}
	.homeAbout{
		/*height: 300px;*/
		/*padding: 0px;*/
		/*margin: 0px;*/
	}
	.home{
	/*	background: #ccc;*/
		min-width: 1378px;
	}
	.WXImg{
		max-height: 280px;
		max-width: 280px;
		min-width: 200px;
		min-height: 200px;
	}
	.row3{
		margin-bottom: 15px;
	}
</style>