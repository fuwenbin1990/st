<template>
	<div class="home">
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
			<el-carousel :interval="5000"  height="300px" trigger="click" type="card">
		    <el-carousel-item v-for="item in cardImg" :key="item.id">
		      <img :src="`https://wbtc.tech/${item.file}/${item.name}.png`" :alt="item.title" class="cardImg">
		    </el-carousel-item>
		  </el-carousel>
	  </el-row>
	  <el-row>
	  	<el-col :span="2">.</el-col>
	  	<el-col :span="20">
	  		<!-- <div class="panel">
					<div class="panel-body"> -->
						<div class="col-md-12">
							<h2 class="title">最新案列</h2>
						</div>

						<div class="col-md-4" v-for="item in showImg" :key="item.id">
							<div class="panel panel-success">
								<div class="panel-body showImg">
									<img :src="`https://wbtc.tech/${item.file}/${item.name}.png`" :alt="item.title" class="img-responsive">
								</div>
								<div class="panel-footer">
									<h4 class="showImgTit"><router-link to="">{{item.title}}</router-link></h4>
								</div>
							</div>
						</div>
						<div class="col-md-12">
							<h2 class="title">公司介绍</h2>
						</div>
						<div class="col-md-12">
							<div class="col-md-3 homeAbout">
								<ul class="list-group">
									<li class="list-group-item">上海上涂广告图文有限公司</li>
									<li class="list-group-item">联系人：傅经理</li>
									<li class="list-group-item">微信：15201872280</li>
									<li class="list-group-item">联系电话：15201872280</li>
									<li class="list-group-item">联系电话：13641712410</li>
									<li class="list-group-item">地址：上海市长宁区平武路8号</li>
									<li class="list-group-item">邮箱:&nbsp992331880@qq.com</li>
								</ul>
							</div>
							<div class="col-md-6 homeAbout">
								<div class="panel panel-default">
									<div class="panel-body">
										<p>上海上涂广告有限公司位于上海市长宁区平武路8号，拥有先进的成套数码印刷设备，为您提供一对一业务洽谈，上门接稿、送货、等优质服务。</p>
										<p>我们客户涉及大型广告公司、建筑、传媒、服装、装潢、设计院、日用品、化工、食品等各个不同的领域。服务项目：排版设计、彩色数码快印（彩印、复印、印刷）、传统打印、企业样本、宣传册（彩页）、工程图以及效果图输出（晒图）、请帖贺卡、文本装订（无线精装、铁圈精装、胡贴装、无线胶装）、光盘刻录、高精度写真喷绘、广告照片以及相关创意设计、高档中西餐厅精装菜谱、刻字、高精度扫描、X展架、易拉宝、台历以及挂历、锦旗横幅、标书、奖杯、铜牌刻字、台卡、LOGO墙、灯箱、名片、海报、PVC证卡、会务会展、办公耗材等等。</p>
										<p>我们的愿景：专注品质与服务，成就品牌与梦想！</p>
										<br>
									</div>
								</div>
							</div>
							<div class="col-md-3 homeAbout" v-if="WXImg.length">
								<img :src="`https://wbtc.tech/${WXImg[0].file}/${WXImg[0].name}.png`" :alt="WXImg[0].title" class="img-responsive">
							</div>
						</div>
				<!-- 	</div>
				</div> -->
				<!-- <el-col :span="5" v-for="item in showImg" :key="item.id" class="showImgWrap">
					<el-card>
			      <img :src="`https://wbtc.tech/${item.file}/${item.name}.png`" :alt="item.title" class="showImg">
			      <div>
			        <h4 class="showImgTit">{{item.title}}</h4>
			      </div>
			    </el-card>
				</el-col> -->
	  	</el-col>
	  	<el-col :span="2"></el-col>
	  </el-row>

	  <div class="row">
			<div class="col-md-12 footer">
				<div class="jumbotron">
					<div class="container">
						<span id="p1">
							<span>所属版权@</span>
							<b>上海上涂广告有限公司</b>
							<span>All rights reserved 技术支持：</span>
							<span><a href="#">wbtc科技 </a></span>&nbsp
							<span><a href="#">苏ICP备18002235号-1</a></span>
						</span>
						<br>
						<span id="p2">
							<span>地址：上海市长宁区平武路8号</span>&nbsp
							<span>联系人：傅经理</span>&nbsp
							<span>手机：15201872280</span>&nbsp
							<span>手机：13641712410</span>
						</span>
						<br>
						<p id="p3">
							<span>友情链接：</span>
							<a href="#">上海下涂广告</a>&nbsp
							<a href="#">上海左涂广告</a>&nbsp
							<a href="#">上海右涂广告</a>&nbsp
						</p>
					</div>
				</div>
			</div>
		</div>
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
				WXImg:[],
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
					this.WXImg = this.allImg.filter(val => {
						return val.part == '微信二维码'
					});
					console.log(this.showImg)
				})
			}
		},
		created(){
			this.getdata();
		}
	}
</script>


<style scoped>
	.jumbotron{
		margin: 0;
		padding: 15px 0 0px 0;
		background: rgb(84, 92, 100);
		text-align: center;
		color: white;
	}
	.jumbotron a{
		color: white
	}
	#p3{
		font-size: 0.8em;
	}
	.cardImg{
		height: 100%;
		width: 100%;
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
		height: 100%;
	}
</style>