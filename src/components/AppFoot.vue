<template>
	<div class="appFoot">
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
	
export default{
	name:'appFoot'
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
	.appFoot{
		width: 100%;
		min-width: 1378px;
	}
</style>
	
