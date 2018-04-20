<template>
	<div class="admin">
		<el-collapse v-model="activeName" accordion @change='getlbData' v-if="status">
		  <el-collapse-item title="首页轮播图管理(最佳像素760*300)" name="首页轮播图">
				<el-row>
			    <el-col :span="8" v-for="(item, index) in lblist" :key="index">
				    <el-card :body-style="{ padding: '0px' }">
				      <img :src="`https://wbtc.tech/${item.file}/${item.name}.png`" class="image">
				      <div>
				        <div class="bottom clearfix">
				          <span>名称:</span><span class="lbspan">{{ item.oldname }}</span>
				          <div class="button">
										<el-radio v-model="item.showImg" label="1">展示</el-radio>
	  								<el-radio v-model="item.showImg" label="0">不展示</el-radio>
	  								<el-input v-model="item.showIndex" placeholder="展示顺序" style="width:170px" :disabled="item.showImg=='0'">
	  									<template slot="prepend">展示顺序</template>
	  								</el-input>
	  								<el-button type="primary" size="medium" @click="dellb(item.id,item.file,item.name)">删除</el-button>
				          </div>
				          <div class="clearbtn"></div>
				        </div>
				      </div>
				    </el-card>
				  </el-col>
				</el-row>
				<el-row class="lbsubmit">
					<el-col :span="22">.</el-col>
					<el-col :span="2">
						<el-button type="primary" @click="submitlb" v-if="typeof lblist == 'object' && lblist.length">保存修改</el-button>
					</el-col>
				</el-row>
		  </el-collapse-item>
		  <el-collapse-item title="首页产品展示图管理(最佳像素390*278)" name="首页产品展示">
		    <el-row>
			    <el-col :span="4" v-for="(item, index) in lblist" :key="index">
				    <el-card :body-style="{ padding: '0px' }">
				      <img :src="`https://wbtc.tech/${item.file}/${item.name}.png`" class="image">
				      <div>
				        <div class="bottom clearfix">
				          <span>名称:</span><span class="lbspan">{{ item.oldname }}</span>
				          <div class="button">
										<el-radio v-model="item.showImg" label="1">展示</el-radio>
	  								<el-radio v-model="item.showImg" label="0">不展示</el-radio>
	  								<el-input v-model="item.showIndex" placeholder="展示顺序" style="width:220px" :disabled="item.showImg=='0'">
	  									<template slot="prepend">展示顺序</template>
	  								</el-input>
	  								<el-input v-model="item.title" placeholder="图片说明" style="width:220px">
	  									<template slot="prepend">标题</template>
	  								</el-input>
	  								<el-button type="primary" size="medium" @click="dellb(item.id,item.file,item.name,item.part)" class="showBtn">删除</el-button>
				          </div>
				          <div class="clearbtn"></div>
				        </div>
				      </div>
				    </el-card>
				  </el-col>
				</el-row>
				<el-row class="lbsubmit">
					<el-col :span="22">.</el-col>
					<el-col :span="2">
						<el-button type="primary" @click="submitlb" v-if="typeof lblist == 'object' && lblist.length">保存修改</el-button>
					</el-col>
				</el-row>
		  </el-collapse-item>
		  <el-collapse-item title="微信二维码(最佳像素280*280)(多个二维码只会展示最靠前的一张)" name="微信二维码">
		    <el-row>
			    <el-col :span="4" v-for="(item, index) in lblist" :key="index">
				    <el-card :body-style="{ padding: '0px' }">
				      <img :src="`https://wbtc.tech/${item.file}/${item.name}.png`" class="image">
				      <div>
				        <div class="bottom clearfix">
				          <span>名称:</span><span class="lbspan">{{ item.oldname }}</span>
				          <div class="button">
										<el-radio v-model="item.showImg" label="1">展示</el-radio>
	  								<el-radio v-model="item.showImg" label="0">不展示</el-radio>
	  								<el-input v-model="item.showIndex" placeholder="展示顺序" style="width:220px" :disabled="item.showImg=='0'">
	  									<template slot="prepend">展示顺序</template>
	  								</el-input>
	  								<el-input v-model="item.title" placeholder="图片说明" style="width:220px">
	  									<template slot="prepend">标题</template>
	  								</el-input>
	  								<el-button type="primary" size="medium" @click="dellb(item.id,item.file,item.name,item.part)" class="showBtn">删除</el-button>
				          </div>
				          <div class="clearbtn"></div>
				        </div>
				      </div>
				    </el-card>
				  </el-col>
				</el-row>
				<el-row class="lbsubmit">
					<el-col :span="22">.</el-col>
					<el-col :span="2">
						<el-button type="primary" @click="submitlb" v-if="typeof lblist == 'object' && lblist.length">保存修改</el-button>
					</el-col>
				</el-row>
		  </el-collapse-item>
		  <el-collapse-item title="产品展示图管理" name="产品展示图">
		    <el-row>
			    <el-col :span="4" v-for="(item, index) in lblist" :key="index">
				    <el-card :body-style="{ padding: '0px' }">
				      <img :src="`https://wbtc.tech/${item.file}/${item.name}.png`" class="image">
				      <div>
				        <div class="bottom clearfix">
				          <span>名称:</span><span class="lbspan">{{ item.oldname }}</span>
				          <div class="button">
										<el-radio v-model="item.showImg" label="1">展示</el-radio>
	  								<el-radio v-model="item.showImg" label="0">不展示</el-radio>
	  								<el-input v-model="item.showIndex" placeholder="展示顺序" style="width:220px" :disabled="item.showImg=='0'">
	  									<template slot="prepend">展示顺序</template>
	  								</el-input>
	  								<el-input v-model="item.title" placeholder="图片说明" style="width:220px">
	  									<template slot="prepend">标题</template>
	  								</el-input>
	  								<el-button type="primary" size="medium" @click="dellb(item.id,item.file,item.name,item.part)" class="showBtn">删除</el-button>
				          </div>
				          <div class="clearbtn"></div>
				        </div>
				      </div>
				    </el-card>
				  </el-col>
				</el-row>
				<el-row class="lbsubmit">
					<el-col :span="22">.</el-col>
					<el-col :span="2">
						<el-button type="primary" @click="submitlb" v-if="typeof lblist == 'object' && lblist.length">保存修改</el-button>
					</el-col>
				</el-row>
		  </el-collapse-item>
		  <el-collapse-item title="首页文字管理(不填信息首页不会显示)" name="首页文字">
		  	<el-form ref="form" :model="form" label-width="120px" style="width:90%">
				  <el-form-item label="联系人:">
				    <el-input v-model="form.user"></el-input>
				  </el-form-item>
				  <el-form-item label="微信:">
				    <el-input v-model="form.wx"></el-input>
				  </el-form-item>
				  <el-form-item label="QQ1:">
				    <el-input v-model="form.QQ1"></el-input>
				  </el-form-item>
				  <el-form-item label="QQ2:">
				    <el-input v-model="form.QQ2"></el-input>
				  </el-form-item>
				  <el-form-item label="QQ3:">
				    <el-input v-model="form.QQ3"></el-input>
				  </el-form-item>
				  <el-form-item label="电话1:">
				    <el-input v-model="form.tel1"></el-input>
				  </el-form-item>
				  <el-form-item label="电话2:">
				    <el-input v-model="form.tel2"></el-input>
				  </el-form-item>
				  <el-form-item label="电话3:">
				    <el-input v-model="form.tel3"></el-input>
				  </el-form-item>
				  <el-form-item label="地址:">
				    <el-input v-model="form.adress"></el-input>
				  </el-form-item>
				  <el-form-item label="邮箱:">
				    <el-input v-model="form.email"></el-input>
				  </el-form-item>
				  <el-form-item label="公司介绍一">
				    <el-input type="textarea" v-model="form.introduce1" placeholder="第一段"></el-input>
				  </el-form-item>
				  <el-form-item label="公司介绍二">
				    <el-input type="textarea" v-model="form.introduce2" placeholder="第二段"></el-input>
				  </el-form-item>
				  <el-form-item label="公司介绍三">
				    <el-input type="textarea" v-model="form.introduce3" placeholder="第三段"></el-input>
				  </el-form-item>
				  <el-form-item label="公司介绍四">
				    <el-input type="textarea" v-model="form.introduce4" placeholder="第四段"></el-input>
				  </el-form-item>
				  <el-form-item>
				    <el-button type="primary" @click="HomeText" style="float:right">保存</el-button>
				    <div style="clear:both"></div>
				  </el-form-item>
				</el-form>
		  </el-collapse-item>
		  <el-collapse-item title="图片上传管理" name="5">
		  	<el-row>
				  <el-form ref="form" :model="introduce" label-width="120px">
					  <el-form-item label="图片标题：">
					    <el-input v-model="introduce.title" placeholder="图片标题"></el-input>
					  </el-form-item>
					  <el-form-item label="图片内容：">
					    <el-input type="textarea" v-model="introduce.content" placeholder="图片描述" :rows="4"></el-input>
					  </el-form-item>
					  <el-form-item label="部位：">
					    <el-select v-model="introduce.part" placeholder="选择要上传的部位">
						    <el-option
						      v-for="(item,index) in options"
						      :key="index"
						      :label="item"
						      :value="item">
						    </el-option>
					  	</el-select>
					  </el-form-item>
					  <el-form-item label="选择图片：">
					  	<el-upload
					  	ref="upload"
						  :action="action"
						  :on-preview="handlePreview"
						  :on-remove="handleRemove"
						  :before-remove="beforeRemove"
						  :on-success="sucs"
						  :limit="3"
						  :data="introduce"
						  :auto-upload="false"
						  :on-exceed="handleExceed">
						  <el-button size="small" type="primary">选择图片</el-button>
						  <div slot="tip" class="el-upload__tip">支持jpg和png格式,且不超过500KB</div>
						</el-upload>
					  </el-form-item>
					  <el-form-item>
					    <el-button type="primary" @click="onSubmit">立即上传</el-button>
					  </el-form-item>
					</el-form>
				</el-row>
		  </el-collapse-item>
		</el-collapse>
		<div v-else="status" class="login" id="login">
			<el-form ref="form" :model="form" label-width="80px" class="adminForm" label-position="right">
			  <el-form-item label="admin:">
			    <el-input v-model="adminForm.adminUser">
			    	<template slot="prepend"><!-- <span class="el-icon-edit"></span> --></template>
			    </el-input>
			  </el-form-item>
			  <el-form-item label="password:">
			    <el-input v-model="adminForm.adminPassworld" type="password" @keyup.enter.native="adminValidate"></el-input>
			  </el-form-item>
			  <el-form-item>
			    <el-button type="primary" @click="adminValidate" style="width:100%">验证身份信息</el-button>
			  </el-form-item>
			</el-form>
		</div>
	</div>
