<template>
	<div class="container-fluid produce" v-loading="loading" element-loading-text="拼命加载中" element-loading-spinner="el-icon-loading" element-loading-background="rgba(0, 0, 0, 0.8)">
		<search></search>
		<div class="row">
			<div class="col-xs-12">
				<el-tabs v-model="showImgSort" @tab-click="handleClick">
			    <el-tab-pane label="综合排序" name="allSort"></el-tab-pane>
			    <el-tab-pane label="最新上传" name="newSort"></el-tab-pane>
			    <el-tab-pane label="查看最多" name="looKSort"></el-tab-pane>
			  </el-tabs>
			</div>
			<div class="row row1">

				<div class="col-xs-3" v-for="item in showImgs" :key="item.id">
					<div class="thumbnail">
						<div class="imgWrap">
            	<img :src="`https://wbtc.tech/${item.file}/${item.name}.png`" :alt="item.title" class="img-responsive">
          	</div>
            <div class="caption">
              <h3>{{item.title}}</h3>
              <div class="imgTxt">
              	<p>{{item.content}}</p>
              	<p style="float:right">{{item.time}}</p>
              	<div style="clear:both"></div>
              </div>
            </div>
        	</div>
				</div>
			</div>
			<div class="col-xs-12 pageWrap">
				<ul class="pagination">
			    <li><a href="javascript:">&laquo;</a></li>
			    <li v-for="index in allPage" :key="index" :index="index" @click="getPage" :class="{active:index==page}"><a href="javascript:">{{index}}</a></li>
			    <li><a href="javascript:">&raquo;</a></li>
				</ul>
			</div>
		</div>
	</div>
</template>

<script>

import search from '@/components/search'
import {allImgs} from '@/api/produce'


export default{
	name:'produce',
	data(){
		return {
			showImgSort:'',
			showImgs:[],
			allShowImgs:[],
			total:'',
			lmit:20,
			allPage:Number,
			page:Number,
			loading:true,
		}
	},
	methods:{
		handleClick(){
			this.loading = true;
			if(this.showImgSort == 'allSort'){
				this.allShowImgs.sort(function(){
					return Math.random()-0.5;
				})
				this.initImg()
			}else if(this.showImgSort == 'newSort'){
				this.allShowImgs.sort(function(a,b){
					return new Date(a.time).getTime() - new Date(b.time).getTime()
				})
				this.initImg()
			}else if(this.showImgSort == 'looKSort'){
				this.allShowImgs.sort(function(){
					return Math.random()-0.5;
				})
				this.initImg()
			}
		},
		getShowImgs(){
			var query = {action:'st_home'};
			allImgs(query).then(res => {
				this.allShowImgs = res.data.filter(val => {
					return val.part == '产品展示图';
				});
				this.allShowImgs.sort(function(a,b){
					return a.showIndex - b.showIndex
				});
				this.initImg()
			})
		},
		initImg(){
			this.page = 1;
			this.total = this.allShowImgs.length;
			this.allPage = Math.ceil(this.total/this.lmit);
			this.showImgs = this.allShowImgs.slice((this.page-1)*this.lmit,this.page*this.lmit);
			this.loading = false;
		},
		getPage(e){
			this.page = e.currentTarget.getAttribute('index');
			this.toPage(this.page);
		},
		toPage(num){
			if(num*this.lmit <= this.total){
				this.showImgs = this.allShowImgs.slice(this.lmit*(num-1),this.lmit*num);
			}else{
				this.showImgs = this.allShowImgs.slice(this.lmit*(num-1),this.total);
			}
		}
	},
	components:{
		search
	},
	created(){
		this.getShowImgs()
	},
}
	
</script>

<style scoped>
	.container-fluid{
		width: 90%;
		min-width: 1378px;
	}
	.imgWrap{
		min-height: 214px;
		min-width: 312px;
	}
	.imgWrap img{
		width: 100%;
		height: 100%;
	}
	.imgTxt p{
		display: inline-block;
	}
	.pageWrap{
		text-align: center;
	}
</style>