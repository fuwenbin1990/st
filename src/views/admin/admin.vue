<template>
	<div class="admin">
		<el-collapse v-model="activeName" accordion>
		  <el-collapse-item title="首页轮播图管理" name="1">
		    首页轮播图管理
		  </el-collapse-item>
		  <el-collapse-item title="首页产品展示图管理" name="2">
		    首页产品展示图管理
		  </el-collapse-item>
		  <el-collapse-item title="首页文字管理" name="3">
		    首页文字管理
		  </el-collapse-item>
		  <el-collapse-item title="产品展示图管理" name="4">
		    产品展示图管理
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
	</div>
</template>


<script>
	
	import {upload} from '@/api/upLoadImg'	

	export default{
		name:'admin',
		data(){
			return{
				activeName:'5',
				options:['首页轮播图','首页产品展示','产品展示图'],
				introduce:{
					action:'st_ad',
					title:'',
					content:'',
					part:'',
				}
			}
		},
		computed:{
			action(){
				return process.env.BASE_API + '/php/upLoadImg.php'
			}
		},
		created(){

		},
		methods:{
			sucs(res,file,filelist){
				console.log(res)
				if(res == 'OK'){
					this.$message.success('上传成功');
					this.$refs.upload.clearFiles();
				}
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
			}
		},
	}


</script>


<style scoped>
	
</style>