</template>


<script>
	
	import { upload } from '@/api/upLoadImg'	
	import { getlb , postlb , dellb , postAdmin } from '@/api/admin/lb'
	import { deepClone } from '@/utils/index'
	import { text } from '@/api/index'
	import { setCook , getCook , delCook } from '@/utils/cook'

	export default{
		name:'admin',
		data(){
			return{
				validate					:false,
				activeName				:'5',
				options						:['首页轮播图','首页产品展示','产品展示图','微信二维码'],
				lblist						:[],
				adminForm					:{
					action					:'st_validate_admin',
					adminUser				:'',
					adminPassworld	:'',
				},
				form							:{
					action					:'st_subText',
					user						:'',
					wx							:'',
					QQ1							:'',
					QQ2							:'',
					QQ3							:'',
					tel1						:'',
					tel2						:'',
					tel3						:'',
					adress					:'',
					email						:'',
					introduce1			:'',
					introduce2			:'',
					introduce3			:'',
					introduce4			:'',
				},
				introduce					:{
					action					:'st_ad',
					title						:'',
					content					:'',
					part						:'',
					loginH					:'',
				}
			}
		},
		computed:{
			action(){
				return process.env.BASE_API + '/php/upload.php'
			},
			status(){
				return this.validate
			}
		},
		created(){
			this.getForm()
			getCook('admin') ? this.validate = getCook('admin') : this.validate = false;
		},
		mounted(){
			this.loginH = document.documentElement.clientHeight -147 + 'px';
			if(document.getElementById('login')){document.getElementById('login').style.height = this.loginH};
		},
		methods:{
			adminValidate(){
				postAdmin(this.adminForm).then(res => {
					if(res.data === 'OK'){
						this.$message.success('验证成功,已跳转到管理页面')
						this.adminForm.adminUser = '';
						this.adminForm.adminPassworld = '';
						this.validate = true
						setCook('admin',true,1/48);
					}else{
						this.$message.error('你不是管理员,请离开！！！')
					}
				})
			},
			HomeText(){
				this.form.action = 'st_subText';
				postlb(this.form).then(res => {
					console.log(res.data)
					if(res.data == 'OK'){
						this.$message.success('保存成功')
					}else if(res.data == 'NO'){
						this.$message.error('保存失败')
					}
				})
			},
			sucs(res,file,filelist){
				if(res == 'OK'){
					this.$message.success('上传成功');
					this.$refs.upload.clearFiles();
					
				}
			},
			getlbData(part){
				this.lblist = {};
				var query = {action:'st_getlb',part:part};
				getlb(query).then(res => {
					if(!res.data)return;
					this.lblist = res.data;
				})
			},
			getForm(){
				var query = {action:'st_text'};
				text(query).then(res => {
					this.form = res.data[0];
				})
			},
			submitlb(){
				var list = deepClone(this.lblist);
				var query = {};
				query.action = 'st_postlb';
				query.list = list;
				postlb(query).then(res => {
					if(res.data.indexOf('OK')>0){
						this.$message.success('保存成功')
					}else{
						this.$message.error('保存失败')
					}
				})
				// console.log(query)
			},
			dellb(id,file,name,part){
				// console.log(id,file,name)
				var query = {};
				query.id = id;
				query.file = file;
				query.name = name;
				query.action = 'st_dellb';
				console.log(query)
				dellb(query).then(res => {
					if(res.data == '删除成功'){
						this.$message.success('删除成功');
						this.getlbData(part);
					}else if(res.data == 'NO')
						this.$message.error('删除失败请重试');
				});
			},
			beforeRemove(){

			},
			handleRemove(){

			},
			handlePreview(){

			},
			handleExceed(){
				this.$message.warning('只能同时上传三张')
			},
			onSubmit(){
				this.$refs.upload.submit()
			},
			showDlog(id){
				
			},
		},
	}


</script>


<style scoped>
	
	.image{
		height: 80%;
		width: 100%;
	}
	.button{
		float: right;
	}
	.clearbtn{
		clear: both;
	}
	.bottom{
		height: 50px;
		line-height: 50px;
		margin: 0 10px 0 10px;
	}
	.bottom span{
		font-size: 1.2em;
	}
	.lbsubmit{
		margin-top: 20px;
	}
	.showBtn{
		/*position: relative;
		left: 150px;
*/	}
	.login{
		width: 100%;
		background-image: url(https://wbtc.tech/st_imge/login.jpg);
		background-size:100% 100%;
	}
	.adminForm{
		width: 400px;
		position: absolute;
		left: 50%;
		top:50%;
		transform:translate(-50%,-50%);
	}
	.el-form-item__label{
		color: #dac523
	}
</style>